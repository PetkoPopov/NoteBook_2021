<head>
    <link rel="stylesheet" href="newcss.css" >

</head>
<?php
session_start();
?>
<a>Insert cost or income for<div> <b>
            <?= $_SESSION["name"] ?></b></div>
</a>


<form>
    <div>

        <input type="number" name="cost_income" id="cost"><!-- comment -->
        <label for="cost">insert cost or income </label><!-- comment -->
        <p></p>
        <input type="text" name="explain_cost_income" id="expl">
        <label for="expl">insert explanation</label>
        <input type="submit" value="record">
    </div>

</form>
<?php
if (!empty($_GET['cost_income']) && !empty($_GET['explain_cost_income'])) {
    var_dump($_SESSION['isRecord']);
    $dbname = "notebook";
    $conn = new mysqli('', "root", "", $dbname);

    $query = "INSERT INTO `income_cost` (`cost_income` , `at_date` , `expl`,`name`) VALUES (? , ? ,? ,?)";
    $record = $conn->prepare($query);

    $val = $_GET['cost_income'];

    $name = $_SESSION['name'];

    $date = $_SESSION['time_event'];
    $expl = $_GET['explain_cost_income'];
    $record->bind_param('isss', $val, $date, $expl, $name);

    if (isset($_SESSION['isRecord'])) {
        $_SESSION['isRecord'] = $record->execute();
        unset($_SESSION['isRecord']);
    } else {
        header('Location:index.php');
    }
}
?>
<a href="index.php"> back to notebook</a>
<p></p>