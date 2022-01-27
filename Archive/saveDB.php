

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
$msql = new mysqli('', 'root', '', 'notebook');
$query = 'select * from `namess` ';
$em = $msql->query($query);
$result = $em->fetch_all();
// за по лесно само декоментирай 
//echo "<pre>";
//var_dump($result);
//echo "</pre>";
//die;
$msql->close();
foreach ($result as $name) {
    $table_name = $name[1];
    $query = "Select * from $table_name ";
//    echo "<pre>";
//var_dump($query);
//echo "</pre>";
//continue;

    $msql = new mysqli('', 'root', '', 'notebook');
    $e_m = $msql->query($query); //     query($query);
//    echo "<pre>";
//var_dump($entiy_m);
//echo "</pre>";
//continue;
//die;

    $res = $e_m->fetch_all();
//echo "<pre>";
//var_dump($res);
//echo "</pre>";
//continue;
//$counter=0 ;
    foreach ($res as $row) {
//echo "<pre>";
//var_dump($row);
//echo "</pre>";
//continue;
        
        
    file_put_contents("text.txt", $row ,FILE_APPEND);
         
        
    }
}

        ?>
    </body>
</html>
