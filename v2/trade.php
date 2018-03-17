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
                                <h3 class="title">Trade Bitcoin</h3>
                                <p class="category">In this page you can trade bitcoin.</p>
                                <br>
                                    <?PHP
                                    session_start();
                                    $user007 = $_SESSION["username"];
                                    include 'config.php';
 

       $balance007 = $link->query("SELECT usdbala FROM users2 WHERE user = '$user007'");
$row007 = $balance007->fetch_assoc();
$av007 = $row007["usdbala"];
echo "<p>Your USD Balance: $$av007</p>";
$btcbalance0078 = $link->query("SELECT btcbala FROM users2 WHERE user = '$user007'");
$row0078 = $btcbalance0078->fetch_assoc();
$btc0078 = $row0078["btcbala"];
echo "<p>Your BTC Balance: $btc0078 BTC</p>";
$pricer007 = file_get_contents('https://api.coinmarketcap.com/v1/ticker/bitcoin/');
$pbtc007 = json_decode($pricer007,TRUE)[0]["price_usd"];
echo "<p>Price of Bitcoin: $$pbtc007</p>";

                                    ?>
                                
                            </div>
                            <div class="content table-responsive table-full-width">
                                
                                <form method="post" attribute="post" action="trade.php">
     
     <p class="category"> Trade Bitcoin here! Just enter the amount!</p>
     
<p> Amount of bitcoin:<br/>
<input class="form-control" type="text" id="amount" name="amount" required></p>
<p>Fee: 0.2%</p>
<p></p>
<button class="btn btn-default btn-block" type="submit" name="buy" id="buy" value="buy">Buy</button>
<button class="btn btn-default btn-block" type="submit" name="sell" id="sell" value="sell">Sell</button>
</form>
                                
                          
                            </div>
                        </div>
                    </div>


                    <div class="col-md-12">
                        <div class="card card-plain">
                            
                            <div class="content table-responsive table-full-width">
                             
                             
                             
           
 
 
 
 
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
session_start();
 if ($_SESSION["login"] != true){
     echo '<script>window.location.href = "login.php";</script>';


 } else {
$tickbtc = file_get_contents('https://api.coinmarketcap.com/v1/ticker/bitcoin/');
$pbtc = json_decode($tickbtc,TRUE)[0]["price_usd"];

$uv = $_POST['amount'];
$fee = 0.002 * $uv * $pbtc;
$uvv = $pbtc * $uv;
$uvv2 = $uvv + $fee;

if (isset($_POST['amount'])){

$user = $_SESSION["username"];
$pass = $_POST['pass'];
$amount = $_POST['amount'];
include 'config.php';
 

       $balance = $link->query("SELECT usdbala FROM users2 WHERE user = '$user'");
$row = $balance->fetch_assoc();
$av = $row["usdbala"];
if($_POST['buy'])
{
    if ($uvv2 <= $av){
      	echo '<script type="text/javascript">
    	$(document).ready(function(){

        	demo.initChartist();

        	$.notify({
            	icon: "pe-7s-bell",
            	message: "Buy order was completed successfully!"

            },{
                type: "info",
                timer: 4000
            });

    	});
	</script>';
		$sql22 = "INSERT INTO utx (user, amount, btcprice, price, type, fee)
VALUES ('$user', '$uv', '$pbtc', '$uvv', 'Buy', '$fee')";
if(mysqli_query($link, $sql22)){
   
}
$avv = $av - $uvv2;
echo "<p>Account Balance: $avv</p>";
 $btcbalance = $link->query("SELECT btcbala FROM users2 WHERE user = '$user'");
$row3 = $btcbalance->fetch_assoc();
$btc = $row3["btcbala"];
$btcf = $btc + $uv;
echo "$uv";
echo "<p>BTC Balance: $btcf</p>";
$sql3 = "UPDATE users2 SET btcbala='$btcf' WHERE user='$user'";
if(mysqli_query($link, $sql3)){
   
}
 
 $usdbalance = $link->query("SELECT usdbala FROM users2 WHERE user = '$user'");
$row4 = $usdbalance->fetch_assoc();
$usdba = $row4["usdbala"];
$usdbala = $usdba - $uvv2;
$sql4 = "UPDATE users2 SET usdbala='$usdbala' WHERE user='$user'";
if(mysqli_query($link, $sql4)){
   
}
} elseif ($uvv2 > $av){
    echo '<script type="text/javascript">
    	$(document).ready(function(){

        	demo.initChartist();

        	$.notify({
            	icon: "pe-7s-bell",
            	message: "Sorry, the price of amount of bitcoin you are trying to buy is more than your acount USD balance."

            },{
                type: "info",
                timer: 4000
            });

    	});
	</script>';
    
}
} elseif ($_POST['sell']){
    
    //SELL
    $btcbal = $link->query("SELECT btcbala FROM users2 WHERE user = '$user'");
$row8 = $btcbal->fetch_assoc();
$btcbalw = $row8["btcbala"];
    if ($uv <= $btcbalw){
      echo '<script type="text/javascript">
    	$(document).ready(function(){

        	demo.initChartist();

        	$.notify({
            	icon: "pe-7s-bell",
            	message: "Sell order was completed successfully!"

            },{
                type: "info",
                timer: 4000
            });

    	});
	</script>';
	$sql233 = "INSERT INTO utx (user, amount, btcprice, price, type, fee)
VALUES ('$user', '$uv', '$pbtc', '$uvv2', 'Sell', '$fee')";
if(mysqli_query($link, $sql233)){
   
}
$btcvv = $btcbalw - $uv;
echo "<p>Account Balance: $btcvv</p>";
 $btcbalance = $link->query("SELECT btcbala FROM users2 WHERE user = '$user'");
$row3 = $btcbalance->fetch_assoc();
$btc = $row3["btcbala"];
$btcf = $btc - $uv;
echo "$uv";
echo "<p>BTC Balance: $btcf</p>";
$sql3 = "UPDATE users2 SET btcbala='$btcf' WHERE user='$user'";
if(mysqli_query($link, $sql3)){
   
}
 
 $usdbalance = $link->query("SELECT usdbala FROM users2 WHERE user = '$user'");
$row4 = $usdbalance->fetch_assoc();
$usdba = $row4["usdbala"];
$uvv23 = $uvv - $fee;
$usdbala = $usdba + $uvv23;
$sql4 = "UPDATE users2 SET usdbala='$usdbala' WHERE user='$user'";
if(mysqli_query($link, $sql4)){
    
}
$totapro = $link->query("SELECT totapro FROM users2 WHERE user = '$user'");
$row10 = $totapro->fetch_assoc();
$tota = $row10["totapro"];
$totabt = $btc * $pbtc;
$usdtota = $usdba + $totabt;
$totapr = $usdtota - 100000;
$sql5 = "UPDATE users2 SET totapro='$totapr' WHERE user='$user'";
if(mysqli_query($link, $sql5)){
 
    echo "<p>Total profit you made: $totapr</p>";
}
} elseif ($uv > $btcbalw){
    echo '<script type="text/javascript">
    	$(document).ready(function(){

        	demo.initChartist();

        	$.notify({
            	icon: "pe-7s-bell",
            	message: "Sorry, the amount of bitcoin you are trying to sell is more than your acount BTC balance."

            },{
                type: "info",
                timer: 4000
            });

    	});
	</script>';
    
}



    //END OF SELL
}
    
}
}
 mysqli_close($link);
 ?>
 <script>
  ((window.gitter = {}).chat = {}).options = {
    room: 'faspek/Main'
  };
</script>
<script src="https://sidecar.gitter.im/dist/sidecar.v1.js" async defer></script>