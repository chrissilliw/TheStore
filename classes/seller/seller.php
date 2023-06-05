<?php

class Seller {

    private int $id;
    private $firstname;
    private $lastname;
    private $email;

    public function __construct(int $id, string $firstname, string $lastname, string $email) {
        $this->id = $id;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getFirstname(): string {
        return $this->firstname;
    }

    public function getLastname(): string {
        return $this->lastname;
    }

    public function getEmail(): string {
        return $this->email;
    }
}