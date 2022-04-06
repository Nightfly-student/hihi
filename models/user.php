<?php

namespace Models;

class User implements \JsonSerializable  {
    private int $user_id;
    private string $username;
    private string $email;
    private string $password;
    private string $salt;
    private string $billing_name;
    private string $billing_lastname;
    private string $billing_address;
    private string $billing_phone;
    private string $billing_country;

    public function getId(): int
    {
        return $this->user_id;
    }
    public function getUsername(): string
    {
        return $this->username;
    }
    public function getEmail(): string
    {
        return $this->email;
    }
    public function getPassword(): string
    {
        return $this->password;
    }
    public function getSalt(): string 
    {
        return $this->salt;
    }
    public function getFirstname(): string
    {
        return $this->billing_name;
    }
    public function getLastname(): string
    {
        return $this->billing_lastname;
    }
    public function getAddress(): string
    {
        return $this->billing_address;
    }
    public function getCountry(): string
    {
        return $this->billing_country;
    }
    public function getPhonenumber(): string
    {
        return $this->billing_phone;
    }

    #[\ReturnTypeWillChange]
    public function jsonSerialize()  {
        $vars = get_object_vars($this);
        return $vars;
    }
}
?>