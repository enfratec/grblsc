<h2 style="text-align: center;"><span style="font-family:arial,helvetica,sans-serif;">File caricati:</span></h2>
<?php
include_once 'config.php';
    if ($handle = opendir('upload/')) {
        echo ("<table>");
    	while (false !== ($entry = readdir($handle))) {
    		if ($entry != "." && $entry != "..") {
    			echo '<tr><td><a href="go.php?x='.$entry.'" target="log">'.$entry.'</a></td>';
    			echo '<td><a href="edit.php?x='.$entry.'" target="edit">'.$edit.'</a></td>';
    			echo '<td><a href="del.php?x='.$entry.'">'.$del.'</a></td>';
                        $array = explode("\n", file_get_contents('./upload/' . $entry));
                        echo ("<td>" . $tnr . count($array). "</td></tr>");
    		}
    	}
    	closedir($handle);
        echo ("</table>");
    }
?>
