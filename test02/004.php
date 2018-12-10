<?php
    header('Content-type:text/html;charset=utf-8');
    for($i=1;$i<10;$i++)
    {
        for($j=1;$j<=$i;$j++)
        {
            echo '<span style="border: solid black 1px;width: 80px;height:50px;">'.$j.'*'.$i.'='.$i*$j.'</span>';
        }
        echo '<br>';
    }
?>

