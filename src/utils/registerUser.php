<?php
require_once __DIR__.'/../models/Register.php';


$email = $_POST['email'];
$password = $_POST['password'];
$name = $_POST['name'];
$surname = $_POST['surname'];

Register::register($email, $password, $name, $surname);