<!doctype html>
<html>
<head>
    <title> CREATE NOTEBOOK</title>
    <link rel="stylesheet" href="newcss.css">
</head>
<body>
    <form>
    <button>CREATE NOTEBOOK</button>
    </form>


    <?php
    $query = "Create database `NoteBook` ";
    $msql = new mysqli('', 'root', '');
    $msql->query($query);
    $msql->close();
    $msql = new mysqli('', 'root', '', 'notebook');
//
//    $query = "CREATE TABLE `notebook`.`names` "
//            . "("
//            . " `id` INT(9) NOT NULL , "
//            . "`name` VARCHAR(100) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";

    $query="CREATE TABLE `notebook`.`namess` ( "
            . "`id` INT NOT NULL AUTO_INCREMENT ,"
            . " `name` VARCHAR(100) NOT NULL ,"
            . " `at_date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ,"
            . " PRIMARY KEY (`id`)) ENGINE = InnoDB;";
    if ($msql->query($query) == true){
    
        echo "Table created";
    }
    else
    {
        $msql->error;
    }
     $query = "CREATE TABLE `notebook`.`payment_staff`("
             . "`id` INT NOT NULL AUTO_INCREMENT ,"
             . " `name` VARCHAR(100) NOT NULL ,"
             . "PRIMARY KEY (id) ) ENGINE=InnoDB;";
//     var_dump($query);
    if ($msql->query($query) == true){
    
        echo "Table created";
    }
    else
    {
        $msql->error;
    }         
    $query = " CREATE TABLE `notebook`."
        . "$newNameObj ( `id` INT NULL AUTO_INCREMENT, "
        . "`event` TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL , "
        . "`time_record` DATETIME  NULL DEFAULT CURRENT_TIMESTAMP , "
        . "`time_event` DATE NOT NULL ,"
        . " PRIMARY KEY (`id`)) ENGINE = InnoDB;";
$msql->query($query);

$query = "CREATE TABLE `notebook`.`income_cost` ("
        . " `id` INT NOT NULL AUTO_INCREMENT ,"
        . " `cost_income` INT(10) NULL DEFAULT NULL , "
        . "`expl` TEXT NULL DEFAULT NULL ,"
        . " `at_date` DATE NOT NULL DEFAULT CURRENT_TIMESTAMP ,"
        . " PRIMARY KEY (`id`)) ENGINE = InnoDB; ";
$msql->query($query);
$query = "ALTER TABLE `income_cost` ADD `name` TEXT NOT NULL AFTER `at_date`;";
$msql->query($query);
$query = "ALTER TABLE `income_cost` ADD INDEX(`name`)";
$msql->query($query);




    ?>
   
    <p>
        <a href='clearDB.php'>clear DATABASE</a>
    </p>
    <a href="index.php">go to the notebook</a>
</body>
</html>