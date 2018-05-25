<?php
session_start();
require_once 'businessLogic.php';


$command = $_REQUEST["command"];

 

switch ($command) {

    case "Add":
        //session_start();
        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $password = sha1($password);
        $customerID=$_POST["customerID"];
        $_SESSION["customerID"]=$customerID;
        
        //echo $_SESSION["customerID"];
        $countUser = countUser($username);
        if ($countUser == "succ") {
            
            addClient($firstName, $lastName, $username, $password,$_SESSION["customerID"]);
            //$count+=$count+1;
            echo "<script>alert('Operation Successful.'); window.location='playlist.php';</script>";
        } else if ($countUser == "fail") {

            echo "<script>alert('This username exists , please use another username.'); window.location='home.php';</script>";
        }
        break;

    case "OneProduct":
        $username = $_GET["username"];
        $json = getProduct($username);
        echo $json;
        break;
    case "userVideos":
        $customerID = $_GET["customerID"];
        $json = getUserVideos($customerID);
        echo $json;
        break;


    case "AllProducts":
        $json = getAllProducts();
        echo $json;
        break;
    case "Login":
        //session_start();

        $username = $_POST["user"];
        $password = $_POST["password"];
        $password = sha1($password);
        $result = checkUser($username, $password);
        //echo $result;
        if ($result == "succ") { 
            session_start();
            $_SESSION["username"] = $username;
            $_SESSION["password"] = $password;
            //$_SESSION["customerID"]=$customerID;
             //echo $_SESSION["customerID"];
           // $cusID=getCustomerID($username);
            //echo $cusID;
            
            header("Location: playlist.php");
        } else if ($result == "fail") {

            echo "<script>alert('The username or password you entered is invalid.'); window.location='login.php';</script>";
        }
        break;

    case "AddVideo":
         $customerID = $_POST["customerID"];
         //$username = $_POST["username"];
        $result1= checkCustomer($customerID);
        $legality= checkUsernameAndCustID($_SESSION["username"],$customerID);
       // echo $result1 ;
        if($result1 == "succ" && $legality =="succ")
        {
            
                $categoryID = $_POST["categoryID"];
                $videoTitle = $_POST["videoTitle"];
                $description = $_POST["description"];
                $url = $_POST["url"];
                $customerID = $_POST['customerID'];
                addVideo($categoryID, $videoTitle, $description, $url, $customerID );
                echo "<script>alert('Operation Successful.'); window.location='playlist.php';</script>";
        }
        else //if ( $result1 == "fail" ) 
        {

            echo "<script>alert('Your Trying to access things which dont belong to you  Goodbye and Try again');window.location='playlist.php';</script>";
        }

        break;
    case "AllVideos":
        $json = getAllVideos();
        echo $json;
        break;

    case "Update":
        $categoryID = $_POST["categoryID"];
        $videoTitle = $_POST["videoTitle"];
        $description = $_POST["description"];
        $url = $_POST["url"];

        updateVideo($categoryID, $videoTitle, $description, $url);
        echo "<script>alert('Operation Successful.you gotta change the fields you want and then click edit'); window.location='playlist.php';</script>";
        break;
    case "Delete":
        echo "<script>confirmDelete();} window.location='playlist.php';</script>";
        $categoryID = $_POST["categoryID"];
        deleteVideo($categoryID);
        echo "<script>alert('Operation Successful.'); window.location='playlist.php';</script>";
        break;
    case "Logout":
        
        session_start();
        if (session_destroy()) { // Destroying All Sessions
            header("Location: index.php"); // Redirecting To Home Page
        }
        
        break;
}

