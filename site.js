function getAllVideos()
{
  

    var ajax = new XMLHttpRequest();


    ajax.open("GET", "API.php?command=AllVideos", true);
    // Set a function which will be called in the AJAX process (several times):
    ajax.onreadystatechange = function ()
    {

        // alert(ajax.responseText);
//        // If we've got a response back from the server: 
        if (ajax.readyState === 4) {

//            // If all is ok: 
            if (ajax.status >= 200 && ajax.status <= 299)
            {
                //alert(ajax.responseText);
//                
                var videos = JSON.parse(ajax.responseText);
                //    alert(ajax.responseText);
                document.getElementById("tableVideos").innerHTML = "";
                addClickEvent();
                
                for (var i = 0; i < videos.length; i++)
                {
                    
                    var tr = `<tr>
                                    <td>${videos[i].categoryID}</td>
                                    <td>${videos[i].videoTitle}</td>
                                    <td>${videos[i].description}</td>
                                    <td>${videos[i].url}</td>
                                    <td>${videos[i].customerID}</td>
                                    <td>
                                         <input type="button"value ="play" onclick="funcPlay('${videos[i].url}')">
                                         <input type="button"  value ="edit" onclick="funcEdit('${videos[i].categoryID}','${videos[i].videoTitle}','${videos[i].description}','${videos[i].url}','${videos[i].customerID}' )">
                                         <input type="button" value ="dlt" onclick="funcDelete('${videos[i].categoryID}','${videos[i].videoTitle}', '${videos[i].description}' ,'${videos[i].url}', '${videos[i].customerID}' )">
                                        
                                    </td>
                               </tr>`;
                    //   alert(videos[i].url);
                    document.getElementById("tableVideos").innerHTML += tr;
                }
//                
            } else
            {
                // There was some error:
                alert("Error Status: " + ajax.status + ", Error Message: " + ajax.statusText);
            }
        }
        //}
        // };

        // Make the ajax call: 

    };
    ajax.send();

}
function addClickEvent()
{
    var table = document.getElementById("tableVideos");
    //var table = document.querySelector('tableVideos');

    table.addEventListener("click", function (ev)
    {
        // alert('Cell clicked');

    });

}

function getAllProducts() {

    // XMLHttpRequest can make AJAX calls:
    var ajax = new XMLHttpRequest();

    // Configure: 
    // First parameter = The Method.
    // Second parameter = The Address.
    // Third parameter = true = async, false = sync
    ajax.open("GET", "API.php?command=AllProducts", true);

    // Set a function which will be called in the AJAX process (several times):
    ajax.onreadystatechange = function () {

        // If we've got a response back from the server: 
        if (ajax.readyState === 4) {

            // If all is ok: 
            if (ajax.status >= 200 && ajax.status <= 299) {

                var products = JSON.parse(ajax.responseText);
                //alert(ajax.responseText);
                document.getElementById("tableProducts").innerHTML = "";
                for (var i = 0; i < products.length; i++) {
                    var tr = `<tr><td>${products[i].firstName}</td>
                                <td>${products[i].lastName}</td>
                                <td>${products[i].username}</td>
                                <td>${products[i].password}</td></tr>`;

                    document.getElementById("tableProducts").innerHTML += tr;
                }

            } else { // There was some error:
                alert("Error Status: " + ajax.status + ", Error Message: " + ajax.statusText);
            }
        }
    };

    // Make the ajax call: 
    ajax.send();

}



function getOneProduct() {
    if (checkUserNameEmpty()) {

        // XMLHttpRequest can make AJAX calls:
        var ajax = new XMLHttpRequest();

        // Configure: 
        // First parameter = The Method.
        // Second parameter = The Address.
        // Third parameter = true = async, false = sync
        var username = document.getElementById("username").value;
        ajax.open("GET", "API.php?command=OneProduct&&username=" + username, true);

        // Set a function which will be called in the AJAX process (several times):
        ajax.onreadystatechange = function () {

            // If we've got a response back from the server: 
            if (ajax.readyState === 4) {

                // If all is ok: 
                if (ajax.status >= 200 && ajax.status <= 299) {
                    //  alert(ajax.responseText);
                    if (ajax.responseText !== "null") {
                        var products = JSON.parse(ajax.responseText);
                        // alert(products);
                        document.getElementById("divProduct").innerHTML = "";
                        //   for(var i = 0; i < products.length; i++) {
                        var tr = `<tr><td>${products.firstName}</td>
                                <td>${products.lastName}</td>
                                <td>${products.username}</td>
                                <td>${products.password}</td></tr>`;

                        document.getElementById("divProduct").innerHTML += tr;
                    } else
                    {
                        document.getElementById("divProduct").innerHTML = "No such product.";
                    }
                    //     }

                } else { // There was some error:
                    alert("Error Status: " + ajax.status + ", Error Message: " + ajax.statusText);
                }
            }
        };

        // Make the ajax call: 
        ajax.send();
    }

}

