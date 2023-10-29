<?php
include 'config.php';

// Retrieve the list of stored files from the database
$sql = "SELECT file_input FROM coursename";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <link href="https://fonts.googleapis.com/css?family=Inter&display=swap" rel="stylesheet">
    <link href="main.css" rel="stylesheet">

    <title>Course Form</title>

</head>
<body class="body">

<div class="frame-container">

    <div class="CPM_Logo_All">
        <div class="CPM_Logo_Background_color">
          <div class="image_Logo"></div>
          <span class="CPM_Text">CPM</span>
        </div>
    </div>
    <a href="main.php" class="styled-button">Entry</a>

    <div class="FileList">
    <h3>Stored Files:</h3>
    <ul>
        <?php
        $storageDirectory = 'storage/';

        while ($row = $result->fetch_assoc()) {
            $file = $row['file_input'];
            $filePath = $storageDirectory . $file;
            echo '<li><a href="' . $filePath . '" download>' . $file . '</a></li>';
        }
        ?>
    </ul>
</div>

</div>
</div>

</body>
</html>

<?php
// Close the database connection
$conn->close();
?>