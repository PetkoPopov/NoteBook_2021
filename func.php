<?php

function sort_advanced(array $arr, int $n, int $sort_reverse) {
$arr_after_sort=[];
    
    foreach ($arr as $key => $a) {
        $new_arr[]=$a[$n];
    }
    
if($sort_reverse == 1 && $_SESSION['reverce'] == 1){
    $_SESSION['reverce']=0;
       sort($new_arr);
}else{
    $_SESSION['reverce']=1;
    rsort($new_arr);
}    
    
        
        
        foreach ($new_arr as  $a) {
            //трябва да вземем съответния масив
            foreach ($arr as $v) {
                //$a ->string
                if($v[$n] == $a && !in_array($v, $arr_after_sort)){
                    $arr_after_sort[]=$v;
                    break;
                }
            }
        }
//        echo '<pre>';
//        var_dump($arr_after_sort);
//        echo '</pre>';
        return $arr_after_sort;
}

function sort_by_(array $array, int $sort_int, string $desc = 'desc') {

    $newArr = [];
    $count = 0;
    foreach ($array as $k => $val) {
        if (!array_key_exists($val[$sort_int], $newArr)) {
            $newArr[$val[$sort_int]] = $val[0]; // $val[0] e id 
        } else {
            $count++;
            $newArr[$val[$sort_int] . $count] = $val[0];
        }
    }

    if ($desc == 'desc') {
        echo 'DESC <br/>';
        krsort($newArr);
    } else {
        echo('NO DESC');
        ksort($newArr);
    }

    foreach ($newArr as $id) {

        $arr_result[] = $array[$id - 1];
    }

    return $arr_result;
}

function sort_by_uk($a, $b, $show) {

    if ($show[$a][2] == $show[$b][2]) {
        return 0;
    }
    return($show[$a][2] < $show[$b][2]) ? -1 : 1;
}
