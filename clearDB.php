<form>
<?php
 
$msql = new mysqli('','root','', "notebook");
$query = "select * from `namess` ";
$result = $msql->query($query);
foreach($result ->fetch_all() as $r){
   
    ?>
<p>
    <input type="checkbox" id="<?= $r[1] ?>" value="<?= $r[0] ?>" name="<?=$r[1]?>" >
<label for="<?=$r[1]?>" ><?=$r[1]?></label>
</p>

    <?php
    
}
?>
<input type="submit" value="erase tables">
</form>
<?php
$allNames=$_GET ; 
    
               foreach($allNames as  $name => $id){
                   $query = "drop table $name ";
                    $msql->query($query);
  $query = "DELETE FROM `namess` WHERE `namess`.`id` = $id ";
  $msql->query($query);
  
                   }
                   

?>
<a href="index.php">go to the MAKE RECCORD</a>
<a href="deleteAllTables.php">delete all tables</a>