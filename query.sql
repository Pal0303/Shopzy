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
    -- user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    user_email VARCHAR(30) UNIQUE NOT NULL,
    user_pwd VARCHAR(8) NOT NULL,
    user_ip VARCHAR(45),
    user_address VARCHAR(255),
    user_mobile VARCHAR(10),
    user_gender VARCHAR(255)
);