function checkUserNameEmpty()
{
    var usernameBox = document.getElementById("username");
    if (usernameBox.value == "") {
        alert("the usernameBox is empty brother");
        return false;
    }
    return true;
}

function funcPlay(id)
{
    document.getElementById("divVideo").innerHTML = "";
    var newUrl = id.replace("https://www.youtube.com/watch?v=", "https://www.youtube.com/embed/");
    var iframe = `<iframe width="560" height="315" src="${newUrl}" frameborder="0"   encrypted-media" allowfullscreen></iframe>`;
    document.getElementById("divVideo").innerHTML += iframe;
   


}

function funcEdit(id,videoTitle,description,url,customerID)
{
    document.getElementById("categoryId").value = id;
    document.getElementById("description").value = videoTitle;
    document.getElementById("title").value = description;
    document.getElementById("url").value = url; 
    document.getElementById("customerID").value = customerID;
    
}

function funcDelete(id,videoTitle,description,url,customerID)
{

    var r = confirm("Are you Sure?");
    if (r === true) 
    {
         document.getElementById("categoryId").value = id;
         document.getElementById("description").value = videoTitle;
         document.getElementById("title").value = description;
         document.getElementById("url").value = url; 
         document.getElementById("customerID").value = customerID; 
         document.getElementById("dlt").click();
    }
    else 
    {
        alert("you clicked cancel so we are not going to delete anything ");
    }
}   

function search() {
  // Declare variables

  var input, filter, table, tr, td, i,td1;
  input = document.getElementById("searchInput");
  filter = input.value.toUpperCase();
 
  table = document.getElementById("tableVideos");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    td1 = tr[i].getElementsByTagName("td")[2];
   
    if (td || td1) 
    {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1 ||td1.innerHTML.toUpperCase().indexOf(filter) > -1 )
      {
          
          tr[i].style.display = "";
      } else 
      {
        tr[i].style.display = "none";
      }
    } 
  }
  //search1();
}
function getUserVideos()
{
    if(checkCustomerID()){
     // XMLHttpRequest can make AJAX calls:
        var ajax = new XMLHttpRequest();

        // Configure: 
        // First parameter = The Method.
        // Second parameter = The Address.
        // Third parameter = true = async, false = sync
        var customerID = document.getElementById("customerID").value;
        ajax.open("GET", "API.php?command=userVideos&&customerID=" + customerID, true);

        // Set a function which will be called in the AJAX process (several times):
        ajax.onreadystatechange = function () {

            // If we've got a response back from the server: 
            if (ajax.readyState === 4) {

                // If all is ok: 
                if (ajax.status >= 200 && ajax.status <= 299) {
                   
                    if (ajax.responseText !== "null") {
                        var videos = JSON.parse(ajax.responseText);
                        
                        document.getElementById("tableVideos").innerHTML = "";
                          for(var i = 0; i < videos.length; i++) {

                           var tr = `<tr>
                                    <td>${videos[i].categoryID}</td>
                                    <td>${videos[i].videoTitle}</td>
                                    <td>${videos[i].description}</td>
                                    <td>${videos[i].url}</td>
                                    <td>${videos[i].customerID}</td>
                                    <td>
                                         <input type="button"value ="play" onclick="funcPlay('${videos[i].url}')">
                                         <input type="button"  value ="edit" onclick="funcEdit('${videos[i].categoryID}','${videos[i].videoTitle}','${videos[i].description}',' ${videos[i].url}', '${videos[i].customerID}')">
                                         <input type="button" value ="dlt" onclick="funcDelete('${videos[i].categoryID}','${videos[i].videoTitle}','${videos[i].description}','${videos[i].url}','${videos[i].customerID}')">
                                        
                                    </td>
                               </tr>`;

                        document.getElementById("tableVideos").innerHTML += tr;
                    }
                }
                    else
                    {
                        document.getElementById("tableVideos").innerHTML = "No such product.";
                    }
                    //     }

                } else 
                { // There was some error:
                    alert("Error Status: " + ajax.status + ", Error Message: " + ajax.statusText);
                }
            }
        };

        // Make the ajax call: 
        ajax.send();
    }
   
}
function checkCustomerID()
{   var customerID=document.getElementById("customerID").value;
    if(customerID === "")
    {
        alert("Please fillthe CustomerID BOX it out please :)");
        return false;
    }
    else {return true;}
}