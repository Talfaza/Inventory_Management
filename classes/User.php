<?php


class User {
    private $id;
    private $username;
    private $email;
    private $password;
    private $conn; // Added property

    public function __construct($username, $email, $password, $conn) {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->conn = $conn; // Initialize the connection property
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

    public function insertUser() {
        $insert_query = $this->conn->prepare("INSERT INTO TEST_I.USER (user, email, pass) VALUES (?, ?, ?)");
        $insert_query->bind_param("sss", $this->username, $this->email, $this->password);

        if ($insert_query->execute()) {
            header('Location: login.php');
            exit;
        } else {
            echo "Error: " . $insert_query->error;
        }

        $insert_query->close();
    }

    public function fetchEmail(){
        $check_query = $this->conn->prepare("SELECT * FROM TEST_I.USER WHERE email = ?");
        $check_query->bind_param("s",$this->email);
        $check_query->execute();
        
    }

    public function fetchUser($user_value){
        $stmt = $this->conn->prepare("SELECT * FROM TEST_I.USER WHERE user = ?");
        $stmt->bind_param("s", $user_value);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result;


    }

    public function numRow($result) {
            return $result->num_rows;
    }

}

   
?>
