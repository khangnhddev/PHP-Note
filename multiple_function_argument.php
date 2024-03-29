<?php

function test1($a,$b){
  return [$a,$b];
}

function test2($a,$b,$c){
  return [$a,$b,$c];
} 

function callFunction($func,...$data){
   var_dump(call_user_func_array($func,$data));
}

callFunction('test2','php','laravel','nodejs');
