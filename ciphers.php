<?php

function cipher_full_invert ($source) {
	$source = strtolower($source);
	$key = array (
		'a'=>'z',
		'b'=>'y',
		'c'=>'x',
		'd'=>'w',
		'e'=>'v',
		'f'=>'u',
		'g'=>'t',
		'h'=>'s',
		'i'=>'r',
		'j'=>'q',
		'k'=>'p',
		'l'=>'o',
		'm'=>'n',
		'n'=>'m',
		'o'=>'l',
		'p'=>'k',
		'q'=>'j',
		'r'=>'i',
		's'=>'h',
		't'=>'g',
		'u'=>'f',
		'v'=>'e',
		'w'=>'d',
		'x'=>'c',
		'y'=>'b',
		'z'=>'a',
		'0'=>'9',
		'1'=>'8',
		'2'=>'7',
		'3'=>'6',
		'4'=>'5',
		'5'=>'4',
		'6'=>'3',
		'7'=>'2',
		'8'=>'1',
		'9'=>'0'
		);

	$result = strtr ($source, $key);
	return $result;
}

function cipher_caesar ($source) {
	$source = strtolower($source);
	$key = array (
		'a'=>'x',
		'b'=>'y',
		'c'=>'z',
		'd'=>'a',
		'e'=>'b',
		'f'=>'c',
		'g'=>'d',
		'h'=>'e',
		'i'=>'f',
		'j'=>'g',
		'k'=>'h',
		'l'=>'i',
		'm'=>'j',
		'n'=>'k',
		'o'=>'l',
		'p'=>'m',
		'q'=>'n',
		'r'=>'o',
		's'=>'p',
		't'=>'q',
		'u'=>'r',
		'v'=>'s',
		'w'=>'t',
		'x'=>'u',
		'y'=>'v',
		'z'=>'w',
		'0'=>'3',
		'1'=>'4',
		'2'=>'5',
		'3'=>'6',
		'4'=>'7',
		'5'=>'8',
		'6'=>'9',
		'7'=>'0',
		'8'=>'1',
		'9'=>'2'
		);

	$result = strtr ($source, $key);
	return $result;
}

function reverse_caesar ($source) {
	$source = strtolower($source);
	$key = array (
		'x'=>'a',
		'y'=>'b',
		'z'=>'c',
		'a'=>'d',
		'b'=>'e',
		'c'=>'f',
		'd'=>'g',
		'e'=>'h',
		'f'=>'i',
		'g'=>'j',
		'h'=>'k',
		'i'=>'l',
		'j'=>'m',
		'k'=>'n',
		'l'=>'o',
		'm'=>'p',
		'n'=>'q',
		'o'=>'r',
		'p'=>'s',
		'q'=>'t',
		'r'=>'u',
		's'=>'v',
		't'=>'w',
		'u'=>'x',
		'v'=>'y',
		'w'=>'z',
		'0'=>'3',
		'1'=>'4',
		'2'=>'5',
		'3'=>'6',
		'4'=>'7',
		'5'=>'8',
		'6'=>'9',
		'7'=>'0',
		'8'=>'1',
		'9'=>'2'
		);

	$result = strtr ($source, $key);
	return $result;
}

function convert_phonetic ($source) {
	$source = strtolower($source);
	$key = array (
		'a'=>'alpha ',
		'b'=>'bravo ',
		'c'=>'charlie ',
		'd'=>'delta ',
		'e'=>'echo ',
		'f'=>'foxtrot ',
		'g'=>'golf ',
		'h'=>'hotel ',
		'i'=>'india ',
		'j'=>'juliett ',
		'k'=>'kilo ',
		'l'=>'lima ',
		'm'=>'mike ',
		'n'=>'november ',
		'o'=>'oscar ',
		'p'=>'papa ',
		'q'=>'quebec ',
		'r'=>'romeo ',
		's'=>'sierra ',
		't'=>'tango ',
		'u'=>'uniform ',
		'v'=>'victor ',
		'w'=>'whiskey ',
		'x'=>'x-ray ',
		'y'=>'yankee ',
		'z'=>'zulu ',
		'0'=>'null ',
		'1'=>'one ',
		'2'=>'two ',
		'3'=>'three ',
		'4'=>'four ',
		'5'=>'five ',
		'6'=>'six ',
		'7'=>'seven ',
		'8'=>'eight ',
		'9'=>'nine '
		);

	$result = strtr ($source, $key);
	return $result;
}

