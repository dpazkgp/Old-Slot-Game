<?php
function getmatrixS2(){
    $Reel1 ="wwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwww";
    $Reel2 ="ebacdewcbwdecbacebdbedwcbeacdecdbawedcade";
    $Reel3 ="ebcedbdceadwbceadcedecedcaebcwdedbcaeabd";
    
    $array_reel1 = str_split($Reel1);
    $array_reel2 = str_split($Reel2);
    $array_reel3 = str_split($Reel3);

    $matrix = array($array_reel1[rand(0,40)],$array_reel2[rand(0,40)],$array_reel3[rand(0,39)]);

    return $matrix;


}

function win_slotS2($matrix){
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
function scatter2_logic(){
    $win_amount=0;
    $matrix=getmatrixS2();
    for($i=0;$i<15;$i++){
    $win_amount+= win_slotS2($matrix);
    }
    return $win_amount;
}

?>