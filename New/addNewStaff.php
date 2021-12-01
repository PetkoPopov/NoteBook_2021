<!<!doctype html>
<html>
<head>
    <link rel="stylesheet" href="../newcss.css">
</head>
<body>
<form>
    <input type="text" name="staff" ><!-- comment -->
    <input type="submit" value="add to staff"/>
    
</form>
<?php

$msql = new mysqli('','root','','notebook');
if(isset($_GET['staff']) && !empty($_GET['staff'])){
    $staff = $_GET['staff'];
 
$query = "INSERT INTO `payment_staff` (name) VALUE(?)";
$e = $msql->prepare($query);
$e->bind_param('s', $staff);
if($e->execute()){
echo "ALL IS OK";
    
}else{
    $e->errno;
}   
}

?>
    <a href="../insert_income_cost.php">go to insert income or payment</a>
</body>
</html>