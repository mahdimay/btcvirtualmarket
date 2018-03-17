<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Cmcap | Bitcoin Market Simulator</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
</head>
<h1>SIGN UP FORM</h1>
<form method="post" attribute="post" action="register.php">
<p>Username<br/>
<input type="text" id="user" name="user" class="form-control" required></p>
<p>Password<br/>
<input type="text" id="pass" name="pass" class="form-control" required></p>
<p></p>
<button type="submit" name="sub2" id="sub" value="sub" class="btn btn-default btn-block">Signup</button>
</form>
  <!--   Core JS Files   -->
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>
<?PHP
include 'config.php';
if (isset($_POST['user']) and isset($_POST['pass'])){
$pass = $_POST['pass'];
$user = $_POST['user'];



// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$result = $conn->query("SELECT user FROM users2 WHERE user = '$user'");
if($result->num_rows == 0) {
$sql = "INSERT INTO users2 (user, pass, usdbala)
VALUES ('$user', '$pass', '100000.00')";

if ($conn->query($sql) === TRUE) {
    echo '<script type="text/javascript">
    	$(document).ready(function(){

        	demo.initChartist();

        	$.notify({
            	icon: "pe-7s-bell",
            	message: "Hi! Welcome to Bitcoin Virtual Market! You have 100,000 USD in your account! Go to login page and loing and start trading! HAVE FUN TRADING!"

            },{
                type: "info",
                timer: 4000
            });

    	});
	</script>';
   echo "<a href='dashboard.php' class='btn btn-default btn-block'>Your account is created! Click here to start trading!</a>";
}
    
} else {
    echo '<script type="text/javascript">
    	$(document).ready(function(){

        	demo.initChartist();

        	$.notify({
            	icon: "pe-7s-bell",
            	message: "The username you have choosed already exist. Choose another username."

            },{
                type: "info",
                timer: 4000
            });

    	});
	</script>';
   
}
} 
?>