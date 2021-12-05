<head>
    <link rel="stylesheet" href="../newcss.css"/>

</head>
<body>
    <form>
        <?php
        session_start();

        $msql = new mysqli('', 'root', '', 'notebook');

        $obj = $_SESSION['name'];

        $query = "select * from `income_cost` where `name` = '" . $obj . "'";
//var_dump($msql->query($query));die;
        $result = $msql->query($query);
        foreach ($result->fetch_all() as $row) {
            echo "payment or cost= " . $row[1] . '<br/>';

            echo "expl = " . $row[2] . '<br/>';
//    echo "<br/>";
            echo "date event = " . $row[3] . '<br/>';
//    echo "<br/>";
            echo "object = " . $row[4] . '<br/>';
            echo "<br/>";
        }
        ?>


        <input type="submit" value="show Balans" name="showBalans"/>
    </form>
    <?php
    if (array_key_exists('showBalans', $_GET)) {
        unset($_GET['showBalans']);
        $query = "select SUM(cost_income) from `income_cost` where `name`='" . $obj . "' ";
//    var_dump($query);
        $result = $msql->query($query);
        $balans = $result->fetch_all()[0][0];
        $query = "SELECT COUNT(id) from `income_cost` where `name`= '" . $obj . "'";
        $result = $msql->query($query);
        $count_work_days = $result->fetch_all()[0][0];
    }
    ?>
    <h2>the Balans is </h2>
    <div>
        <?php
        if (isset($balans)) {
             $per_day = round($balans / $count_work_days, 2);
            if ($balans >= 0) {
                ?>до момента е получил<h4 style="background-color: #66ff33"> <?= $balans ?></h4>
            </div>

            <div>
                средно за един ден 
                <h4 style="background-color: #cccc00; font-size: x-large">
                    <?= $per_day ?>
                </h4>
            </div>
            <?php

               
            } else {
               
                ?>до момента си инвестирал <?= $balans ?>
            </div>

            <div>
                средно за един ден 
                <h4 style="background-color: #cccc00; font-size: x-large">
                    <?= $count_work_days ?>
                </h4>
            </div>
            <?php
        }
    } else
        echo " NO BALANS";
    ?>
</div>

<a href="../index.php">go to noteboook</a>
<a href="../insert_income_cost.php"> go to income and payment</a>
</body>