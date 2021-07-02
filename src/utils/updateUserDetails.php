<?php
require_once __DIR__.'/../repository/UserRepository.php';


$name = $_POST['name'];
$surname = $_POST['surname'];
$photo = $_POST['photo'];
$email = $_POST['email'];
$id = $_POST['id'];


UserRepository::updateUserDetails($email, $name, $surname, $photo, $id);