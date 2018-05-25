<?php



function connect() {

    // Connect to the database: 
    $connection = mysqli_connect("localhost", "root", "", "projectphp");

    // If there is an error connecting to the database: 
    if(mysqli_connect_errno($connection)) {
        die("Failed to connect to the database. Error: " . mysqli_connect_error());
    }

    // Define that we are on a unicode format: 
    mysqli_set_charset($connection, "utf8");

    return $connection;
}


function getCount($sql)
{
    $connection = connect();
    
    // Get data from the database: 
    $result = mysqli_query($connection, $sql);
    
    // Convert the data to an object: 
    $obj = mysqli_fetch_object($result);

    // Close the database: 
    mysqli_close($connection);

    // Return the object:
    return $obj;
}
function insert($sql) {
    
    // Connect to the database: 
    $connection = connect();
    
    // Insert to the database: 
    mysqli_query($connection, $sql);
    
    // Get the new created primary key: 
    $newID = mysqli_insert_id($connection);
    
    // Close the database: 
    mysqli_close($connection);
    
    return $newID;
}


//check if user exsist
function check1($sql) {
    
    // Connect to the database: 
    $connection = connect();
    
    // Insert to the database: 
    $newID=mysqli_query($connection, $sql);
    
    // Get the new created primary key: 
    $result = mysqli_num_rows($newID);
    //$affectedRows = mysqli_affected_rows($connection);
    // Close the database: 
    mysqli_close($connection);
    //echo $result;
    
    return $result;
}
function check($sql) {
    
    // Connect to the database: 
    $connection = connect();
    
    // Insert to the database: 
    $newID=mysqli_query($connection, $sql);
    
    // Get the new created primary key: 
    $result = mysqli_num_rows($newID);
    //$affectedRows = mysqli_affected_rows($connection);
    // Close the database: 
    mysqli_close($connection);
    //echo $result;
    
    return $result;
}



// Update to the database: 
function update($sql) {
    
    // Connect to the database: 
    $connection = connect();
    
    // Update in the database: 
    mysqli_query($connection, $sql);
    
    // Get the new created primary key: 
    $affectedRows = mysqli_affected_rows($connection);
    
    // Close the database: 
    mysqli_close($connection);
    
    return $affectedRows;
}

// Delete from database: 
function delete($sql) {
    
    // Connect to the database: 
    $connection = connect();
    
    // Delete from database: 
    mysqli_query($connection, $sql);
    
    // Get the new created primary key: 
    $affectedRows = mysqli_affected_rows($connection);
    
    // Close the database: 
    mysqli_close($connection);
    
    return $affectedRows;
}

// Get one object (= one row):
function getObject($sql) {

    // Connect to the database: 
    $connection = connect();
    
    // Get data from the database: 
    $result = mysqli_query($connection, $sql);
    
    // Convert the data to an object: 
    $obj = mysqli_fetch_object($result);

    // Close the database: 
    mysqli_close($connection);

    // Return the object:
    return $obj;
}

// Get all objects (= table):
function getCollection($sql) {

    // Connect to the database: 
    $connection = connect();
    
    // Get data from the database: 
    $result = mysqli_query($connection, $sql);
    
    // Convert the data to a collection: 
    $collection = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // Close the database: 
    mysqli_close($connection);

    // Return the object:
    return $collection;
}
