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
$connection->createTable($queryTableCart);


$connection->admin_add();
?>
