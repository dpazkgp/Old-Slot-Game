<?php

function getmatrixS3(){
    $Reel1 ="wwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwww";
    $Reel2 ="ewewdwewbwdwcwcwewawewdwbwawdwcwbwcwdwawe";
    $Reel3 ="wbwawbwcwawdbwdwdwewewewcwewcwdwdwcwewbw";
    
    $array_reel1 = str_split($Reel1);
    $array_reel2 = str_split($Reel2);
    $array_reel3 = str_split($Reel3);

    $matrix = array($array_reel1[rand(0,40)],$array_reel2[rand(0,40)],$array_reel3[rand(0,39)]);

    return $matrix;


}

function win_slotS3($matrix){
    global $paytable;
    $win_amount = 0;
    $firstElement = $matrix[0];
        if($matrix[1]=='w'){
            $win_amount=$paytable["3$matrix[2]"];
        }
        else{
            if($matrix[1]==$matrix[2] || $matrix[2]=='w'){
                $win_amount=$paytable["3$matrix[1]"];
            }
            else{
                $win_amount = 0;
            }
        }
    
    return $win_amount;
}

function scatter3_logic(){
    $win_amount = 0;
    $matrix = getmatrixS3();
    for($i = 0; $i <20; $i++){
    $win_amount+=win_slotS3($matrix);
    }
    return $win_amount;
}

?>