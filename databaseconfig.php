<?php

define('svName','localhost');
define('usName','root');
define('passName','mysql');
define('dataBaseName','mycrud');

try{
$conn = new PDO ('mysql:host='. svName . ';dbname=' . dataBaseName , usName , passName);
$conn->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);

}

catch(PDOException $e){
echo $e-> getMessage();
}
