<!DOCTYPE html>
<html>

<head>
    <title>
        Details Form
    </title>
    <meta charset="utf-8">
    <!-- <script type="text/javascript" src="main.js"></script> -->
    <link rel="stylesheet" href="main.css">
</head>

<body>
    <div id="main_div">
        <div id="second_div">
            <p>
            <h1>Student Details</h1>
            </p>
            <form action="main.php" method="post">
                <label class="labels">* First Name </label><br>
                <input class="fields" type="text" placeholder="First Name" required name="input_fname"><br>

                <label class="labels">* Last Name</label><br>
                <input class="fields" type="text" placeholder="Last Name" name="input_lname" required><br>

                <label class="labels">* Address</label><br>
                <input class="fields" type="text" placeholder="e.g, Anantnag" required name="input_address"><br>

                <label class="labels">Email Id</label><br>
                <input class="fields" type="text" placeholder="example@mail.com" name="input_email" required><br>

                <label class="labels">* Phone Number</label><br>
                <input class="fields number_field" type="tel" placeholder="7006000000" name="input_phone" pattern="[0-9]{10}" required><br>

                <label class="labels">* D.O.B</label><br>
                <input class="fields" type="date" required name="input_dob"><br>

                <label class="labels">* Gender: </label>
                <input type="radio" name="gender" value="Male" required>
                <label class="inner_labels">Male</label>
                <input type="radio" name="gender" value="Female" required>
                <label class="inner_labels">Female</label><br><br>

                <label class="labels">Qualification: </label>
                <input type="checkbox" name="qualification" value="BCA">
                <label class="inner_labels">BCA</label><br>


                <input type="checkbox" name="tandc" value="yes" required>
                <label class="inner_labels">I agree to the <a href=tandc.html>terms and conditions</a>.</label><br><br>

                <input class="btn_submit" type="submit" name="submit_btn" value="SUBMIT" onclick="submitDetails()">
            </form>
        </div>
    </div>
    <div id="table_div">
        <div id="inner_div_table">
            <table id="data_table">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Email Id</th>
                    <th>Phone No.</th>
                    <th>DOB</th>
                    <th>Gender</th>
                    <th>Qual.</th>
                </tr>
                <?php
                if (isset($_POST['btn_del_record'])) {
                    deleteRecord();
                    showData();
                }
                function deleteRecord()
                {
                    $server_name = "localhost";
                    $username = "root";
                    $password = "snowflake";
                    $dbname = "StudentRegistration";
                    $conn = new mysqli($server_name, $username, $password, $dbname);
                    if ($conn->connect_error) {
                        echo "Connecton failed: " . $conn->connect_error;
                    }
                    $id = $_POST['id'];
                    $query = "DELETE FROM studentDetails WHERE id='$id'";
                    if ($conn->query($query) == TRUE && $conn->affected_rows > 0) {
                        echo "Record Deleted Successfully<br>Affected Rows: " . $conn->affected_rows . "<br>";
                    } else {
                        echo "Affected Rows: " . $conn->affected_rows . "<br>";
                    }
                }
                function showData()
                {
                    $server_name = "localhost";
                    $username = "root";
                    $password = "snowflake";
                    $dbname = "StudentRegistration";
                    $conn = new mysqli($server_name, $username, $password, $dbname);
                    if ($conn->connect_error) {
                        echo "Connection failed: " . $conn->connect_error;
                    }

                    // fetch records from db table
                    $table_name = "studentDetails";
                    $query = "SELECT * FROM $table_name";
                    $records = $conn->query($query);
                    if ($records->num_rows > 0) {
                        $sno = 1;
                        while ($row = $records->fetch_assoc()) {
                            echo "<tr><td>" . $row['id'] . "</td>
                            <td>" . $row['sname'] . "</td>
                            <td>" . $row['address'] . "</td>
                            <td>" . $row['email'] . "</td>
                            <td>" . $row['phone'] . "</td>
                            <td>" . $row['dob'] . "</td>
                            <td>" . $row['gender'] . "</td>
                            <td>" . $row['qualification'] . "</td>
                            </tr>";
                        }
                    }
                    
                    $conn->close();
                }
                ?>
            </table>
        </div>
    </div>
    <form action="index.php" method="post">
        <input type="number" name="id" class="del_text" placeholder="Row ID to delete" required />
        <input type="submit" class="del_btn" name="btn_del_record" value="Delete Record" />
    </form>
</body>

</html>