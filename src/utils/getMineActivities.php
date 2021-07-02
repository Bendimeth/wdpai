<?php
require_once __DIR__.'/../repository/ActivityRepository.php';

$userId = $_POST['userId'];

ActivityRepository::getMineActivities($userId);