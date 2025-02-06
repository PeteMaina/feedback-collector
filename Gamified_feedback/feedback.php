<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Collector</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 20px;
            background-color: #f4f4f9;
        }
        .feedback-form {
            max-width: 500px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .feedback-form h2 {
            text-align: center;
            color: #333;
        }
        .feedback-form label {
            display: block;
            margin-bottom: 8px;
            color: #555;
        }
        .feedback-form input[type="text"],
        .feedback-form textarea,
        .feedback-form select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .feedback-form button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .feedback-form button:hover {
            background-color: #45a049;
        }
        .success-message {
            margin-top: 20px;
            padding: 10px;
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            color: #155724;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="feedback-form">
    <h2>Provide Your Feedback</h2>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Collect form data
        $name = htmlspecialchars(trim($_POST['name']));
        $rating = htmlspecialchars(trim($_POST['rating']));
        $comments = htmlspecialchars(trim($_POST['comments']));

        // Validate inputs
        if (!empty($name) && !empty($rating) && !empty($comments)) {
            // Prepare feedback data in HTML format
            $feedbackHTML = "<div style='border:1px solid #ccc; padding:10px; margin:10px 0;'>";
            $feedbackHTML .= "<strong>Name:</strong> $name<br>";
            $feedbackHTML .= "<strong>Rating:</strong> $rating/5<br>";
            $feedbackHTML .= "<strong>Comments:</strong> $comments<br>";
            $feedbackHTML .= "</div>";

            // Save feedback to an HTML file
            $file = 'feedback.html';
            file_put_contents($file, $feedbackHTML, FILE_APPEND);

            // Display success message
            echo "<div class='success-message'>Thank you for your feedback!</div>";
        } else {
            echo "<div class='success-message' style='background-color:#f8d7da; border-color:#f5c6cb; color:#721c24;'>Please fill out all fields.</div>";
        }
    }
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="name">Your Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="rating">Rating (1-5):</label>
        <select id="rating" name="rating" required>
            <option value="">Select Rating</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>

        <label for="comments">Comments:</label>
        <textarea id="comments" name="comments" rows="5" required></textarea>

        <button type="submit">Submit Feedback</button>
    </form>
</div>

</body>
</html>