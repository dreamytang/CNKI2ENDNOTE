<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>CNKI to ENDNOTE</title>
</head>

<style type="text/css">
* { margin: 0; padding: 10px; word-wrap: break-word; }
ul li, .xl li { list-style: none; }

body {background: #FFF; background-image:none; line-height: 130%; font-size: 24pt; font-style: normal; font-family: Arial,Helvetica,sans-serif;}
textarea {background: #ffffff; border: 2px solid #b7b7b7; color: #003366; font-size: 14pt;}
</style>

<body style="font-size: 14px; line-height: 20px;">
<?php
//start processing posts
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //process urls
    $result = "";
    if (isset($_POST["content"]) && !empty($_POST["content"])) {
        $buffer = trim($_POST["content"]);
        $buffer = str_replace("%0 Journal Article", "%0 Chinese", $buffer);
        $paperarray = explode("\n\r", $buffer);
        foreach ($paperarray as $paper) {
            $ep = "\n";
            $linearray = explode("\n", $paper);
            foreach ($linearray as $line) {
                if (strpos($line, "%A") !== false) {
                    $ep .= str_replace("%A", "%E", $line) . "\n";
                }
            }
            $paper .= $ep;
            $result .= $paper;
        }
    }
    echo "<textarea name=\"ttt\" cols=\"60\" rows=\"16\">" . trim($result) . "</textarea><br><br>";
}
?>
<form action="MO.php" method="post">
File Content:<br>
<textarea name="content" cols="60" rows="8"></textarea><br><br>
<input type="submit" name="submit" value="submit">
</body>
</html>
