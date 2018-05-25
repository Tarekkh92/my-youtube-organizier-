<?php //
//
//$firstName = $_POST["firstName"];
//$lastName = $_POST["lastName"];
//$username = $_POST["username"];
//$password = $_POST["password"];
//$password = sha1($password);
//
//echo "first Name: $firstName<br/> last Name: $lastName<br/> username: $username <br/>password:$password)";
//
//// Connect to the database: 
//$connection = mysqli_connect("localhost:8080", "root", "", "projecttwo");
////
////// If there is an error connecting to the database: 
//if(mysqli_connect_errno($connection)) 
//{
//    die("Failed to connect to the database. Error: " . mysqli_connect_error());
//}
////
////// Define that we are on a unicode format: 
//mysqli_set_charset($connection, "utf8");
////
////// Create SQL: 
//$sql = "insert into clients(firstName, lastName,username,password) values('$firstName','$lastName',$username', $password)";
////
////// Insert to the database: 
//mysqli_query($connection, $sql);
////
////// Get the new created primary key: 
//$newID = mysqli_insert_id($connection);
////
////// Close the database: 
//mysqli_close($connection);
////
////echo "<br/>Product has been added. Product ID: $newID";
