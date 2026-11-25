<?php

$filename = "myfile.txt";

// 1. Check if the file exists
if (file_exists($filename)) {
    echo "File already exists.<br>";
} else {
    echo "File does not exist.<br>";

    // 2. Create the file
    $file = fopen($filename, "w");

    if ($file) {
        fwrite($file, "Hello! This is my PHP file.");
        fclose($file);

        echo "File created successfully.<br>";
    }
}

// 3. Delete the file
if (file_exists($filename)) {
    if (unlink($filename)) {
        echo "File deleted successfully.";
    } else {
        echo "Failed to delete the file.";
    }
} else {
    echo "File is not available to delete.";
}

?>