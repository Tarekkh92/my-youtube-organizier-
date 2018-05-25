
<!DOCTYPE HTML>
<html>

<head>
  <title>Home Project</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href="style/style.css" />
  
</head>

<body>
  <div id="main">
    <div id="header">
      <div id="logo">
        <div id="logo_text">
          <!-- class="logo_colour", allows you to change the colour of the text -->
          <h1><a href="index.html">simple<span class="logo_colour">youtube organizer</span></a></h1>
          <h2>youtube organizer</h2>
        </div>
      </div>
      <div id="menubar">
        <ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          <li class="selected"><a href="index.php">Home</a></li>
          <li><a href="home.php">Register</a></li>
          <li><a href="login.php">Login</a></li>
          
          
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
            <h5>February 11th, 2018</h5>
            <p>2018 sees the redesign of our website. Take a look around and let us know what you think.<br /><a href="#">Read more</a></p>
          </div>
          <div class="sidebar_base"></div>
        </div>
        
       
      </div>
      <div id="content">
        <!-- insert the page content here -->
        <h1>Welcome to Youtube Organizer</h1>
         <form action="API.php" method="post"> 
                        <table border="0">
                            <header id="form">Register Form</header>
                            <br/>
                            <thead>
                                <tr>
                            <label >First Name:</label>
                            <input pattern="^\w{3,19}$| ^\s*$" required title="Password must be minimum 3-19 chars" type="text"name="firstName" placeholder="Enter your first Name..." >
                            <!--<br/>-->
                                <tr/>
                            <tr>
                            <label>Last Name:</label>
                            <input pattern="^\w{3,19}$| ^\s*$"required title="Password must be minimum 3-19 chars"  type="text" name="lastName" placeholder="Enter your last Name..." >
                            <br/>
                                <tr/>
                                <tr>
                            <label>User Name:</label>
                            <input pattern="^\w{6,19}$|^\s*$" required title="Password must be minimum 6-19 chars" type="text" name="username" id="username" placeholder="Enter username..." >
                            <!--<br/>-->
                                </tr>
                                <tr>
                            <label id="password">Password Name:</label>
                            <input  pattern="\w*[a-zA-Z]\w*" required title="Atelest one letter(upperCase or lowerCase)" type="password" name="password" placeholder="Enter password..." >
                           
                                </tr>
                                <br/>
                                  <tr>
                            <label id="customerID">Customer ID:</label>
                            <input   required title="Atelest one letter(upperCase or lowerCase)" type="text" name="customerID" placeholder="Enter CustomerID..." >
                           
                                </tr>
                                <br/><br/><br/>
                            <tr>
                       
                            
                            <button name="command" value="Add" >Register</button>
                            <button type="button" onclick="getOneProduct()">Get One user</button>
                            <!--<button name="command" value="GET">GET</button>-->
                            <button type="button" onclick="getAllProducts()">Get All Customers</button>
                            </tr>
                            </thead>


                        </table>
                    </form>
        
        <div id="divProduct">
            
        </div>
        
        <table align="center" border="1">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Username</th>
                    <th>Password</th>
                </tr>
            </thead>
            <tbody id="tableProducts"></tbody>
        </table>
        <p>This template has been tested in the following browsers:</p>
        <ul>
          <li>Internet Explorer </li>
          <li>FireFox </li>
          <li>Google Chrome </li>
        </ul>
      </div>
    </div>
    <div id="content_footer"></div>
    <div id="footer">
      <p><a href="index.php">Home</a> | <a href="login.php">Login</a> | <a href="playlist.php">Playlist</a> | <a href="http://google.com">Google Page</a> </p>
      <p>All rights Reserved &copy;</p>
    </div>
  </div>
    <script src="site.js"></script>
</body>
</html>
