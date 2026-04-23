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