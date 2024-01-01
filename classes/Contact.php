<?php

class Contact {

    private $idContact;
    private $userContact;
    private $emailContact;
    private $msgContact;
    private $statusContact;

    // Constructor
    public function __construct($userContact, $emailContact, $msgContact, $statusContact) {
        $this->userContact = $userContact;
        $this->emailContact = $emailContact;
        $this->msgContact = $msgContact;
        $this->statusContact = $statusContact;
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
}

?>
