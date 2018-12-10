<?php
$line=1;
while ($line<=10){
    $empty_pos=$star_pos=1;
    $empty=10-$line;
    $star=2*$line-1;
    while ($empty_pos<=$empty){
        echo "&nbsp";
        $empty_pos++;
    }
    while ($star_pos<=$star){
        echo "*";
        $star_pos++;
    }
    echo "<br/>";
    $line++;
}
?>