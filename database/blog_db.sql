CREATE TABLE users(
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(25) NOT NULL UNIQUE,
    password VARCHAR(225) NOT NULL
);

CREATE TABLE blogs(
    blog_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    blog_title VARCHAR(100) NOT NULL,
    blog_body VARCHAR(1000)
);

CREATE TABLE payments(
    payment_id INT AUTO_INCREMENT PRIMARY KEY,
    blog_id INT,
    payment_amount FLOAT,
    payment_date TIMESTAMP
);