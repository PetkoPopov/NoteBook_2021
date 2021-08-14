<?php




$query = "SELECT * from $newNameObj ";
$result=$msql->query($query);
$show = $result->fetch_all();
echo "<table>";
foreach($show as $k=>$recc){
    $n='update_'.$k;
    $recc[]=" <input type='submit' value='update'  name=$n ) > "; 
    echo "<tr>";
    foreach ($recc as $r){
        echo "<td>";
        echo $r ;
        echo "</td>";
        
    }
    echo "</tr>";
}
echo "</table>";

