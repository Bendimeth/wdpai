<?php
require_once __DIR__.'/../repository/UserRepository.php';


$id = $_POST['id'];

UserRepository::getUserById($id);