<?php
session_start();

$msql = new mysqli('','root','','notebook');

$obj = $_SESSION['name'];

$query = "select * from $obj ";

$result = $msql->query($query);
foreach($result->fetch_all() as $row){
    var_dump($row);
    echo "<br/>";
}

