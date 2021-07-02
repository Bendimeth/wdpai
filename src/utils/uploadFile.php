<?php

$filename = $_FILES['file']['name'];

$location = "public/uploads/".$filename;
$uploadOk = 1;

if ($uploadOk == 0) {
    echo 0;
} else {
    if (move_uploaded_file($_FILES['file']['tmp_name'], dirname(__DIR__).'/../public/uploads/'.$_FILES['file']['name'])) {
        echo $location;
    } else {
        echo 0;
    }
}