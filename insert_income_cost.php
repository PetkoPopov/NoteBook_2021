                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      <head>
    <link rel="stylesheet" href="newcss.css" >

</head>
<body>
    <?php
    session_start();
//    var_dump($_SESSION);die;
    $conn = new mysqli('', "root", "", 'notebook');

    $query = "SELECT * FROM `payment_staff`  ";
    $result = $conn->query($query);
    $options = $result->fetch_all();
//    var_dump($options[0][1]);
    ?>
    <a>Insert cost or income for
        <div>
            <b>
                <?php
                $name = $_SESSION["name"];
                echo $name;
                ?>
            </b>
        </div>
    </a>
    <a href="New/addNewStaff.php"> add new staff</a>
    <a href="New/delete_staff.php"> delete staff</a>
    <form>


        <input type="number" name="cost_income" id="cost" value="<?=50?>"><!-- comment -->
        <label for="cost">insert cost or income </label><!-- comment -->
        <p></p>
        <input type="text" name="explain_cost_income" id="expl" >
        <label for="expl">insert explenation</label>
        <select name="select">
            <option></option>
            <?php
            foreach ($options as $option) {
                ?><option><?= $option[1] ?></option><?php
            }
            ?>
        </select>
        <input type="date" name="date_event_for_object" value="<?= date('Y-m-d'); ?>">
        <input type="submit" value="record">


    </form>
    <?php
    if (!empty($_GET['cost_income']) && (!empty($_GET['explain_cost_income'] || $_GET['select'])) && !isset($_SESSION['record_income'])) {
        
//            die('PHP______');
        $_SESSION['record_income'] = true;
//   var_dump($_SESSION);die;
//    $dbname = "notebook";
//    $conn = new mysqli('', "root", "", $dbname);

       
        $query = "INSERT INTO `income_cost` (`cost_income` , `at_date` , `expl`,`name`) VALUES (? , ? , ? ,?)";
        $record = $conn->prepare($query);
        if (isset($_GET['cost_income']) && $_GET['cost_income'] > 0) {
            $val = $_GET['cost_income'];
        }
//    $name = $_SESSION['name'];

        if (array_key_exists('date_event_for_object', $_GET)) {
            $date = $_GET['date_event_for_object'];
        } else {
            $date = $_SESSION['time_event'];
        }
        $expl = '';
        if (array_key_exists('select', $_GET) && !empty($_GET['select'])) {
            $expl .= $_GET['select'];
        }
        if(isset($_GET['explain_cost_income']) && !empty($_GET['explain_cost_income']))
        {
        $expl .= $_GET['explain_cost_income'];
        
        }else{
            $expl .= '@';
        }
         
//        var_dump($val, $date, $expl, $name);
        $record->bind_param('isss', $val, $date, $expl, $name);

        if ($record->execute()) {
            echo "<b>RECORD</b>";
      header("Location: ./View/ShowAllForObject.php");
            } else {
            $record->errno();
        }
    } else {
        unset($_SESSION['record_income']);
    }
//    
    ?>

    <a href="View/showAllForObject.php">show all for <?= $_SESSION['name'] ?></a>
    <a href="index.php"> back to notebook</a>

</body>