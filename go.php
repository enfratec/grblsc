<?php

include "config.php";
$rustart = getrusage();

echo ("<script language='JavaScript' type='text/javascript'>
<!--
setInterval('window.scroll(0, Math.pow(10,10))', 1000);
//-->
</script>");

echo ("Avvio programma: " . $_GET['x'] . "<br>");
$nome = $_GET['x'];

$serial->deviceOpen();
sleep (1);
$serial->sendMessage("\r\n\r\n");
sleep(2);
$read = $serial->readPort();
echo ($read."<br>");
$read = "";
$array = explode("\n", file_get_contents('./upload/' . $nome));
$num_max = count($array);
echo ("Numero righe: " . $num_max . "<br>");
$num = 0;
//$time=0;
$cmd = "";
while ($num !== $num_max) {
    top:
    if (file_exists("cmd.do")) {
        $fh = fopen("cmd.do", 'r');
        $cmd = fread($fh, filesize("cmd.do"));
        fclose($fh);
        unlink("cmd.do");
        echo '<br>Eseguo comando: ' . $cmd;
        sleep (1);
        $serial->sendMessage($cmd . "\r\n");
        usleep(500);
        $read = $serial->readPort();
        echo($read);
        $read = "";
        sleep(2);
        $read = $serial->readPort();
        echo($read);
        $read = "";
        ob_flush();
        flush();
    }
    if ($cmd === "!"){
        goto top; 
    }
    

    $serial->sendMessage($array[$num] . "\r\n");
    echo ("SND: " . $num . " CMD: " . $array[$num] );
    $num++;
    $ok = "";
    while ($ok != "ok") {
      $ok = "";
     // $time++;    la macchina può essere messa in pausa, quindi andrebbe in conflitto!
     // if (isset($cmd)) {
     //       if ($cmd === "!"){
     //       $time = 0; 
     //       }
      $read = $serial->readPort();
      $ok = substr($read, 0, 2);
      usleep(500);
      if ($ok == "er") {
         echo ($read);
         $serial->deviceClose();
	 die("<br><h1>Errore!!!!</h1>");
      }
      //if ($time == "120000") {
      //    echo ("<br><h1>Timeout!</h1>");
      //    $serial->deviceClose();
	//  die("<br><h1>Errore!!!!</h1>");
        //  }
      //$time = 0;
      ob_flush();
      flush();
    }
   echo ($ok . "<br>");
   }

$serial->deviceClose();

function rutime($ru, $rus, $index) {
    return ($ru["ru_$index.tv_sec"]*1000 + intval($ru["ru_$index.tv_usec"]/1000))
     -  ($rus["ru_$index.tv_sec"]*1000 + intval($rus["ru_$index.tv_usec"]/1000));
}

$ru = getrusage();
echo "This process used " . rutime($ru, $rustart, "utime") .
    " ms for its computations\n";
echo "It spent " . rutime($ru, $rustart, "stime") .
    " ms in system calls\n<br>";
echo "Memory used: ";
echo (memory_get_usage()/1024 . " KB") . "\n";
?>