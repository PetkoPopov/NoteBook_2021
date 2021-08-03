<?php

$msql = new mysqli('','root','', "notebook");
$query = "drop database notebook";
$msql->query($query);
require_once './install.php';