function convert_binary ($source) {
	$source = strtolower($source);
	$key = array (
		'a'=>'01100001',
		'b'=>'01100010',
		'c'=>'01100011',
		'd'=>'01100100',
		'e'=>'01100101',
		'f'=>'01100110',
		'g'=>'01100111',
		'h'=>'01101000',
		'i'=>'01101001',
		'j'=>'01101010',
		'k'=>'01101011',
		'l'=>'01101100',
		'm'=>'01101101',
		'n'=>'01101110',
		'o'=>'01101111',
		'p'=>'01110000',
		'q'=>'01110001',
		'r'=>'01110010',
		's'=>'01110011',
		't'=>'01110100',
		'u'=>'01110101',
		'v'=>'01110110',
		'w'=>'01110111',
		'x'=>'01111000',
		'y'=>'01111001',
		'z'=>'01111010',
		'0'=>'00110000',
		'1'=>'00110001',
		'2'=>'00110010',
		'3'=>'00110011',
		'4'=>'00110100',
		'5'=>'00110101',
		'6'=>'00110110',
		'7'=>'00110111',
		'8'=>'00111000',
		'9'=>'00111001',
		':'=>'00111010',
		'/'=>'00101111',
		'.'=>'00101110'
	);
	
	$result = strtr ($source, $key);
	return $result;
}

function cipher_d_scramble ($source) {
	
	/*
	
	This function does many things. Here goes.
	
	1. converts all text to lower case.
	2. converts all text to binary (8-number representation of each letter)
	3. inverts binary numbers
	4. adds up each repeating occurrence of binary numbers. 
		Two 1's in a row become a 2. 
		Two 0's in a row become the alpha equivalent of 2, being 'b'.
	
	Example:
	
	A -> a -> 01100001 -> 10011110 -> 1b4a
	
	*/
	
	$binary_inverter = array ( '0'=>'1', '1'=>'0' );
	
	$source = strtolower($source); // lowercase
	$binary = convert_binary($source); // convert to binary
	$binary = strtr ($binary, $binary_inverter); // invert binary
	
	$binary = $binary."x"; // add end-marker
	$stringarray = str_split ($binary); // build an array
	
	$number_to_letter = array (
		'1'=>'a',
		'2'=>'b',
		'3'=>'c',
		'4'=>'d',
		'5'=>'e',
		'6'=>'f',
		'7'=>'g',
		'8'=>'h'
		);
		
	$count = count($stringarray);
	$zero_running_total = 0;
	$one_running_total = 0;
	
	foreach ($stringarray as $arraychar) {
		if ($arraychar=="0") {
			if ($one_running_total!="0") { $newstring.=$one_running_total; }
			$zero_running_total++;
			$one_running_total="0";
		}
		if ($arraychar=="1") {
			if ($zero_running_total!="0") { 
				$zero_running_total = strtr($zero_running_total, $number_to_letter);
				$newstring.=$zero_running_total; 
			}
			$one_running_total++;
			$zero_running_total="0";
		}
		if ($arraychar=="x") {
			if ($zero_running_total!="0") { 
				$zero_running_total = strtr($zero_running_total, $number_to_letter);
				$newstring.=$zero_running_total; 
			}
			if ($one_running_total!="0") { $newstring.=$one_running_total; }
		}
	}
	
	$result = $newstring;
	return $result;	
}

?>