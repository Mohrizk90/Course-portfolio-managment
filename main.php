<?php
include 'config.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the course name, tag, and file input from the form submission
    $courseCode = $_POST['course_code'];
    $Offering = $_POST['Offering'];
    $tag = $_POST['tag'];
    $fileInput = $_FILES['file_input'];

    // Check if a file was uploaded
    if (!empty($fileInput['name'])) {
        // Specify the folder where you want to store the uploaded files
        $targetDirectory = 'storage/';

        // Create the directory if it doesn't exist
        if (!is_dir($targetDirectory)) {
            mkdir($targetDirectory, 0777, true);
        }

        // Get the filename and extension of the uploaded file
        $filename = basename($fileInput['name']);
        $targetFile = $targetDirectory . $filename;

        // Move the uploaded file to the desired directory
        if (move_uploaded_file($fileInput['tmp_name'], $targetFile)) {
            // Prepare and execute the SQL query
            $tableName = "coursename";
            $sql = "INSERT INTO $tableName (course_code, Offering, tag, file_input) VALUES ('$courseCode','$Offering' ,'$tag', '$filename')";
            if ($conn->query($sql) === TRUE) {
                // Display a download link for the file
                echo "File uploaded successfully. <a href='storage/$filename' download>Click here to download</a>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "Please select a file to upload.";
    }
}

// Close the database connection
$conn->close();
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
    <a href="stored.php" class="styled-button">Files<a>
    
    
    
    <div class="Form">




    <form method="POST" enctype="multipart/form-data" action="main.php">


        <div class="CourseCodeBox">

            <span class="course_code_text">Course Code</span>

            <input type="text" id="course_code" name="course_code" required style="

                width: 150px;
                height: 30px;
                background: rgb(217,217,217,1);
                opacity: 1;
                position: absolute;
                top: 0px;
                left:150px;
                border-top-left-radius: 10px;
                border-top-right-radius: 10px;
                border-bottom-left-radius: 10px;
                border-bottom-right-radius: 10px;
                overflow: hidden;
               " >

        </div>





        <div class="OfferingBox">

            <span class="Offering_Text">Offering in</span>
            <input type="text" id="Offering" name="Offering"required style="

                width: 150px;
                height: 30px;
                background: rgb(217,217,217,1);
                opacity: 1;
                position: absolute;
                top: 0px;
                left:150px;
                border-top-left-radius: 10px;
                border-top-right-radius: 10px;
                border-bottom-left-radius: 10px;
                border-bottom-right-radius: 10px;
                overflow: hidden;
               " >

        </div>


        <div class="TagBox">
            <span class="Tag_Text">Tag</span>

            <input type="text" id="tag" name="tag" required style="

                width: 150px;
                height: 30px;
                background: rgb(217,217,217,1);
                opacity: 1;
                position: absolute;
                top: 0px;
                left:150px;
                border-top-left-radius: 10px;
                border-top-right-radius: 10px;
                border-bottom-left-radius: 10px;
                border-bottom-right-radius: 10px;
                overflow: hidden;
               " >

        </div>
    
        
       


        <div class="SelectFileBox">

            <input type="file" id="file_input" name="file_input" class="styled-file-input">
       
       
        </div>
       
        <!-- <div class="Filepath">
            <span class="DesktopPath_Text">Desktop File Path:</span>

            <input type="text" id="desktop_file_path" name="desktop_file_path" required style="

                width: 150px;
                height: 30px;
                background: rgb(217,217,217,1);
                opacity: 1;
                position: absolute;
                top: 0px;
                left:150px;
                border-top-left-radius: 10px;
                border-top-right-radius: 10px;
                border-bottom-left-radius: 10px;
                border-bottom-right-radius: 10px;
                overflow: hidden;
               " >
       
        </div>  -->
             
            
            <input type="submit" value="Submit" class="styled-submit-button ">
        
 
    <form method="POST" action="main.php" enctype="multipart/form-data">

</div>

</body>
</html>