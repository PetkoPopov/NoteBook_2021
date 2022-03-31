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
        
//echo "<pre>";
//var_dump($_GET);
//echo "</pre>";
$let_sort = false;
if(isset($_GET['id']) || isset($GET['empty']) || isset($_GET['date']) || isset($_GET['reccord'])){
    $let_sort = true;
}


        if (isset($_SESSION['textArea'])) {
            
        } else {
            $_SESSION['textArea'] = 'o';
        }
        if (in_array('update', $_GET)) {
            //to do

            $_SESSION['get'] = $_GET;
            $_SESSION['test'] = "nadafaka";
            header("Location:calc.php", true);
        }
        ?>
        <form>
            <select style="background-color: #cccc00; width:100px;height: 66px;" name="opt">
                <option value="#">no value</option>
                <?php
                $allNames = [];
                $msql = new mysqli('', 'root', '', "notebook");
                $_SESSION['connection'] = $msql;
                $query = "select `name` from `namess` ";
                $result = $msql->query($query); //внимание ако заявкята е грешна кода ще спре без да гръмне
                $all = $result->fetch_all();
                foreach ($all as $count => $key) {
                    $allNames[] = $key[1];
                    echo "<option value=$key[0] name=$count > $key[0] </option>";
                }
                ?>

            </select> 
            <p>
            <div>
                <a href="insert_income_cost.php">go to insert incomes or costs</a>
                <p><?php
                if(isset($_SESSION['name']))
                    echo $_SESSION['name'];
                ?>
                    </p>
                    <a href="View/showAllForObject.php"> go to balans</a>
            </div>
            </p>
            <p>
            INSERT NEW NAME-OBJECT :<input type="text" name="newObject"  value="">
            </p>
            <p>
                <textarea name="textArea" rows="5" cols="100" style="background-color: #99ff99 ; font-size: x-large"></textarea>
            </p>
            <label for="time_event">избери дата </label>
            <input type="date" name="time_event" id="time_event">
             

                <label for="time_manual" >въведи датата ръчно</label>
                <input type="text" name="time_manual" id="time_manual" >

            
            <input  type="submit" style="background-color: #cccc00; width:100px;height: 66px;" name="btn" value="Запиши" >

            <!--</form>-->
<?php
if (isset($_GET['textArea']) && $_GET['textArea'] == $_SESSION['textArea']) {

    die("empty textArea");
}

if (isset($_GET['opt']) && $_GET['opt'] != "#") {
    $newNameObj = $_GET['opt'];

    $_SESSION['name'] = $newNameObj;
} else if (!empty($_GET['newObject']) && $_GET['opt'] == '#') {

    $newNameObj = $_GET['newObject'];

    $_SESSION['name'] = $newNameObj;
} else {
    echo "<a href = clearDB.php >clear tables</a>";
    die;
}


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
        $_SESSION['time_event'] = $time_event;
    } elseif (!empty($_GET['time_manual'])) {
        $time_event = $_GET['time_manual'];

        $_SESSION['time_event'] = $time_event;
    }
    if ($stmt2->execute()) {
        echo "RECCORD";
    } else {
        echo "NO RECORD";
    }
    $_SESSION['textArea'] = $event;
    $_SESSION['name'] = $newNameObj;
}

//          $_SESSION['textArea'] = $event;
//            $_SESSION['name'] = $newNameObj;
//        

//require_once './funcShow.php';

header("Location:./funcShow.php")

?>

        </form>
           
        <a href="clearDB.php">clear tables</a>
    </body>
</html>
