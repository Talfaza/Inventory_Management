<?php 

class Product {
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


    public function imageDisplay($id) {
        switch ($id) {
            case 1:
                return "pc.png";
            case 2:
                return "laptop.png";
            case 3:
                return "raspberry.png";
            default:
                return "default.png";
        }
    }

    public function updateQte($id){
        $qte_bought = NULL;
        $query = "SELECT * FROM TEST_I.PRODUCT WHERE id_product = '$id'";

        $result = mysqli_query($this->conn, $query);
        $row = mysqli_fetch_array($result);
        $qte = $row['product_quantity_id'];

        if (isset($_POST['submit'])) {
            $qte_bought =  $_POST['qte_product'];
        }

        if ($qte_bought > $qte) {
            $error = '<div class="notification is-primary" style="margin-left:150px;">
            <button class="delete"></button>
            Quantity exceeding the stock limit <br><br><b>Wait for a restock</b>
            </div>';
            return $error;
        }

        $new_qte = $qte - $qte_bought;

        $query = "UPDATE TEST_I.PRODUCT SET product_quantity_id = '$new_qte' WHERE id_product = '$id'";

        $result = mysqli_query($this->conn, $query);


       
    }


}







?>
