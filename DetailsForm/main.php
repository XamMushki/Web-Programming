<?php
if (isset($_POST['submit_btn'])){
    submit();
}
function inputTest($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
function submit()
{
    $fname = inputTest($_POST["input_fname"]);
    $lname = inputTest($_POST["input_lname"]);
    $address = inputTest($_POST["input_address"]);
    $email = inputTest($_POST["input_email"]);
    $phone = inputTest($_POST["input_phone"]);
    $dob = inputTest($_POST["input_dob"]);
    $gender = inputTest($_POST["gender"]);

    $qualification = $_POST["qualification"];
    foreach ($qualification as $q) {
        echo "here<br>";
        echo "$q<br>";
    }
    $server_name = "localhost";
    $username = "root";
    $password = "";
    $dbname = "StudentRegistration";

    $conn = new mysqli($server_name, $username, $password);
    if ($conn->connect_error) {
        echo "Connection failed: " . $conn->connect_error;
    }

    // Creating Database
    $query = "CREATE DATABASE IF NOT EXISTS $dbname";
    if ($conn->query($query) === TRUE) {
        // echo "Database created Successfully<br>";
    } else {
        // echo "Error Creating Database: ".$conn->error;
    }
    $conn->select_db($dbname);
    $query = "CREATE TABLE IF NOT EXISTS studentDetails(
    id int(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    sname VARCHAR(50) NOT NULL,
    address VARCHAR(50) NOT NULL,
    email VARCHAR(40),
    phone VARCHAR(15) NOT NULL,
    dob VARCHAR(15) NOT NULL,
    gender VARCHAR(7) NOT NULL,
    qualification VARCHAR(10)
    )";
    if ($conn->query($query) === TRUE) {
        // echo "Table Created Successfully<br>";
    } else {
        // echo "Error creating table: ".$conn->error;
    }

    // Data insertion
    $name = $fname . " " . $lname;
    $table_name = "studentDetails";
    $query = "INSERT INTO $table_name (sname,address,email,phone,dob,gender,qualification) 
values ('$name','$address','$email','$phone','$dob','$gender','$qualification')";

    if ($conn->query($query) === TRUE) {
        echo "Record inserted successfully.<br>";
    } else {
        echo "Insertion failed: " . $conn->error;
    }


    $conn->close();
}
