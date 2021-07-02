<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';

class UserRepository extends Repository
{

    public static function getUser(string $email, string $password): void
    {
        $database = new Database();
        $stmt = $database->connect()->prepare('
            SELECT * FROM public.users WHERE email = :email and password = :password
        ');
        $hashedPassword = md5($password);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $hashedPassword, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user == false) {
            echo '1';
        } else {
            echo json_encode(array(
                "email" => $user['email'],
                "name" => $user['name'],
                "surname" => $user['surname'],
                "photo" => $user['photo'],
                "currentUserId" => $user['id']
            ));
        }
    }

    public static function getUserById(string $id): void {
        $database = new Database();

        $stmt = $database->connect()->prepare('
            SELECT * FROM public.users WHERE id = :id 
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user == false) {
            echo '1';
        } else {
            echo json_encode(array(
                "email" => $user['email'],
                "name" => $user['name'],
                "surname" => $user['surname'],
                "photo" => $user['photo'],
                "currentUserId" => $user['id']
            ));
        }
    }

    public static function updateUserDetails(string $email, string $name, string $surname, string $photo, string $id): void {
        $database = new Database();
        $stmt = $database->connect()->prepare('
            UPDATE users set name = :name, surname = :surname, email = :email, photo = :photo where id = :id
        ');
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':surname', $surname, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':photo', $photo, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);

        $stmt->execute();
    }

    public static function updateUserPassword(string $oldPassword, string $newPassword, string $id): void
    {
        $database = new Database();
        $hashedOldPassword = md5($oldPassword);
        $hashedNewPassword = md5($newPassword);
        $stmt = $database->connect()->prepare('
            UPDATE users set password = :new_password where id = :id and password = :old_password
        ');
        $stmt->bindParam(':old_password', $hashedOldPassword, PDO::PARAM_STR);
        $stmt->bindParam(':new_password', $hashedNewPassword, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);

        $stmt->execute();
    }
}