<?php
require_once 'DAL.php';






function addClient($firstName,$lastName,$username,$password,$customerID){

    // XSS הגנה מפני
    $firstName = strip_tags($firstName);
    $lastName = strip_tags($lastName);
    $username = strip_tags($username);
    $password = strip_tags($password);
    $customerID=strip_tags($customerID);
    
   
    $connection = connect();
    $ps = $connection->prepare("insert into customers(firstName, lastName,username,password,customerID) values(?,?,?,?,?)");
    $ps->bind_param("sssss", $firstName, $lastName,$username,$password,$customerID);
    $ps->execute();
    
   
}


function addVideo($categoryID,$videoTitle,$description,$url,$customerID){

    // XSS הגנה מפני
    $categoryID = strip_tags($categoryID);
    $videoTitle = strip_tags($videoTitle);
    $description = strip_tags($description);
    $url = strip_tags($url);
    $customerID = strip_tags($customerID);
   
    $connection = connect();
    $ps = $connection->prepare("insert into videos(categoryID, videoTitle,description,url,customerID) values(?,?,?,?,?)");
    $ps->bind_param("ssssd", $categoryID, $videoTitle,$description,$url,$customerID);
    $ps->execute();
    
   
}

function getProduct($productID) {
    
    // Create SQL: 
    $sql = "select * from customers where username='$productID'";

    // Get one product: 
    $product = getObject($sql);
    
    // Return the product as a json object:
    return json_encode($product);
}

function updateVideo($categoryID, $videoTitle, $description,$url) {
    
    // Create SQL: 
    $sql = "update videos set  videoTitle='$videoTitle',description='$description',url='$url' where categoryID='$categoryID'";
    
    // Update: 
    $result = update($sql);
    //echo $sql;
}


//check user exsist
function checkUser($username, $password)
        {
        
    //echo $username;
    //echo $password;
    //$password= sha1($password);
     $sql = "select * from  customers where username='$username'and password='$password'";
     //echo $sql;
     $result=check($sql);
     
     //echo "the result is :".$result;
     if($result == 1)
     {
         return "succ";
     }
     else
     {
     return "fail";
     }
}
function countUser($username)
{
     $sql = "select * from  customers where username='$username'";
     $result=check($sql);
     //$result=(int)($result);
     
     //echo "the result is :".$result;
     if($result == 1)
     {
         return "fail";//he found this user and he exists so we cant proceed 
     }
     else
     {
        return "succ";// he hasnt found and we can proceed 
     }
}
function countUse($username)
{
     $sql = "select * from  customers where username='$username'";
     $result=check($sql);
     //$result=(int)($result);
     
     //echo "the result is :".$result;
     if($result == 1)
     {
         return "fail";//he found this user and he exists so we cant proceed 
     }
     else
     {
        return "succ";// he hasnt found and we can proceed 
     }
}
function checkCustomer($customerID)
{
     $sql = "select * from  customers where customerID='$customerID'";
     $result=check($sql);
     //$result=(int)($result);
     
     //echo "the result is :".$result;
     if($result == 1)
     {
         return "succ";//he found this user and  we can proceed
     }
     else
     {
        return "fail";// he hasnt found and we alert respectively
     }
}
function checkUsernameAndCustID($username,$customerID)
{
    
     $sql = "select * from  customers where username='$username'and customerID='$customerID'";
     //echo $sql;
     $result=check($sql);
     
     //echo "the result is :".$result;
     if($result == 1)
     {
         return "succ";
     }
     else
     {
     return "fail";
     }
        

    
    
    
}
function getCustomerID($username)
{
 $sql = "select customerID from  customers where username='$username'";
     $result=insert($sql);   
     return $result;
}
function deleteVideo($categoryId) {
    
    // Create SQL: 
    $sql = "delete from videos where categoryID=$categoryId";
    //echo $sql;
    // Update: 
    delete($sql);
}



function getAllProducts() {
    
    // Create SQL: 
    $sql = "select * from customers";

    // Get all products: 
    $allProduct = getCollection($sql);
    
    // Return all products as a json object:
    return json_encode($allProduct);
}
function getAllVideos() {
    
    // Create SQL: 
    $sql = "select * from videos";

    // Get all products: 
    $allVideos = getCollection($sql);
    
    // Return all products as a json object:
    return json_encode($allVideos);
}
function getUserVideos($customerID)
{
    $sql="select * from  videos where customerID='$customerID'";
    $allVideos= getCollection($sql);
    return json_encode($allVideos);
}


