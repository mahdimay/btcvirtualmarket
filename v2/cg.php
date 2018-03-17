<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Bitcoin Market Simulator</title>

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
<body>

<div class="wrapper">
   <?PHP include('menu.php');?>

    <div class="main-panel">
		<?PHP include('nav.php');?>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h3 class="title">Create game</h3>
                                <p class="category">In this page you can create a new game.</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                
                                <form method="post" attribute="post" action="cg.php">
     
     <p class="category">Fill the form below to create a new game.</p>
     

<p>Username of game:<br/>
<input class="form-control" type="text" id="gameuser" name="gameuser" required></p>
<p>Password of game:<br/>
<input class="form-control" type="text" id="gamepass" name="gamepass" required></p>
<p></p>
<p>Default amount of dollar for each player:<br/>
<input class="form-control" type="text" id="amount" name="amount" required></p>
<p>Trade fee: (In % but don't write the % symbol)<br/>
<input class="form-control" type="text" id="fee" name="fee" required></p>
<p>Game ending year<br/>
<input class="form-control" type="text" id="year" name="year" required></p>
<p>Game ending month (Numeric month)<br/>
<input class="form-control" type="text" id="month" name="month" required></p>
<p>Game ending day (Numeric day)<br/>
<input class="form-control" type="text" id="day" name="day" required></p>
<button class="btn btn-default btn-block" type="submit" name="create" id="create" value="create">Create</button>
</form>
                                
                          
                            </div>
                        </div>
                    </div>


                   


                </div>
            </div>
        </div>

       <footer class="footer">
            <div class="container-fluid">
                
                
                  <p>
                    &copy; <script>document.write(new Date().getFullYear())</script> <a href="http://www.creative-tim.com" target="_blank">Theme:Creative Tim</a> | <a href="https://github.com/megacrypto/" target="_blank">Script:Mega Crypto</a>
                </p>
                
            </div>
        </footer>


    </div>
</div>


</body>

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

	?>
</html>
<?PHP
include 'config.php';
session_start();
 if ($_SESSION["login"] != true){
     echo '<script>window.location.href = "login.php";</script>';


 };
if (isset($_POST['gameuser']) and isset($_POST['gamepass'])){
$gu = $_POST['gameuser'];
$gp = $_POST['gamepass'];
$user = $_SESSION["username"];
$fee = $_POST["fee"];
$year1 = sprintf("%02d", $_POST["year"]);
$month1 = sprintf("%02d", $_POST["month"]);
$day1 = sprintf("%02d", $_POST["day"]);
$end = ''.$year1.''.$month1.''.$day1.'';
$amount = $_POST['amount'];
 $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


         $result2 = $link->query("SELECT gameuser FROM games WHERE gameuser = '$gu'");
if($result2->num_rows == 0){
$sql = "INSERT INTO games (gameuser, pass, creator, amount, fee, end)
VALUES ('$gu', '$gp', '$user', '$amount', '$fee', '$end')";
if ($conn->query($sql) === TRUE) {
   $sql2 = "INSERT INTO uofgame (gameuser, user, usdbala)
VALUES ('$gu', '$user', '$amount')";
if ($conn->query($sql2) === TRUE) {
}
    
    echo '<script type="text/javascript">
    	$(document).ready(function(){

        	demo.initChartist();

        	$.notify({
            	icon: "pe-7s-bell",
            	message: "Your new game is created! Share your game username and password so other people can joing your game! Have fun!"

            },{
                type: "info",
                timer: 4000
            });

    	});
	</script>'; 
}
} else {
    echo '<script type="text/javascript">
    	$(document).ready(function(){

        	demo.initChartist();

        	$.notify({
            	icon: "pe-7s-bell",
            	message: "Sorry, The username you have choosed for your game has been already used. Please use another username for your game."

            },{
                type: "info",
                timer: 4000
            });

    	});
	</script>'; 
}
} 

?>

 <script>
  ((window.gitter = {}).chat = {}).options = {
    room: 'faspek/Main'
  };
</script>
<script src="https://sidecar.gitter.im/dist/sidecar.v1.js" async defer></script>