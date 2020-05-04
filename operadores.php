<?php
/*
$a = 9;
$b = 6;
$c = 7;

$result = $b <5 or $a >=8;
var_dump($result);*/

$username = '....';
$username2 = 'meoliva06.res06@gmail.com';

$regex_ejemplo = '/foo bar/';
//00/01/2000
//31-10-2020
$regex_username = '/([a-z0-9][\.][a-z0-9])@gmail.com/';
echo preg_match($regex_username, $username2);

/*
delimitadores
modificadores (sensible a mayusculas)
metacaracteres agrupadores

*/