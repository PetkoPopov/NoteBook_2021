<?php

          
      $updateObject=$_SESSION['name'];
      $updateExpl=$_SESSION['textArea'];
      $updateDate=$_SESSION['time_event'];
      $msql=new mysqli('',"root",'','notebook');
      $query="Select * from  $updateObject ";
      $result = $msql->query($query);
      $a = $result->fetch_all();
      foreach($_GET as $k=>$evnt){
          $arr = explode('_',$k);
          if(in_array('update', $arr)){
              $id = $arr[1];
//              $id++;
              echo '<br/>';
              echo $id;
              echo '<br/>';
//              var_dump($a);
                            break;
          }
      }
      
      
      