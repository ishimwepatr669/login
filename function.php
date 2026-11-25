<?php
function add($a,$b){
    return $a+$b;
}
function substraction($a,$b){
    return $a-$b;
}
function division($a,$b){
    return $a/$b;
}
function mulitply($a,$b){
    return $a*$b;
}
function power($a,$b){
    return $a**$b;
}

$x=add(12,6);
echo "the sum of two numbers are: $x";
$x=substraction(12,6);
echo "the substraction of two numbers are: $x";
$x=division(12,6);
echo "the division of two numbers are: $x";
$x=mulitply(12,6);
echo "the mulitplication of two numbers are: $x";
$x=power(12,6);
echo "the power of two numbers are: $x";
?>