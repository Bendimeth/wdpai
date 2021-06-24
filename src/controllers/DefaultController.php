<?php

require_once 'AppController.php';

class DefaultController extends AppController {

    public function index() {
        // display login.html
        die('login');
    }

    public function project() {
        // display projects.html
        die('projects');
    }
}