<?php

require_once 'AppController.php';
require_once __DIR__ .'/../models/ActivityLog.php';
require_once __DIR__.'/../repository/ActivityRepository.php';

class DashboardController extends AppController {
    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES = ['image/png', 'image.jpg'];
    const UPLOAD_DIRECTORY = '/../public/uploads/';

    private $messages = [];
    private $activityLogs = [];
    private $activityRepository;

    public function __construct() {
        parent::__construct();
        $this->activityRepository = new ActivityRepository();
        $this->activityLogs = $this->activityRepository->getActivities(1);
    }

    public function dashboard() {
        $this->render('dashboard', ['activityLogs' => $this->activityLogs]);
    }

    public function createLog() {
        if($this->isPost() && is_uploaded_file($_FILES['file']['tmp_name']) && $this->validate($_FILES['file'])) {
            move_uploaded_file(
                $_FILES['file']['tmp_name'],
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['file']['name']
            );
        }

//        $this->activityLogs[] = new ActivityLog($_POST['title'], $_POST['description'], $_POST['file']['name']);
        echo($_POST['title']);
        echo( $_POST['description']);

        $activityLog = new ActivityLog($_POST['title'], $_POST['description'], $_POST['file']['name']);
        $this->activityRepository->addActivity($activityLog);
        $this->activityLogs[] = $activityLog;

        $this->render('dashboard', ['messages' => $this->messages, 'activityLogs' => $this->activityLogs]);
    }

    private function validate(array $file): bool {
        if ($file['size'] > self::MAX_FILE_SIZE) {
        echo('wrong size');

            $this->messages[] = 'File is too large for upload.';
            return false;
        }

        if (isset($file['type']) && !in_array($file['type'], self::SUPPORTED_TYPES)) {
        echo('wrong type');

            $this->messages[] = 'File type is not supported.';
            return false;
        }
        echo('true');

        return true;
    }
}