<?php
$arr = str_split("ribatanepadapodalecheotdyrwotoivinagiepyrwaogatotqqqqqqqwxzxzbvxzmjkicsdeaaaaaaaaaabbbbbbbbabababababbabcbcbcbcbbccdcdcdccdcdrq",4);
                 
foreach ($arr as $array){
    $newArr[]=str_split($array);
}


uksort($newArr,function($a,$b){
    global $newArr;

    if($newArr[$a][0] == $newArr[$b][0])return 0 ;
    return($newArr[$a][0]<$newArr[$b][0])?-1:1;
     
}    
        
        );
        
echo "<pre>";
var_dump($newArr);
echo "</pre>";