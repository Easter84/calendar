    To use this application a SQL database needs to be created, I have inlcuded the name and all relevant tables used.
I left the username as root and password blank on this application but if someone wants to use it, they are encouraged
to create a unique user and password for security purposes. The purpose of this application is to create a dynamic calender that saves and updates events as the user adds them. As well as displays the events and marks days in the monthly or yearly 
view with ** if there is an event on that day.

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
