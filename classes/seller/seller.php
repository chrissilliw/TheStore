<?php

class Seller {

    //private int $id;
    private string $firstname;
    private string $lastname;
    private string $email;

    public function __construct(string $firstname, string $lastname, string $email) {
       // $this->id = $id;
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
}