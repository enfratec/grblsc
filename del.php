<?php
    header("Refresh: 2; url=manager.php");
    $nome = $_GET['x'];
    echo 'Cancello programma: ' .$nome;
    unlink("upload/".$nome);
?>
