<?php

class Contact {

    private $idContact;
    private $userContact;
    private $emailContact;
    private $msgContact;
    private $statusContact;
    private $conn;

    // Constructor
    public function __construct($userContact, $emailContact, $msgContact, $statusContact,$conn) {
        $this->userContact = $userContact;
        $this->emailContact = $emailContact;
        $this->msgContact = $msgContact;
        $this->statusContact = $statusContact;
        $this->conn = $conn;
    }

    // Getters
    public function getUserContact() { return $this->userContact; }

    public function getEmailContact() { return $this->emailContact; }

    public function getMsgContact() { return $this->msgContact; }
    
    public function getStatusContact() { return $this->statusContact; }

    // Setters
    public function setUserContact($userContact) {$this->userContact = $userContact;}

    public function setEmailContact($emailContact) {$this->emailContact = $emailContact;}

    public function setMsgContact($msgContact) {$this->msgContact = $msgContact;}
    
    public function setStatusContact($statusContact) {$this->statusContact = $statusContact;}

    public function insertData($userContact,$emailContact,$messageContact,$status){
        $stmt = $this->conn->prepare("INSERT INTO TEST_I.CONTACT (user, email, msg, stat) VALUES (?, ?, ?,?)");
        $stmt->bind_param("ssss", $userContact, $emailContact, $messageContact, $status);
        $stmt->execute();
    }

}

?>
