<head>
    <link rel="stylesheet" href="newcss.css" >
    
</head>
<?php
session_start();
?>
<a>Insert cost or income for<div> <b>
        <?=$_SESSION["name"]?></b></div>
</a>


<form>
<div>

                <input type="number" name="cost_income" id="cost"><!-- comment -->
                <label for="cost">insert cost or income </label><!-- comment -->
                <p></p>
                <input type="text" name="explan_cost_income" id="expl">
                <label for="expl">insert explanation</label>
                <input type="submit" value="record">
</div>
    
</form>
<?php
$query = "INSERT INTO `income_cost` (`cost_income`, `expl`, `at_date`) VALUES (? , ? , ? )";
         


?>