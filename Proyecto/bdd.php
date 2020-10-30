<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=MyClinic;charset=utf8', 'DrBot', 'MyClinic@');
}
catch(Exception $e)
{
        die('Error : '.$e->getMessage());
}
