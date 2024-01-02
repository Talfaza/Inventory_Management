<?php

include('connect.php');

$connection = new Connection();
$dbname = "TEST_I";

$connection->createDatabase($dbname);
$connection->selectDatabase($dbname);

$queryTableContact = "CREATE TABLE IF NOT EXISTS CONTACT (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user VARCHAR(30) NOT NULL,
    email VARCHAR(50) NOT NULL,
    msg VARCHAR(144) NOT NULL,
    stat INT(1) NOT NULL,
    msg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

$queryTableUser = "CREATE TABLE IF NOT EXISTS USER (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user VARCHAR(30) NOT NULL,
    email VARCHAR(50) NOT NULL,
    pass VARCHAR(144) NOT NULL,
    register_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

$queryTableProduct = "CREATE TABLE IF NOT EXISTS PRODUCT (
    id_product INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(30) NOT NULL,
    product_price_id INT(6) UNSIGNED,
    product_quantity_id INT(6) UNSIGNED
)";

$queryTablePrice = "CREATE TABLE IF NOT EXISTS PRICE (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    product_price INT(6) UNSIGNED
)";

$queryTableQuantity = "CREATE TABLE IF NOT EXISTS QUANTITY (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    product_quantity INT(6) UNSIGNED
)";
$queryTableCart = "CREATE TABLE IF NOT EXISTS CART(
    
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    NAME_P VARCHAR(255) NOT NULL,
    PRICE INT NOT NULL,
    QUANTITY INT NOT NULL,
    user_id INT(6) UNSIGNED



)";

$connection->createTable($queryTableContact);
$connection->createTable($queryTableUser);
$connection->createTable($queryTableProduct);
$connection->createTable($queryTablePrice);
$connection->createTable($queryTableQuantity);
$connection->createTable($queryTableCart);

// $price = [
//     'P1_Price' => 100,
//     'P2_Price' => 200,
//     'P3_Price' => 300
// ];
// $quantity = [
//     'P1_Quantity' => 10,
//     'P2_Quantity' => 20,
//     'P3_Quantity' => 30
// ];

// $queryInsertProduct1 = "INSERT INTO TEST_I.PRODUCT (product_name, product_price_id, product_quantity_id) 
//                        VALUES ('Gaming Pc', {$price['P1_Price']}, {$quantity['P1_Quantity']})";

// $queryInsertProduct2 = "INSERT INTO TEST_I.PRODUCT (product_name, product_price_id, product_quantity_id) 
//                        VALUES ('Gaming Laptop', {$price['P2_Price']}, {$quantity['P2_Quantity']})";

// $queryInsertProduct3 = "INSERT INTO TEST_I.PRODUCT (product_name, product_price_id, product_quantity_id) 
//                        VALUES ('Raspberry Pi', {$price['P3_Price']}, {$quantity['P3_Quantity']})";
    
// $connection->insertTable($queryInsertProduct1);
// $connection->insertTable($queryInsertProduct2);
// $connection->insertTable($queryInsertProduct3);

// $queryPriceInsertProduct1 = "INSERT INTO TEST_I.PRICE (product_price) 
//                              VALUES ({$price['P1_Price']})";

// $queryQuantityInsertProduct1 = "INSERT INTO TEST_I.QUANTITY (product_quantity) 
//                              VALUES ({$quantity['P1_Quantity']})";

// $queryPriceInsertProduct2 = "INSERT INTO TEST_I.PRICE (product_price) 
//                              VALUES ({$price['P2_Price']})";

// $queryQuantityInsertProduct2 = "INSERT INTO TEST_I.QUANTITY (product_quantity) 
//                              VALUES ({$quantity['P2_Quantity']})";

// $queryPriceInsertProduct3 = "INSERT INTO TEST_I.PRICE (product_price) 
//                              VALUES ({$price['P3_Price']})";

// $queryQuantityInsertProduct3 = "INSERT INTO TEST_I.QUANTITY (product_quantity) 
//                              VALUES ({$quantity['P3_Quantity']})";

// $connection->insertTable($queryPriceInsertProduct1);
// $connection->insertTable($queryQuantityInsertProduct1);

// $connection->insertTable($queryPriceInsertProduct2);
// $connection->insertTable($queryQuantityInsertProduct2);

// $connection->insertTable($queryPriceInsertProduct3);
// $connection->insertTable($queryQuantityInsertProduct3);

$connection->admin_add();
?>
