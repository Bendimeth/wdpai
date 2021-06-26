<?php
require_once __DIR__ . '/../../Database.php';

class Register {
    public function __construct() {

    }
    public static function register($email, $password, $name, $surname) {
        $database = new Database();
        $hashedPassword = md5($password);

        $stmt = $database->connect()->prepare('
            SELECT * FROM users WHERE email = :email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $respond = $stmt->fetch();

        if (!$respond) {
            $stmt = $database->connect()->prepare('
                INSERT INTO users(name, surname, email, password)
                VALUES(?, ?, ?, ?);
            ');
            $stmt->execute([
                $name,
                $surname,
                $email,
                $hashedPassword

            ]);
            echo 0;
        } else {
            echo 1;
        }
    }
}