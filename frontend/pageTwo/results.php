<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>All Feedback</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: #f3f3f3;
      padding: 20px;
    }

    .feedback {
      background: white;
      padding: 15px;
      margin-bottom: 10px;
      border-left: 5px solid #007bff;
      border-radius: 10px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    }

    .timestamp {
      color: #555;
      font-size: 0.85em;
    }
  </style>
</head>
<body>
  <h1>📝 All Submitted Feedback</h1>

  <?php
    $file = 'feedback.json';
    if (file_exists($file)) {
      $data = json_decode(file_get_contents($file), true);
      if (!empty($data)) {
        foreach (array_reverse($data) as $entry) {
          echo "<div class='feedback'>";
          echo "<p>" . htmlspecialchars($entry['feedback']) . "</p>";
          echo "<div class='timestamp'>" . htmlspecialchars($entry['timestamp']) . "</div>";
          echo "</div>";
        }
      } else {
        echo "<p>No feedback yet. Be the first to share your thoughts!</p>";
      }
    } else {
      echo "<p>No feedback file found.</p>";
    }
  ?>
</body>
</html>
