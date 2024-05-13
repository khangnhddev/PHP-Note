<?php
	//require('generator.php');
	//require('closure.php');
	//require('trait.php');
   //require('iterator.php');
//	require('multiple_function_argument.php');
//	$binaryString = "Hello, world!";
//	$hexString = bin2hex($binaryString);
//	
//	echo $hexString; // Output: 48656c6c6f2c20776f726c6421

	$hexString = "48656c6c6f2c20776f726c6421";
	$binaryString = hex2bin($hexString);
	
	echo $binaryString; // Output: Hello, world!
?>