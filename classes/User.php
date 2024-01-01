<?php

class User {
    private $id;
    private $username;
    private $email;
    private $password;

    public function __construct($username, $email, $password) {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }

    // Getters
//    public function getId() {return $this->id;}

    public function getUsername() {return $this->username;}

    public function getEmail() {return $this->email;}

    public function getPassword() {return $this->password;}

    // Setters
//    public function setId($id) {$this->id = $id;}

    public function setUsername($username) {$this->username = $username;}

    public function setEmail($email) {$this->email = $email;}

    public function setPassword($password) {$this->password = $password;}
}

?>
