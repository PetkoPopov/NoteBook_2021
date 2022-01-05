<?php
//идваме от funcShow.php
session_start();
//var_dump($_SESSION);
//echo "<p></p>";
 $updateObject = $_SESSION['name'];
$msql = new mysqli('', "root", '', 'notebook');
$query = "Select * from  $updateObject  ";
$result = $msql->query($query);

$a = $result->fetch_all();

$get = $_SESSION['get'];

foreach ($get as $k => $evnt) {
    $arr = explode('_', $k);
    if (in_array('update', $arr)) {
        $id = count($a)- $arr[1];//id е въпросния ред от базата данни
        echo '<br/>';
//        var_dump($a[$id-1]);
        ($a[$id-1]);
        
 $updateExpl =$a[$id-1][1];

//echo "<p></p>";
 $updateDate =$a[$id-1][3];
         
//        echo '<br/>';
        $query ='';

        ?>
<form>
    
    <p><textarea name="updateEvent"><?=$updateExpl?></textarea></p>
    
    <input type="date" value="<?=$updateDate?>" name="updateDate"/>
    
    <input type="submit" ><!-- comment -->
    
</form>
                   <?php
//        var_dump($_SESSION);
                   if(!empty($_GET['updateEvent'])){ $updateEvent=$_GET['updateEvent'];}
                   else{
                       $updateEvent = '';
                   }
                   if(!empty($_GET['updateDate'])){$updateDate = $_GET['updateDate'];}
                   else{
                       $updateDate='';
                   }
                   if(isset($updateEvent) && isset($updateDate)){
                   $query = "UPDATE `$updateObject` SET `event` = '$updateEvent', `time_event` = '$updateDate' WHERE `$updateObject`.`id` = $id ;" ;
                   $msql->query($query);
                   
                   }
         
                   break;
    }
}

      ?>
<a href="index.php">Back to NoteBook</a>
      