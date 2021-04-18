<?php
 include_once 'config.php';
 ?>
 <!DOCTYPE html>
 <html>
      <head>
           <title>Upload Questions</title>
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
            
            
            <!-- Icons font CSS-->
                <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
                <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
                <!-- Font special for pages-->
                <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

                <!-- Vendor CSS-->
                <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
                <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

                <!-- Main CSS-->
                <link href="css/main.css" rel="stylesheet" media="all">
      </head>
      <body>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                <a class="navbar-brand" href="#">MyCloud</a>
                </div>
                <ul class="nav navbar-nav">
                <li ><a href="home.html">Home</a></li>
                <li ><a href="signup.html">Sign Up</a></li>
                <li ><a href="login.html">Login</a></li>
                <li class="active"><a href="#">Teacher Login</a></li>
                </ul>
            </div>
        </nav>
           <?php
                $email = $_GET["email"];
                $pass = $_GET["password"];
                $query = "SELECT * FROM teacher WHERE email='$email'";
                $regNo = "SELECT * FROM LOGIN";
                $result = mysqli_query($con, $query);
                list($userid, $key) = mysqli_fetch_array($result);
                if($email == $userid && $pass == $key){
                    $result2 = mysqli_query($con, $regNo);
                    while($row = mysqli_fetch_array($result2)){
                    $id = $row['regNumber'];
                    echo "<br /><br />";
                    echo "<div class=\"container\" style=\"width:500px;\">";
                    echo "<table class=\"table table-bordered\">";
                    echo "<tr>";
                    echo "<form method='post' enctype='multipart/form-data'>";
                          echo "<th>Select Register Number:";
                          echo "<select name = \"\" id = \"\">";
                          echo "<option values=\"\">".$id."</option>";
                          echo "</select></th>";
                    echo "</tr>";
                    echo "<tr>";
                        echo "<th><input type='file' name='code' id='code'/>";
                        echo "</br>";
                        echo "<input type='submit' name='insert' id='insert' value='Upload' class='btn btn-info'/></th>";
                    echo "</tr>";
                    echo "</form>";
                    if(isset($_POST["insert"]))
                    {  
                        $file = addslashes(file_get_contents($_FILES["code"]["tmp_name"]));
                        $query = "INSERT INTO question VALUES('$id', '$file')";
                        if(mysqli_query($con, $query))
                        {
                            echo '<script>alert("File Is Uploaded Successfully")</script>';
                        }
                    }
                    }
                
                }else{
                    echo "Error";
                }
                ?>
                </table>
                <form method="post" enctype="multipart/form-data">
                     
                </form>
                <br />
			    
                </div>
                <br />
           </div>
           
      </body>
 </html>
 <script>
 $(document).ready(function(){
      $('#insert').click(function(){
           var file_name = $('#code').val();
           if(file_name == '')
           {
                alert("Please Select a Code File");
                return false;
           }
           else
           {
                var extension = $('#code').val().split('.').pop().toLowerCase();
                if(jQuery.inArray(extension, ['jpg','jpeg','pdf','png','txt']) == -1)
                {
                     alert('Invalid Coding File');
                     $('#code').val('');
                     return false;
                }
           }
      });
 });
 </script>
 <?php
  
     
  ?>
