<?php

ini_set('memory_limit', '-1'); //memoria infinita
ini_set("max_execution_time", 0); //tempo esecuzione infinito

include "php_serial.class.php";

$serial = new phpSerial;
$serial->deviceSet("/dev/ttyUSB5");
$serial->confBaudRate(115200);
$serial->confParity("none");
$serial->confCharacterLength(8);
$serial->confStopBits(1);
$serial->confFlowControl("none");
$serial->addVars("-echo");

$lang = "ita";
include "lang.php";

?>
