<?php

$msql = new mysqli('', 'root', '', 'notebook');
$query = 'select * from `namess` ';
$em = $msql->query($query);
$result = $em->fetch_all();
foreach ($result as $name) {
    $table_name = $name[1];
    $query = "Select * from $table_name ";
    $em = $msql->query($query);
    $res = $em->fetch_all();

    foreach ($res as $row) {
        
        $save_row = implode('_', $row  );
        file_put_contents('save_db', $save_row.'_' , FILE_APPEND);        
    
        
    }
}
$file = file('save_db');
var_dump($file);


