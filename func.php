<?php
function sort_by_(array $array ,int $sort_int,string $desc='desc'){
    
    $newArr=[];
    $count = 0;
    foreach($array as $k=>$val){
        if(!array_key_exists($val[$sort_int], $newArr)){
        $newArr[$val[$sort_int]]=$val[0];
        }else{
            $count++;
            $newArr[$val[$sort_int].$count]=$val[0];
        }
    }
    if($desc == 'desc'){
    
        krsort($newArr);
    
    }else{
         ksort($newArr);
    }

    foreach($newArr as $id){
        
        $arr[]=$array[$id-1];
           
    }

    return $arr;

    
    }