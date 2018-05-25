<?php
session_start();
//echo $_SESSION["username"];
if (!isset($_SESSION["username"]) && empty($_SESSION["username"])) {
    //echo $_SESSION["username"];
    //echo "welcome" .$_SESSION["username"];
    header("Location: login.php");
    //echo "<script> window.location='playlist.php';</script>";
}
//    else {
//        header("Location: playlist.php");
//    }
//destroy the session
//header("location: index.php");
//exit();
//session_destroy();
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Home Project</title>
        <meta name="description" content="website description" />
        <meta name="keywords" content="website keywords, website keywords" />
        <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
        <link rel="stylesheet" type="text/css" href="style/style.css" />

        <script src="site.js"></script>

    </head>

    <body>
        <div id="main">
            <div id="header">
                <div id="logo">
                    <div id="logo_text">
                        <h1><a href="index.html">simple<span class="logo_colour">youtube organizer</span></a></h1>

                        <h2>youtube organizer</h2>
                    </div>
                </div>
                <div id="menubar">
                    <ul id="menu">
                        <li class="selected"><a href="index.php">Home</a></li>
                        <li><a href="home.php">Register</a></li>
                        <li><a href="login.php">Login</a></li>
                        <!--<li><a ><form action="API.php" method="POST"><button id=logoutButton name="command" value="Logout"></button></form>        Log Out</a></li>-->
                        <li ><form action="API.php" method="POST"><button id=logoutButton name="command" value="Logout">Logout</button></form></li>

                    </ul>
                </div>
                
            </div>
            <div id="content_header"></div>
            <div id="site_content">
                <div id="banner"></div>
                <div id="sidebar_container">
                    <div class="sidebar">
                        <div class="sidebar_top"></div>
                        <div class="sidebar_item">
                            <!-- insert your sidebar items here -->
                            <h3>Latest News</h3>
                            <h4>New Website Launched</h4>
                            <h5>February 1st, 2014</h5>
                            <p>2018 sees the redesign of our website. Take a look around and let us know what you think.<br /><a href="#">Read more</a></p>
                        </div>
                        <div class="sidebar_base"></div>
                    </div>
                    <div class="sidebar">

                    </div>
                    <div class="sidebar">
                        <div class="sidebar_top"></div>
                        <div class="sidebar_item">
                            <h3>Search</h3>
                            <form method="post" action="#" id="search_form">
                                <p>
                                    <label id="search">Search Box: </label>
                                    <input type="search" placeholder="enter keyword" id="searchInput">
                                    <input type="button" onclick="search()" value="Search">
                                    <input name="search" type="image" style="border: 0; margin: 0 0 -9px 5px;" src="style/search.png" alt="Search" title="Search" />
                                </p>
                            </form>
                        </div>
                        <div class="sidebar_base"></div>
                    </div>
                </div>

                <div>
                    <!-- insert the page content here -->
                    <h1>Welcome to Youtube Organizer</h1>
                    <?php
                    //session_start();
                    echo "Welcome My Friend : " . strtoupper($_SESSION["username"]."<br/> CustomerID : " .$_SESSION["customerID"] );
                    echo "<br/>";
                    echo "<br/>";
                    ?>
                    <form action="API.php" method="post" > 
                        <table border="0">

                            <header>Video Form</header>
                            <br/>
                            <thead>
                                <tr>
                            <label>Category ID:</label>
                            <input id="categoryId" pattern="^\w{3,19}$| ^\s*$"required title="Category ID must be minimum 3-19 chars"  type="text" name="categoryID" placeholder="Enter categoryID  ..." >
                            <br/>
                            </tr>

                            <tr>
                            <label > Video Title:</label>
                            <input id="title" pattern="^\w{3,19}$| ^\s*$" required title="Only letters" type="text"name="videoTitle" placeholder="Enter your video title..." >
                            <br/>
                            </tr>
                            <tr>
                            <label>Description:</label>
                            <input id="description" pattern="^\w{3,19}$| ^\s*"  title="Description must be minimum 6-19 chars" type="text" name="description"  placeholder="Enter Description..." >
                            <br/>
                            </tr>
                            <tr >
                            <label >Link:</label>
                            <input   required  id="url" type="url" name="url" placeholder="Enter url for video..." >
                            <br/>
                            </tr>
                            <tr>
                            <label > Customer ID:</label>
                            <input id="customerID" pattern="^\d{3,19}$| ^\s*$" required title="Only digits" type="number"name="customerID" placeholder="Enter your customerID.." >
                            <br/>
                            </tr>
                            <tr>

                            <button id="buttonAddEdit" name="command" value="AddVideo" >Add Video</button>
                            <button id="buttonAddEdit" name="command" value="Update" >edit Video</button>
                            <!--<button id="logout" name="command" value="Logout"  >Logout</button>-->
                            <button id="dlt" name="command" value="Delete" hidden="" >Delete</button>
                            <button type="button" onclick="getAllVideos()">Get All Videos</button>
                            <button type="button" onclick="getUserVideos()">Get User Videos</button>

                            </tr>
                            </thead>


                        </table>
                    </form>
                    <div id="divVideo" >

                    </div>


                    <table align="center" border="1">
                        <thead>
                            <tr>
                                <th>Category ID</th>
                                <th>Video Title </th>
                                <th>Description:</th>
                                <th>Link</th>
                                <th>CustomerID</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="tableVideos"></tbody>
                    </table>


                </div>
            </div>
            <div id="content_footer"></div>
            <div id="footer">
                <p><a href="index.php">Home</a> </p>
                <p>All rights Reserved &copy;</p>
            </div>
        </div>
        <script src="site.js"></script>
    </body>
</html>
