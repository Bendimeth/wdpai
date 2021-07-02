<?php

require_once 'AppController.php';

class DefaultController extends AppController {

    public function login() {
        $this->render('login');
    }

    public function settings() {
        $this->render('settings');
    }

    public function notFound() {
        $this->render('404');
    }

    public function main() {
        $this->render('');
    }
}