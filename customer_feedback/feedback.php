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
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $customerName = $_POST["customerName"];
  $interviewDate = $_POST["interviewDate"];
  $feedback = $_POST["feedback"];

  // Prepare and execute SQL statement
  $stmt = $conn->prepare("INSERT INTO customer_feedback (customer_name, interview_date, feedback) VALUES (:customerName, :interviewDate, :feedback)");
  $stmt->bindParam(':customerName', $customerName);
  $stmt->bindParam(':interviewDate', $interviewDate);
  $stmt->bindParam(':feedback', $feedback);
  $stmt->execute();

  // Display success message
  echo "<p>Feedback submitted successfully!</p>";
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Customer Interview Feedback Collector</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .container {
      margin-top: 50px;
    }
    .form-group label {
      font-weight: bold;
    }
  </style>
</head>
<body>

  <div class="container">
    <h1>Customer Interview Feedback</h1>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <div class="form-group">
        <label for="customerName">Customer Name:</label>
        <input type="text" class="form-control" id="customerName" name="customerName" required>
      </div>

      <div class="form-group">
        <label for="interviewDate">Interview Date:</label>
        <input type="date" class="form-control" id="interviewDate" name="interviewDate" required>
      </div>

      <div class="form-group">
        <label for="feedback">Feedback:</label>
        <textarea class="form-control" id="feedback" name="feedback" rows="5" required></textarea>
      </div>

      <button type="submit" class="btn btn-primary">Submit Feedback</button>
    </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>