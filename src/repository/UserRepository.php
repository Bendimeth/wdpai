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

//        var_dump($user);

        if ($user == false) {
            echo '1';
        } else {
            $userData = new User(
                $user['email'],
                $user['password'],
                $user['name'],
                $user['surname']
            );
//            echo $user['email'].'/'.$user['name'].'/'.$user['surname'];
            echo json_encode(array(
                "email" => $user['email'],
                "name" => $user['name'],
                "surname" => $user['surname'],
                "photo" => $user['photo'],
                "currentUserId" => $user['id']
            ));
        }
    }
}