<?php

class Cart {
    private $id;
    private $name;
    private $price;
    private $quantity;

    private $conn;

    public function __construct($name, $price, $quantity,$conn) {
        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->conn = $conn;
    }

    public function getId() { return $this->id; }
    public function setId($id) { $this->id = $id; }

    public function getName() { return $this->name; }
    public function setName($name) { $this->name = $name; }

    public function getPrice() { return $this->price; }
    public function setPrice($price) { $this->price = $price; }

    public function getQuantity() { return $this->quantity; }
    public function setQuantity($quantity) { $this->quantity = $quantity; }


   public function insertCart(){
        if (isset($_POST['submit'])){
            $quantity = $_POST['qte_product'];
        
            $queryCart = "INSERT INTO TEST_I.CART(NAME_P,PRICE,QUANTITY)
                          VALUES ('$this->name', '$this->price', '$quantity')";
            
            $resultCart = mysqli_query($this->conn, $queryCart);
            
            
        }
    
   }

}
?>
