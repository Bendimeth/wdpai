<?php
require_once __DIR__.'/../repository/ActivityRepository.php';


$title = $_POST['title'];
$description = $_POST['description'];
$photo = $_POST['photo'];
$assignedById = $_POST['assignedById'];

ActivityRepository::addActivity($title, $description, $photo, $assignedById);