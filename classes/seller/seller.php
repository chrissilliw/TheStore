<?php

class Seller extends SellerMode{

    private string $firstname;
    private string $lastname;
    private string $email;

    public function __construct($firstname, $lastname, $email) {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
    }

    public function getFirstname(): string {
        return $this->$firstname;
    }

    public function getLastname(): string {
        return $this->$lastname;
    }
}