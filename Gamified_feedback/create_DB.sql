
CREATE DATABASE IF NOT EXISTS GamifiedFeedback;

USE GamifiedFeedback;


CREATE TABLE IF NOT EXISTS Feedback (
    id INT AUTO_INCREMENT PRIMARY KEY,          
    name VARCHAR(255) NOT NULL,                 
    rating TINYINT NOT NULL CHECK (rating >= 1 AND rating <= 5), 
    comments TEXT NOT NULL,                     
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
);


CREATE INDEX idx_rating ON Feedback(rating);
CREATE INDEX idx_created_at ON Feedback(created_at);