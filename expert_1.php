<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Questions</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            text-align: center;
        }
        .container {
            width: 80%;
            margin: 50px auto;
        }
        .question-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            text-align: left;
            margin-bottom: 20px;
        }
        .code {
            font-family: monospace;
            white-space: pre-wrap;
            word-wrap: break-word;
            overflow-wrap: break-word;
            padding: 10px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 10px;
        }
        form {
            margin-top: 10px;
        }
        input[type="radio"] {
            margin-right: 5px;
        }
        textarea {
            width: 100%;
            height: 200px; /* Adjust height as needed */
            margin-bottom: 10px;
            padding: 5px;
            font-family: monospace;
            border: 1px solid #ddd;
            border-radius: 5px;
            resize: vertical;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Questions</h2>
        <?php
        // Database connection parameters
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "test";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $database);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetch data from the entry_1 table
        $sql = "SELECT qst, hint, ans FROM expert_1";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<div class='question-container'>";
                echo "<p><strong>Question:</strong> " . $row["qst"] . "</p>";
                echo "<p><strong>Hint:</strong> " . $row["hint"] . "</p>";
                echo "<form action='submit_answer.php' method='post'>";
                echo "<textarea name='user_code' placeholder='Write your code here...'></textarea>";
                echo "<input type='hidden' name='correct_answer' value='" . $row["ans"] . "'>";
                echo "<input type='submit' value='Submit'>";
                echo "</form>";
                echo "</div>";
            }
        } else {
            echo "No questions found.";
        }
        
        $conn->close();
        ?>
    </div>
</body>
</html>
