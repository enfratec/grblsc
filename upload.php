<?PHP
    $cartella = 'upload/';
    $percorso = $_FILES['miofile']['tmp_name'];
    $nome = $_FILES['miofile']['name'];
    // ESEGUO L'UPLOAD CONTROLLANDO L'ESITO
    if (move_uploaded_file($percorso, $cartella . $nome))
    {
        print "Upload eseguito con successo"; 
    }
    else
    {
        print "Si sono verificati dei problemi durante l'Upload"; 
    }
echo "<meta http-equiv=\"Refresh\" content=\"0;url=$_SERVER[HTTP_REFERER]\">";    
?>
