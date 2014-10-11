<?php
include_once 'config.php';
  echo ($tmodp . $_GET['x']); 
  $nome = $_GET['x'];
?>

<?php
  $theData = "";
  if(isset($_POST['data'])) {
    $myFile = "upload/".$nome;
    $fh = fopen($myFile, 'w');
    fwrite($fh, $_POST['data']);
    die("<script>location.href = 'command.php'</script>");
  } else {
    $myFile = "upload/".$nome;
    $fh = fopen($myFile, 'r');
    $theData = fread($fh, filesize($myFile));
  }
  fclose($fh);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<form name="test" method="post" action="">
<textarea name="data" cols="55" rows="20"><?php echo $theData; ?></textarea><br>
<input type="submit" name="submit" value="Save" />
</form>
</body>
</html>
