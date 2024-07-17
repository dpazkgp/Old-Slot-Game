<?php
require 'Scatter2.php';
require 'Scatter3.php';

$paytable =  array("3w"=>100, "3a"=>16, "3b"=>14, "3c"=>8, "3d"=>6, "3e"=>4, "3s"=>0);

function create_matrix(){
    $Reel1 ="acbcecabdcbeddeacbdecsadebcdbsedceawedewdcw";
    $Reel2 = "ebacdewcbwdecbacebdsbedwcbeacdsecdbawedcadse";
    $Reel3 = "ebcedbdceadwbceadcedescedcaebcwdedbcaeabd";
    
    $array_reel1 = str_split($Reel1);
    $array_reel2 = str_split($Reel2);
    $array_reel3 = str_split($Reel3);

    $matrix = array($array_reel1[rand(0,42)],$array_reel2[rand(0,43)],$array_reel3[rand(0,40)]);

    return $matrix;
}

function BG_win($matrix){
    global $paytable;
    $win_amount = 0;
    $firstElement = $matrix[0];
    if($firstElement=='w'){
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
    }
    else{
        if($matrix[1]=='w'){
            if($matrix[0]==$matrix[2]||$matrix[2]=='w'){
                $win_amount=$paytable["3$matrix[0]"];
            }
            else{
                $win_amount=0;
            }
        }
        else{
            if($matrix[0]==$matrix[1]){
                if($matrix[2]=='w'){
                    $win_amount=$paytable["3$matrix[0]"];
                }
                elseif($matrix[1]==$matrix[2]){
                    $win_amount=$paytable["3$matrix[0]"];
                }
                else{
                    $win_amount=0;
                }
            }
        }
    }
    return $win_amount;
}

function S2_win($matrix){
    $scatter=0;
    $win_amount=0;
    for($i=0;$i<3;$i++){
        if($matrix[$i]=='s'){
            $scatter++;
        }
    }
    if($scatter==2){
        $win_amount = scatter2_logic();
    }
    return $win_amount;
}

function S3_win($matrix){
    $win_amount=0;
    if($matrix == ['s','s','s']){
        $win_amount = scatter3_logic();
    }
    return $win_amount;
}

function logic(){
    global $paytable;
    $winn_amount = 0;
    $matrix = create_matrix();
    $win_amount = 0;
    $win_amount = BG_win($matrix) + S2_win($matrix) + S3_win($matrix);
    
    return $win_amount;
}

$Win = login();

?>