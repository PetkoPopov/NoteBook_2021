<?php
session_start();
var_dump($_SESSION);
?>
<head>
    <link rel="stylesheet" href="newcss.css">
    
</head>
<form>
  OBJECT:  <input type="text" name="obj" value="<?=$_SESSION['name']?>">
  <p></p>
    INSERT COST or INCOME :<input type="number" name="income">
    <p></p>
    EXPLANATION:<input type="text" name="forWhat">
    <input type="submit">
    
</form>
<?php

