<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>TEST AFTER INSTALING</title>
        <link rel="stylesheet" href="../TestAfterReinstaling/newcss.css" />
    </head>
    <body>
        <?php
        session_start();
//                $_SESSION['textArea']='';
        $_SESSION['isRecord']=false ;
        ?>
        <form>
            <select style="background-color: #cccc00; width:100px;height: 66px;" name="opt">
                <option value="#">no value</option>
                <?php
                $allNames = [];
                $msql = new mysqli('', 'root', '', "notebook");
          $_SESSION['connection']=$msql ; 
                $query = "select `name` from `namess` ";
                $result = $msql->query($query); //внимание ако заявкята е грешна кода ще спре без да гръмне
                $all = $result->fetch_all();
                foreach ($all as $count => $key) {
                    $allNames[] = $key[1];
                    echo "<option value=$key[0] name=$count > $key[0] </option>";
                }
                ?>

            </select> 
            <div>
                <a href="insert_income_cost.php">go to insert incomes or costs</a>
            </div>
            <p></p>
            INSERT NEW NAME-OBJECT :<input type="text" name="newObject" >
            <p>
                <textarea name="textArea" rows="15" cols="20" value=""></textarea>
            </p>
            <input type="date" name="time_event">

            <input  type="submit" style="background-color: #cccc00; width:100px;height: 66px;" name="btn" value="btnValue" >

        </form>
        <?php
        
        if (isset($_GET['textArea']) && $_GET['textArea'] == $_SESSION['textArea']) {
            die();
        }

        if (isset($_GET['opt']) && $_GET['opt'] != "#") {
            $newNameObj = $_GET['opt'];
        } else if (!empty($_GET['newObject']) && $_GET['opt'] == '#') {

            $newNameObj = $_GET['newObject'];
        } else {
            echo "<a href = clearDB.php >clear tables</a>";
            die;
        }

        $query = " CREATE TABLE `notebook`."
                . "$newNameObj ( `id` INT NULL AUTO_INCREMENT, "
                . "`event` TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL , "
                . "`time_record` DATETIME  NULL DEFAULT CURRENT_TIMESTAMP , "
                . "`time_event` DATE NOT NULL ,"
                . " PRIMARY KEY (`id`)) ENGINE = InnoDB;";
        $msql->query($query);
        
        $query = "CREATE TABLE `notebook`.`income_cost` ("
                . " `id` INT NOT NULL AUTO_INCREMENT ,"
                . " `cost_income` INT(10) NULL DEFAULT NULL , "
                . "`expl` TEXT NULL DEFAULT NULL ,"
                . " `at_date` DATE NOT NULL DEFAULT CURRENT_TIMESTAMP ,"
                . " PRIMARY KEY (`id`)) ENGINE = InnoDB; ";
        $msql->query($query);
        $query="ALTER TABLE `income_cost` ADD `name` TEXT NOT NULL AFTER `at_date`;";
        $msql->query($query);

///////////////////////////////////////////////////////////////////////////////////////
//            $query ="insert into `namess` (`name`) values($newNameObj)";
//            $msql->query($query);
//            не работи
///////////////////////////////////////////////////////////////////////////////////////
        $allNames_2 = [];
        foreach ($all as $name) {
            $allNames_2[] = $name[0];
        }
        if (!in_array($newNameObj, $allNames_2)) {
            $query = "INSERT INTO `namess` ( `name`) VALUES (?)";

            $stmt = $msql->prepare($query);

            $stmt->bind_param("s", $new);
            $new = $newNameObj;
            $stmt->execute();
        }


        if (!empty($_GET['textArea'])) {

            $newMysql = new mysqli('', 'root', '', 'notebook');
            $query_insert_into = "INSERT INTO `notebook`.`$newNameObj` (`event` , `time_event`) VALUES ( ? , ? )";
            $stmt2 = $newMysql->prepare($query_insert_into);
            $stmt2->bind_param('ss', $event, $time_event);
            $event = $_GET['textArea'];

            if (!empty($_GET['time_event'])) {
                $time_event = $_GET["time_event"];
                $_SESSION['time_event']=$time_event;
            } else {
                $time_event = "2021/09/09";
                
                $_SESSION['time_event']=$time_event;
            }
            if ($stmt2->execute()) {
                echo "RECCORD";
            } else {
                echo "NO RECORD";
            }
            $_SESSION['textArea'] = $event;
            $_SESSION['name'] = $newNameObj;
        }
        require_once './funcShow.php';

//        echo "<pre>";
//        var_dump($_SESSION);
//        echo "</pre>"
        ?>
        <a href="clearDB.php">clear tables</a>
    </body>
</html>
