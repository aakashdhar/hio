<?php

if (!function_exists('cust_reg_no')) {
  function cust_reg_no(){
    $x = 3; // Amount of digits
    $min = pow(10,$x);
    $max = pow(10,$x+1)-1;
    $value = rand($min, $max);
    $regnumb = "oh".$value;
    return $regnumb;
  }
}
