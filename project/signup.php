<html>
<head>
<title>Success Page</title>
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
<style type="text/css">
.bg-blue {
  background: #2c6ed5;
}

.bg-red {
  background: #fa4251;
}

.bg-gra-01 {
  background: -webkit-gradient(linear, left bottom, left top, from(#fbc2eb), to(#a18cd1));
  background: -webkit-linear-gradient(bottom, #fbc2eb 0%, #a18cd1 100%);
  background: -moz-linear-gradient(bottom, #fbc2eb 0%, #a18cd1 100%);
  background: -o-linear-gradient(bottom, #fbc2eb 0%, #a18cd1 100%);
  background: linear-gradient(to top, #fbc2eb 0%, #a18cd1 100%);
}

.bg-gra-02 {
  background: -webkit-gradient(linear, left bottom, right top, from(#fc2c77), to(#6c4079));
  background: -webkit-linear-gradient(bottom left, #fc2c77 0%, #6c4079 100%);
  background: -moz-linear-gradient(bottom left, #fc2c77 0%, #6c4079 100%);
  background: -o-linear-gradient(bottom left, #fc2c77 0%, #6c4079 100%);
  background: linear-gradient(to top right, #fc2c77 0%, #6c4079 100%);
}
.font-robo {
  font-family: "Roboto", "Arial", "Helvetica Neue", sans-serif;
}

.font-poppins {
  font-family: "Poppins", "Arial", "Helvetica Neue", sans-serif;
}
* {
  padding: 0;
  margin: 0;
}
body,
h1, h2, h3, h4, h5, h6,
blockquote, p, pre,
dl, dd, ol, ul,
figure,
hr,
fieldset, legend {
  margin: 0;
  padding: 0;
}
body {
  font-family: "Poppins", "Arial", "Helvetica Neue", sans-serif;
  font-weight: 400;
  font-size: 14px;
}

h1, h2, h3, h4, h5, h6 {
  font-weight: 400;
}

h1 {
  font-size: 36px;
}

h2 {
  font-size: 30px;
}

h3 {
  font-size: 24px;
  text-align: center;
  top: 250px;
  left: 250px;
  position: absolute;
}

h4 {
  font-size: 18px;
}

h5 {
  font-size: 15px;
}

h6 {
  font-size: 13px;
}

</style>
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
          <li class="active"><a href="#">Login</a></li>
          <li ><a href="teacherLogin.html">Teacher Login</a></li>
          </ul>
      </div>
    </nav>
</body>

<?PHP

  $reg = $_GET['regNumber'];
	$email = $_GET['email'];
	$pass = $_GET['password'];
	$repass = $_GET['repassword'];
	$phonenumber = $_GET['phone'];
    
	// Database Connection code
  include_once 'config.php';
  
	if($pass == $repass){
		$sql = "INSERT INTO `userinfo`(`regNumber`, `email`, `pass`, `phoneNumber`) VALUES ('$reg','$email','$pass','$phonenumber')";
		if(mysqli_query($con,$sql))
		{
			echo "<body class=\"page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins\">";
			echo "<h3>Registration Done Successfully</h3>";
		}
		else
		{
			echo "Something went Wrong...";
		}
	}else{
		die("Error: Passwords are not matched.");
	}
	echo "</body>";
	echo "</html>";
	mysqli_close($con);
?>

