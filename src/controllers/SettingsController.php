<?php

require_once 'AppController.php';

class SettingsController extends AppController {
    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES = ['image/png', 'image.jpg'];
    const UPLOAD_DIRECTORY = '/../public/uploads/';

    private $messages = [];

    public function updateDetails() {

    }

    public function updatePassword() {

    }

    public function updatePhoto() {
        echo($this->isPost());
        echo(is_uploaded_file($_FILES['file']['tmp_name']));
        if($this->isPost() && is_uploaded_file($_FILES['file']['tmp_name']) && $this->validate($_FILES['file'])) {
            move_uploaded_file(
                $_FILES['file']['tmp_name'],
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['file']['name']
            );
        }

        echo('doopa');
        $this->render('settings', []);
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