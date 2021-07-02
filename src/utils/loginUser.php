<?php
require_once __DIR__.'/../repository/UserRepository.php';


$email = $_POST['email'];
$password = $_POST['password'];

UserRepository::getUser($email, $password);