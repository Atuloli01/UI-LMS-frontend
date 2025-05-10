<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $textInput = $_POST['textInput'] ?? '';
    $feedback = $_POST['feedback'] ?? '';
    $uploadDir = 'uploads/';

    // Handle image upload
    $imagePath = '';
    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        $imageName = uniqid() . '-' . basename($_FILES['image']['name']);
        $targetFile = $uploadDir . $imageName;

        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
            $imagePath = $targetFile;
        }
    }

    // Save data in a CSV file (or database if you want)
    $row = [$textInput, $feedback, $imagePath, date("Y-m-d H:i:s")];
    $file = fopen('feedback.csv', 'a');
    fputcsv($file, $row);
    fclose($file);

    echo "✅ Feedback submitted successfully!";
} else {
    echo "❌ Invalid request!";
}
