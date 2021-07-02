<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/ActivityLog.php';
require_once __DIR__.'/../controllers/AppController.php';

class ActivityRepository extends Repository
{

    public static function getMineActivities($userId): void
    {
        $database = new Database();
        $stmt = $database->connect()->prepare('
            SELECT a.id, a.id_assigned_by, a.title, a.description, a.created_at, u.name, u.surname, a.photo from activities a join users u on a.id_assigned_by = u.id and a.id_assigned_by = :userId
        ');
        $stmt->bindParam(':userId', $userId, PDO::PARAM_STR);
        $stmt->execute();

        $activities = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($activities == false) {
            echo '1';
        } else {
            function extractActivityData($activity) {
                return json_encode(array(
                    "title" => $activity['title'],
                    "description" => $activity['description'],
                    "createdAt" => $activity['created_at'],
                    "photo" => $activity['photo'],
                    "userName" => $activity['name'],
                    "userSurname" => $activity['surname'],
                    "assignedById" => $activity['id_assigned_by'],
                    "activityId" => $activity['id']
                ));
            }
        }

        $mappedActivities = array_map('extractActivityData', $activities);
        echo json_encode($mappedActivities);
    }

    public static function getAllActivities(): void
    {
        $database = new Database();
        $stmt = $database->connect()->prepare('
            SELECT a.id, a.id_assigned_by, a.title, a.description, a.created_at, u.name, u.surname, a.photo from activities a join users u on u.id = a.id_assigned_by
        ');
        $stmt->execute();

        $activities = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($activities == false) {
            echo '1';
        } else {
            function extractActivityData($activity) {
                return json_encode(array(
                    "title" => $activity['title'],
                    "description" => $activity['description'],
                    "createdAt" => $activity['created_at'],
                    "photo" => $activity['photo'],
                    "userName" => $activity['name'],
                    "userSurname" => $activity['surname'],
                    "assignedById" => $activity['id_assigned_by'],
                    "activityId" => $activity['id']
                ));
            }
        }

        $mappedActivities = array_map('extractActivityData', $activities);
        echo json_encode($mappedActivities);
    }

    public static function addActivity($title, $description, $photo, $assignedById): void {
        $database = new Database();
        $date = new DateTime();
        $stmt = $database->connect()->prepare('
            INSERT INTO activities (title, description, created_at, id_assigned_by, photo)
            VALUES (?, ?, ?, ?, ?)
        ');

        $stmt->execute([
            $title,
            $description,
            $date->format('Y-m-d'),
            $assignedById,
            $photo
        ]);
    }

    public static function deleteActivity($id): void {
        $database = new Database();
        $stmt = $database->connect()->prepare('
            DELETE FROM activities a where a.id = :id 
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);

        $stmt->execute();
    }
}