<?php
require_once './func.php';
$query = "SELECT * from $newNameObj ";
$result = $msql->query($query);
$show = $result->fetch_all();



//echo "<pre>";
//var_dump($show);
//echo "</pre>";
//rsort($show);
//echo "<form>";

$showAfterSort  = sort_by_($show, 3 ,'h');



echo "<table>";
?>
<th><input type="submit" name="id" value="sort" ></th>

<th><input type="submit" name="empty" value="sort"></th>
<th><input type="submit" name="reccord" value="sort" ></th>
<th><input type="submit" name="date" value="sort"></th>



<?php

foreach ($showAfterSort as $k => $recc) {
    $n = 'update_' . $k;
    $recc[] = " <input type='submit' value='update'  name=$n ) > ";
    echo "<tr>";
    foreach ($recc as $r) {

        echo "<td>";
        echo $r;
        echo "</td>";
    }
    echo "</tr>";
}
echo "</table>";
//echo "</form>";
