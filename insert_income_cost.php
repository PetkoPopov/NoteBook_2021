                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      <head>
    <link rel="stylesheet" href="newcss.css" >

</head>
<body>
    <?php
    session_start();

    $conn = new mysqli('', "root", "", 'notebook');

    $query = "SELECT * FROM `payment_staff`  ";
    $result = $conn->query($query);
    $options = $result->fetch_all();
//    var_dump($options[0][1]);
    ?>
    <a>Insert cost or income for<div> <b>
    <?= $_SESSION["name"] ?></b></div>
    </a>
    <a href="New/addNewStaff.php"> add new staff</a>
    <a href="New/delete_staff.php"> delete staff</a>
    <form>


        <input type="number" name="cost_income" id="cost"><!-- comment -->
        <label for="cost">insert cost or income </label><!-- comment -->
        <p></p>
        <input type="text" name="explain_cost_income" id="expl">
        <label for="expl">insert explenation</label>
        <select>
<?php
foreach($options as $option){
?><option><?=$option[1]?></option><?php
    
}

?>
        </select>

        <input type="submit" value="record">


    </form>
<?php
if (!empty($_GET['cost_income']) && !empty($_GET['explain_cost_income']) && !isset($_SESSION['record_income'])) {
    $_SESSION['record_income'] = true;
//   var_dump($_SESSION);die;
//    $dbname = "notebook";
//    $conn = new mysqli('', "root", "", $dbname);

    $query = "INSERT INTO `income_cost` (`cost_income` , `at_date` , `expl`,`name`) VALUES (? , ? ,? ,?)";
    $record = $conn->prepare($query);

    $val = $_GET['cost_income'];

    $name = $_SESSION['name'];

    $date = $_SESSION['time_event'];
    $expl = $_GET['explain_cost_income'];
    $record->bind_param('isss', $val, $date, $expl, $name);
    $record->execute();
} else {
    unset($_SESSION['record_income']);
}
?>

    <a href="View/showAllForObject.php">show all for <?= $_SESSION['name'] ?></a>
    <a href="index.php"> back to notebook</a>

</body>