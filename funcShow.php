<head>
    <link rel="stylesheet" href="../TestAfterReinstaling/newcss.css" />

</head>
<body>
    <a href="index.php">go to NoteBook </a>

    <?php
    session_start();
    require_once './func.php';
    $newNameObj = $_SESSION['name'];
    $sort_reverse = 0;
    if (in_array('update', $_GET)) {
        //to do

        $_SESSION['get'] = $_GET;
        $_SESSION['test'] = "nadafaka";
        header("Location:calc.php", true);
    }

    $msql = new mysqli('', 'root', '', "notebook");

    $query = "SELECT * from $newNameObj ";
    $result = $msql->query($query);
    $show = $result->fetch_all();

    if (isset($_GET['date']) && $_SESSION['click'] == 'date') {
        $sort_reverse = 1;
    } elseif (isset($_GET['id']) && $_SESSION['click'] == 'id') {
        $sort_reverse = 1;
    } elseif (isset($_GET['empty']) && $_SESSION['click'] == 'empty') {
        $sort_reverse = 1;
    } elseif (isset($_GET['reccord']) && $_SESSION['click'] == 'reccord') {
        $sort_reverse = 1;
    } else {
        $sort_reverse = 0;
    }

    $n = 0;
    if (isset($_GET['id'])) {
        $_SESSION['click'] = 'id';
        $n = 0;
    } elseif (isset($_GET['empty'])) {
        $_SESSION['click'] = 'empty';
        $n = 1;
    } elseif (isset($_GET['reccord'])) {
        $_SESSION['click'] = 'reccord';
        $n = 2;
    } elseif (isset($_GET['date'])) {
        $_SESSION['click'] = 'date';
        $n = 3;
    }


    $show_after_sort = sort_advanced($show, $n, $sort_reverse);

    echo "<form><table>";
    ?>
<th><input type="submit" name="id" value="sort" ></th>

<th><input type="submit" name="empty" value="sort"></th>
<th><input type="submit" name="reccord" value="sort" ></th>
<th><input type="submit" name="date" value="sort"></th>



<?php
$counter = 0;

foreach ($show_after_sort as $k => $recc) {
//foreach ($show as $k => $recc) {
    $counter++;
    if ($counter % 8 == 0) {
        ?>
        <tr><!-- comment -->
            <td><a href="index.php">Go to NoteBook</a></td>
            <td><a href="View/showAllForObject.php">show balans</a></td>
        </tr><?php
    }
    $n = 'update_' . $k;
    $recc[] = " <input type='submit' value='update'  name=$n  > ";
    echo "<tr>";

    foreach ($recc as $r) {

        echo "<td>";
        echo $r;
        echo "</td>";
    }

    echo "</tr>";
}
echo "</table>";
?>

</form>
<a href="index.php">go to NoteBook</a>
</body>