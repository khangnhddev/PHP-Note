<?php
$myArr=[1,2,3,4,5];

function showMyArr($myArr){
  return $myArr;
}


$startMemory = memory_get_usage();
$totalMemmoryUsage=memory_get_usage()-$startMemory;

var_dump($totalMemmoryUsage);

function showMyArrWithGeneratormyArr($myArr){
		foreach($myArr as $item){
			yield $item;
		}
}

$testGenerator=showMyArrWithGeneratormyArr($myArr);

foreach($testGenerator as $item){
	var_dump($item);
}