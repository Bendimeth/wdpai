<?php
require_once __DIR__.'/../repository/ActivityRepository.php';

$activityId = $_POST['activityId'];

ActivityRepository::deleteActivity($activityId);