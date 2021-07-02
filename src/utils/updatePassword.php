<?php
require_once __DIR__.'/../repository/UserRepository.php';


$oldPassword = $_POST['oldPassword'];
$newPassword = $_POST['newPassword'];
$id = $_POST['id'];

UserRepository::updateUserPassword($oldPassword, $newPassword, $id);