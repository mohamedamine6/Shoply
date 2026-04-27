CREATE DATABASE shoply;

USE shoply;

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    description TEXT,
    price DECIMAL(10,2),
    image VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO products (name, description, price, image)
VALUES
("T-Short", "Stylish Oversized Men's T-shirt with Abstract Print", 80.00, "product_1.jpg"),
("T-Shirt", "Stylish Oversized Men's T-shirt with Abstract Print", 80.00, "product_2.jpg"),
("T-Shirt", "Stylish Oversized Men's T-shirt with Abstract Print", 80.00, "product_3.jpg")

UPDATE products
SET name = "T-Shirt"
WHERE id = 1;

ALTER TABLE products ADD category VARCHAR(50);

ALTER TABLE products 
CHANGE category gender VARCHAR(50);

UPDATE products SET category = "Homme" WHERE id = 1;

UPDATE products SET category_id = 5 WHERE id = 1;

CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL
);

INSERT INTO categories (name)
VALUES
('T-Shirts'),
('Shoes'),
('Bags'),
('Watches');

ALTER TABLE products
ADD category_id INT;

ALTER TABLE products
ADD CONSTRAINT fk_category
FOREIGN KEY (category_id)
REFERENCES categories(id)
ON DELETE SET NULL
ON UPDATE CASCADE;

INSERT INTO products (name, description, price, image, gender, category_id)
VALUES
('Leather Wallet', 'Premium leather wallet', 120, 'product_9.jpg', 'Homme', 3),
('Stylish Sunglasses', 'Modern UV protection sunglasses', 90, 'product_10.jpg', 'Femme', 3),
('Classic Belt', 'Elegant leather belt', 70, 'product_11.jpg', 'Homme', 3),
('Fashion Handbag', 'Trendy women handbag', 150, 'product_12.jpg', 'Femme', 3),
('Luxury Watch Gold', 'Elegant gold wrist watch', 350, 'product_13.jpg', 'Homme', 4),
('Minimal Silver Watch', 'Modern silver design watch', 280, 'product_14.jpg', 'Femme', 4),
('Sport Watch Pro', 'Waterproof sport watch', 220, 'product_15.jpg', 'Homme', 4),
('Classic Leather Watch', 'Timeless leather strap watch', 260, 'product_16.jpg', 'Femme', 4);



CREATE TABLE messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(150),
    message TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

