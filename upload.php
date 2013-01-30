<?php
define("DIR_TO_UPLOAD", "C:/wamp/www/UploadAndShareApp/");

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_FILES["uploadFile"])) 
   {
    $uploadFile = $_FILES["uploadFile"];

    if ($uploadFile["error"] !== UPLOAD_ERR_OK) {
        echo "<p>Some Error Has Occured</p>";
        exit;
    }

    $file_name = preg_replace("/[^A-Z0-9._-]/i", "_", $uploadFile["name"]);

    
    $x = 0;
    $path_parts = pathinfo($file_name);
    while (file_exists(DIR_TO_UPLOAD . $file_name)) {
        $x++;
        $file_name = $path_parts["filename"] . "-" . $x . "." . $path_parts["extension"];
    }

    $success = move_uploaded_file($uploadFile["tmp_name"],DIR_TO_UPLOAD . $file_name);
    if (!$success) { 
        echo "<p>File Not Saved</p>";
        exit;
    }
  $command="C:\SWFTools\pdf2swf.exe ".$file_name." -o C:\wamp\www\UploadAndShareApp\Paper.swf -f -T 9 -t -s storeallcharacters";
    chmod(DIR_TO_UPLOAD . $file_name, 0644);//Read and write for owner, read for everybody else. SIR, see here: http://php.net/manual/en/function.chmod.php
    exec($command);
	echo "<p>File saved as " . $file_name.".</p>";
    Echo "<a href=view.html>view file</a>";
	Echo "<br>";
	Echo "<br>";
	Echo "<br> this info can be used to customise our view page";
	Echo "<br>";
	print_r($_FILES);
}

