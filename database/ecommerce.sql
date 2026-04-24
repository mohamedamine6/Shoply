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

