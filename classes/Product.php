<?php 

class Product {
    private $id;
    private $name;
    private $price;
    private $quantity;

    public function __construct($name, $price, $quantity) {
        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
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


}





?>
