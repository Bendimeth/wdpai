<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/ActivityLog.php';

class ActivityRepository extends Repository
{

    public function getActivities(string $id): ? array
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * from activities WHERE id_assigned_by = :id;
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();

        $activities = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($activities == false) {
            return null;
        }

        function extractActivityData($activity): ActivityLog {
            return new ActivityLog(
                $activity['title'],
                $activity['description'],
                $activity['created_at']
            );
        }

        return array_map('extractActivityData', $activities);
    }

    public function addActivity(ActivityLog $activity): void {
        $date = new DateTime();
        $stmt = $this->database->connect()->prepare('
            INSERT INTO activities (title, description, created_at, id_assigned_by)
            VALUES (?, ?, ?, ?)
        ');

        $assignedById = 1;

        $stmt->execute([
            $activity->getTitle(),
            $activity->getDescription(),
            $date->format('Y-m-d'),
            $assignedById
        ]);
    }
}