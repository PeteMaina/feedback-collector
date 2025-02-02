-- Create the database
CREATE DATABASE anonymous_feedback_db;

-- Use the created database
USE anonymous_feedback_db;

-- Create the table for abuse/mistreatment reports
CREATE TABLE abuse_reports (
    id INT AUTO_INCREMENT PRIMARY KEY,
    report_text TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create the table for underpayment/overpayment reports
CREATE TABLE underpayment_reports (
    id INT AUTO_INCREMENT PRIMARY KEY,
    report_text TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create the table for departmental feedback
CREATE TABLE departmental_feedback (
    id INT AUTO_INCREMENT PRIMARY KEY,
    hr_feedback ENUM('excellent', 'good', 'fair', 'poor', 'very_poor'),
    it_feedback ENUM('excellent', 'good', 'fair', 'poor', 'very_poor'),
    cleaners_feedback ENUM('excellent', 'good', 'fair', 'poor', 'very_poor'),
    business_feedback ENUM('excellent', 'good', 'fair', 'poor', 'very_poor'),
    executive_feedback ENUM('excellent', 'good', 'fair', 'poor', 'very_poor'),
    social_media_feedback ENUM('excellent', 'good', 'fair', 'poor', 'very_poor'),
    food_cooks_feedback ENUM('excellent', 'good', 'fair', 'poor', 'very_poor'),
    drivers_feedback ENUM('excellent', 'good', 'fair', 'poor', 'very_poor'),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);