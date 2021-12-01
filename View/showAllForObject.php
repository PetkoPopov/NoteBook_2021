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
    echo "payment or cost= ".$row[1].'<br/>';
   
    echo "expl = ".$row[2].'<br/>';
//    echo "<br/>";
    echo "date event = ".$row[3].'<br/>';
//    echo "<br/>";
    echo "object = ".$row[4].'<br/>';
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
    $query = "SELECT COUNT(id) from `income_cost` where `name`= '".$obj."'";
    $result = $msql->query($query);
    $count_work_days = $result->fetch_all()[0][0];
    
 
}


?>
    <h2>the Balans is </h2>
    <div>
        <?php 
    if(isset($balans)){
        if($balans >= 0 ){
         
    echo 'до момента е получил '.$balans.'<br/>';
    echo 'средно за един ден'.round($balans/$count_work_days, 2);   
        }else{
            $per_day=round($balans/$count_work_days,2);
            ?><span>до момента си инвестирал <?=$balans?><br/></span>
   
            <p><span>средно за един ден <?=$count_work_days?></span></p>
            <?php
        }
    }
    else
       echo " NO BALANS";
    ?>
        </div>
    
    <a href="../index.php">go to noteboook</a>
    <a href="../insert_income_cost.php"> go to income and payment</a>
</body>