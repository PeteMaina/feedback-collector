<?php
// Database connection (replace with your actual credentials)
$servername = "localhost"; 
$username = "your_username"; 
$password = "your_password"; 
$dbname = "your_database_name"; 

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

    // Handle form submissions
    if (isset($_POST['submit_abuse'])) {
        $abuse_report = $_POST['abuse_report'];
        // Insert abuse report into the database (omitted for brevity)
        echo "<p>Abuse report submitted successfully!</p>"; 
    }

    if (isset($_POST['submit_underpayment'])) {
        $underpayment_report = $_POST['underpayment_report'];
        // Insert underpayment report into the database (omitted for brevity)
        echo "<p>Underpayment/Overpayment report submitted successfully!</p>"; 
    }

    if (isset($_POST['submit_departmental_feedback'])) {
        $hr_feedback = $_POST['hr_feedback'];
        $it_feedback = $_POST['it_feedback'];
        $cleaners_feedback = $_POST['cleaners_feedback'];
        $business_feedback = $_POST['business_feedback'];
        $executive_feedback = $_POST['executive_feedback'];
        $social_media_feedback = $_POST['social_media_feedback'];
        $food_cooks_feedback = $_POST['food_cooks_feedback'];
        $drivers_feedback = $_POST['drivers_feedback'];
        // Insert departmental feedback into the database (omitted for brevity)
        echo "<p>Departmental feedback submitted successfully!</p>"; 
    }

} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

?>