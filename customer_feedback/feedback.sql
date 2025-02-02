/* 
    This code is the code to generate the sql for the feedback form
    First create the database, name of your choice then run this code
*/

CREATE TABLE customer_feedback (
    id INT AUTO_INCREMENT PRIMARY KEY,
    customer_name VARCHAR(255) NOT NULL,
    interview_date DATE,
    feedback TEXT 
);