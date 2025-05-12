CREATE TABLE users(
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(25) NOT NULL UNIQUE,
    password VARCHAR(225) NOT NULL
);

CREATE TABLE blogs(
    blog_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    blog_title VARCHAR(100) NOT NULL,
    blog_body MEDIUMTEXT,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE payments(
    payment_id INT AUTO_INCREMENT PRIMARY KEY,
    blog_id INT,
    payment_amount FLOAT,
    payment_date TIMESTAMP
);

-- Prevent admin deletion trigger
DELIMITER //

CREATE TRIGGER prevent_admin_deletion
BEFORE DELETE ON users
FOR EACH row
BEGIN
    IF OLD.username = 'admin' THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'User "admin" cannot be deleted';
    END IF;
END;
//

DELIMITER;
