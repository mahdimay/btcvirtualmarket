<!doctype html>
<html lang="en">
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
                                <h3 class="title">Join game</h3>
                                <p class="category">In this page you can join a new game.</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                
                                <form method="post" attribute="post" action="join.php">
     
     <p class="category">Fill the form below to join a game.</p>
     


<p>Username of game:<br/>
<input class="form-control" type="text" id="gameuser" name="gameuser" required></p>
<p>Password of game:<br/>
<input class="form-control" type="text" id="gamepass" name="gamepass" required></p>
<p></p>
<button class="btn btn-default btn-block" type="submit" name="join" id="join" value="join">Join</button>
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
$user = $_SESSION['username'];
 $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


         $result2 = $link->query("SELECT gameuser FROM games WHERE gameuser = '$gu'");
if($result2->num_rows == 1){
    $gamepass = $link->query("SELECT pass FROM games WHERE gameuser = '$gu'");
$row4 = $gamepass->fetch_assoc();
   $gamepasse = $row4["pass"];
  
if($gamepasse == $gp){ 
                          $endd = $link->query("SELECT ended FROM games WHERE gameuser = '$gu'");
$row403 = $endd->fetch_assoc();
   $end = $row403["ended"];
 if ($end == 1){
     echo '<script type="text/javascript">
    	$(document).ready(function(){

        	demo.initChartist();

        	$.notify({
            	icon: "pe-7s-bell",
            	message: "The game is ended. You can not join an ended game."

            },{
                type: "info",
                timer: 4000
            });

    	});
	</script>';
 } else{ 
         $useringame = $link->query("SELECT user FROM uofgame WHERE gameuser = '$gu' AND user = '$user'");
  
$rowforuser = $useringame->fetch_assoc();
   $userexi = $rowforuser["user"];
    
   if ($userexi == $user){
         echo '<script type="text/javascript">
    	$(document).ready(function(){

        	demo.initChartist();

        	$.notify({
            	icon: "pe-7s-bell",
            	message: "You have already joined this game."

            },{
                type: "info",
                timer: 4000
            });

    	});
	</script>'; 
   } else{
   
     $gamebala22 = $link->query("SELECT amount FROM games WHERE gameuser = '$gu'");
    
$row3 = $gamebala22->fetch_assoc();
   $gamebalance22 = $row3["amount"];
$sql = "INSERT INTO uofgame (gameuser, user, usdbala)
VALUES ('$gu', '$user', '$gamebalance22')";

if ($conn->query($sql) === TRUE) {
   
    
    echo '<script type="text/javascript">
    	$(document).ready(function(){

        	demo.initChartist();

        	$.notify({
            	icon: "pe-7s-bell",
            	message: "You joined a game! Have Fun!"

            },{
                type: "info",
                timer: 4000
            });

    	});
	</script>'; 
}  
    
}}} else{
    echo '<script type="text/javascript">
    	$(document).ready(function(){

        	demo.initChartist();

        	$.notify({
            	icon: "pe-7s-bell",
            	message: "The username or password of game was wrong. Please try again."

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
            	message: "The username or password of game was wrong. Please try again."

            },{
                type: "info",
                timer: 4000
            });

    	});
	</script>'; 
}}
?>

 <script>
  ((window.gitter = {}).chat = {}).options = {
    room: 'faspek/Main'
  };
</script>
<script src="https://sidecar.gitter.im/dist/sidecar.v1.js" async defer></script>