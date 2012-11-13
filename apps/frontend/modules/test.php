<?php
$query='duddud.com';
    $search  = array('.com', '.net', '.az', '.info', '.ru');
    $query=str_replace($search, '',$query);
echo $query;
/*
$nb_axtar_results=1;
  $pages_in_axtar=floor($nb_axtar_results/10);
    //add this variable to show results that are less than 10
    $residual=$nb_axtar_results%10;
echo '$pages_in_axtar='.$pages_in_axtar;
echo '$residual='.$residual;
*/
?>
