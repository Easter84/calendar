Database name: calendar

CREATE TABLE appointments (
    id INT PRIMARY KEY AUTO_INCREMENT,
    appointment_date DATE NOT NULL,
    title VARCHAR(255) NOT NULL,
    description VARCHAR(255) NOT NULL,
    category VARCHAR(50) NOT NULL);

Queries for insertion into appointments:

INSERT INTO appointments (appointment_date, title, description, category)
VALUES ('2025-01-25', 'Timmy B-Day', 'My Birthday', 'personal'),
        ('2025-05-25', 'Cynthia B-Day', 'Wifes Birthday', 'personal'),
        ('2024-03-05', 'HW3', 'Homework 3', 'school'),
        ('2024-03-05', 'Sale', 'Sale car at work', 'work');