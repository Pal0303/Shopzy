-- Create database
CREATE DATABASE Shopzy;


--Create table catrgory
CREATE TABLE categories (
    cat_id INT AUTO_INCREMENT PRIMARY KEY,
    cat_title VARCHAR(255)
);


--create table subcategories
CREATE TABLE subcategories (
    cat_id INT,
    subcat_id INT AUTO_INCREMENT PRIMARY KEY,
    subcat_title VARCHAR(255),
    FOREIGN KEY (cat_id) REFERENCES categories(cat_id)
);


--create table product
CREATE TABLE product (
    prod_id INT AUTO_INCREMENT PRIMARY KEY,
    prod_title VARCHAR(255),
    prod_desc VARCHAR(255),
    prod_feat1 VARCHAR(255),
    prod_feat2 VARCHAR(255),
    prod_feat3 VARCHAR(255),
    prod_key VARCHAR(255),
    subcat_id INT,
    prod_img1 VARCHAR(255),
    prod_img2 VARCHAR(255),
    prod_price VARCHAR(15),
    prod_discount VARCHAR(15),
    prod_date DATE,
    prod_status VARCHAR(50),
    FOREIGN KEY (subcat_id) REFERENCES subcategories(subcat_id)
);


--create user table
CREATE TABLE user_table (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    user_email VARCHAR(30) UNIQUE NOT NULL,
    user_pwd VARCHAR(8) NOT NULL,
    user_ip VARCHAR(45),
    user_address VARCHAR(255),
    user_mobile VARCHAR(10),
    user_gender VARCHAR(255)
);


--create blog table 
CREATE TABLE blogs ( blog_id INT AUTO_INCREMENT PRIMARY KEY, user_id INT, blog_name VARCHAR(255) NOT NULL, 
blog_title VARCHAR(255) NOT NULL, blog_description TEXT, blog_content TEXT NOT NULL, blog_date DATE NOT NULL,
blog_image VARCHAR(255), FOREIGN KEY (user_id) REFERENCES user_table(user_id) );


-- Create table 'bot'
CREATE TABLE bot (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    queries VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
    replies VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
);


-- Create table 'cart'
CREATE TABLE cart (
    prod_id INT(11),
    ip_add VARCHAR(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
    quantity INT(11) NOT NULL,
    FOREIGN KEY (prod_id) REFERENCES product(prod_id)
);


-- Create table 'user_order'
CREATE TABLE user_order (
    order_id INT(11) PRIMARY KEY AUTO_INCREMENT,
    user_id INT(11),
    amount_due INT(255),
    invoice_no INT(255),
    total_prod INT(255),
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    order_status VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
    FOREIGN KEY (user_id) REFERENCES user_table(user_id)
);


-- Create table 'pending_orders'
CREATE TABLE pending_orders (
    order_id INT(11) PRIMARY KEY AUTO_INCREMENT,
    user_id INT(11),
    invoice_no INT(255),
    prod_id INT(11),
    quantity INT(255),
    order_status VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
    FOREIGN KEY (order_id) REFERENCES user_orders(Oder_id),
    FOREIGN KEY (user_id) REFERENCES user_table(user_id),
    FOREIGN KEY (prod_id) REFERENCES product(prod_id)
);

