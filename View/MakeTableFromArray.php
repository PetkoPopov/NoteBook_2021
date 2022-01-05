<?php
namespace MakeTableFromArray; 
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MakeTableFromArray
 *
 * @author User_1
 */
class MakeTableFromArray{

    public function __construct($array) {
        ?><table style="border: solid black 2px;"><?php
        foreach ($array as $arr) {

            ?>
<tr>
                
                <?php
            foreach ($arr as $a) {

                ?><td style="border: solid black 2px;"><?=$a?></td><?php
            }

            echo "</tr>";
        }
        echo "</table>";
    }

}





