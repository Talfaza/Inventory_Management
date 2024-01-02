<?php

class Cart {
    private $id;
    private $name;
    private $price;
    private $quantity;

    private $conn;

    private $user_id;

    public function __construct($name, $price, $quantity,$conn,$user_id) {
        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->conn = $conn;
        $this->user_id = $user_id;
    }

    public function getId() { return $this->id; }
    public function setId($id) { $this->id = $id; }

    public function getName() { return $this->name; }
    public function setName($name) { $this->name = $name; }

    public function getPrice() { return $this->price; }
    public function setPrice($price) { $this->price = $price; }

    public function getQuantity() { return $this->quantity; }
    public function setQuantity($quantity) { $this->quantity = $quantity; }

    public function getUserId(){return $this->user_id;}
    public function setUserId($user_id){$this->user_id = $user_id;}


   public function insertCart(){
        if (isset($_POST['submit'])){
            $quantity = $_POST['qte_product'];
        
            $queryCart = "INSERT INTO TEST_I.CART(NAME_P,PRICE,QUANTITY,user_id)
                          VALUES ('$this->name', '$this->price', '$quantity','$this->user_id')";
            
            
            $resultCart = mysqli_query($this->conn, $queryCart);
            
            
        }
    
   }

}
?>
