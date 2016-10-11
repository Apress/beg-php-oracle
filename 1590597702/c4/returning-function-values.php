<?php

function calcSalesTax($price, $tax=.0675)
{
return $price + ($price * $tax);
}

$price = 6.99;
$total = calcSalesTax($price);

?>