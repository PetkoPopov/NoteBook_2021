<head>
    <link rel="stylesheet" href="../newcss.css"/>
    
</head>
<body>
    <form>
<?php
session_start();

$msql = new mysqli('','root','','notebook');

$obj = $_SESSION['name'];

$query = "select * from `income_cost` where `name` = '".$obj."'";
//var_dump($msql->query($query));die;
$result = $msql->query($query);
foreach($result->fetch_all() as $row){
    var_dump($row);
    echo "<br/>";
}

?>
    
        
        <input type="submit" value="show Balans" name="showBalans"/>
    </form>
<?php
if(array_key_exists('showBalans', $_GET)){
    unset($_GET['showBalans']);
    $query="select SUM(cost_income) from `income_cost` where `name`='".$obj."' ";
//    var_dump($query);
    $result= $msql->query($query);
    $balans = $result->fetch_all()[0][0];
 
}


?>
    <h2>the Balans is </h2>
    <div><?=$balans?></div>
    
    <a href="../index.php">go to noteboook</a>
</body>