<?php

class ActivityLog {
    private $title;
    private $description;
    private $photo;

    public function __construct(
        $title,
        $description,
        $photo
    ) {
        $this->title = $title;
        $this->description = $description;
        $this->photo = $photo;
    }

    public function getTitle(): string {
        return $this->title;
    }

    public function setTitle(string $title): void {
        $this->title = $title;
    }

    public function getDescription(): string {
        return $this->description;
    }

    public function setDescription(string $description): void {
        $this->description = $description;
    }

    public function getPhoto(): string {
        return $this->photo;
    }

    public function setPhoto(string $photo): void {
        $this->photo = $photo;
    }
}