<?php 

function secondHighest(array $arr) {
    
    sort($arr);
    
    echo $arr[sizeof($arr)-2];
}
 
 
secondHighest(array( 4, 9, 5, 2, 8, 0, 3, 22));
?> 