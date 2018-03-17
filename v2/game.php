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
                                <h3 class="title">Trade in games</h3>
                                <p class="category">In this page you can trade  in games you have joined.</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                
                                <form method="post" attribute="post" action="game.php">
     
     <p class="category"> Enter the amount of bitcoin you want you buy or sell!</p>
     <?PHP
     $pricer007 = file_get_contents('https://api.coinmarketcap.com/v1/ticker/bitcoin/');
$pbtc007 = json_decode($pricer007,TRUE)[0]["price_usd"];
echo "<p>Price of Bitcoin: $$pbtc007</p>";
?>
     
<p> Amount of bitcoin:<br/>
<input class="form-control" type="text" id="amount" name="amount" required></p>

<p>Username of game:<br/>
<input class="form-control" type="text" id="gameuser" name="gameuser" required></p>
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


 };
                             include 'config.php';
                             
$tickbtc = file_get_contents('https://api.coinmarketcap.com/v1/ticker/bitcoin/');

$pbtc = json_decode($tickbtc,TRUE)[0]["price_usd"];

if (isset($_POST['amount']) and isset($_POST['gameuser'])){
$user = $_SESSION["username"];
$gu = $_POST['gameuser'];
$uv = $_POST['amount'];
$fee23 = $link->query("SELECT fee FROM games WHERE gameuser = '$gu'");
    
$row569 = $fee23->fetch_assoc();
   $fee2 = $row569["fee"];
   $fee1 = $fee2 / 100;
   $fee = $fee1 * $uv * $pbtc;
   

$uvv = $pbtc * $uv;
$uvv2 = $uvv + $fee;
$amount = $_POST['amount'];

 
   $gamebala22 = $link->query("SELECT amount FROM games WHERE gameuser = '$gu'");
    
$row30 = $gamebala22->fetch_assoc();
   $gamebalance22 = $row30["amount"];

                 $result2 = $link->query("SELECT gameuser FROM games WHERE gameuser = '$gu'");
if($result2->num_rows == 1){
    $userexist = $link->query("SELECT user FROM uofgame WHERE gameuser = '$gu' AND user='$user'");
$userexi = $userexist->fetch_assoc();
   $userx = $userexi["user"];
  
if($userx == $user){
     $endd = $link->query("SELECT ended FROM games WHERE gameuser = '$gu'");
$row403 = $endd->fetch_assoc();
   $end = $row403["ended"];
 if ($end == 1){
     echo '<script type="text/javascript">
    	$(document).ready(function(){

        	demo.initChartist();

        	$.notify({
            	icon: "pe-7s-bell",
            	message: "The game is ended. You can not trade in an ended game."

            },{
                type: "info",
                timer: 4000
            });

    	});
	</script>';
 } else {
    
    
    
    // TRADE
    
    $balance = $link->query("SELECT usdbala FROM uofgame WHERE user = '$user' AND gameuser='$gu'");
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
		$sql225 = "INSERT INTO gtx (user, amount, btcprice, price, type, gameuser, fee)
VALUES ('$user', '$uv', '$pbtc', '$uvv2', 'Buy', '$gu', '$fee')";
if(mysqli_query($link, $sql225)){
   
}
$avv = $av - $uvv2;
echo "<p>Account Balance: $avv</p>";
 $btcbalance = $link->query("SELECT btcbala FROM uofgame WHERE user = '$user' AND gameuser='$gu'");
$row3 = $btcbalance->fetch_assoc();
$btc = $row3["btcbala"];
$btcf = $btc + $uv;
$sql3 = "UPDATE uofgame SET btcbala='$btcf' WHERE user='$user' AND gameuser='$gu'";
if(mysqli_query($link, $sql3)){
   
}
 
 $usdbalance = $link->query("SELECT usdbala FROM uofgame WHERE user = '$user' AND gameuser='$gu'");
$row4 = $usdbalance->fetch_assoc();
$usdba = $row4["usdbala"];
$usdbala = $usdba - $uvv2;
$sql4 = "UPDATE uofgame SET usdbala='$usdbala' WHERE user='$user' AND gameuser='$gu'";
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
   
   
    $btcbal = $link->query("SELECT btcbala FROM uofgame WHERE user = '$user' AND gameuser='$gu'");
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
	$sql22523 = "INSERT INTO gtx (user, amount, btcprice, price, type, gameuser, fee)
VALUES ('$user', '$uv', '$pbtc', '$uvv2', 'Sell', '$gu', '$fee')";
if(mysqli_query($link, $sql22523)){
   
}
$btcvv = $btcbalw - $uv;
echo "<p>Account Balance: $btcvv</p>";
 $btcbalance = $link->query("SELECT btcbala FROM uofgame WHERE user = '$user' AND gameuser='$gu'");
$row3 = $btcbalance->fetch_assoc();
$btc = $row3["btcbala"];
$btcf = $btc - $uv;
echo "$uv";
echo "<p>BTC Balance: $btcf</p>";
$sql3 = "UPDATE uofgame SET btcbala='$btcf' WHERE user='$user' AND gameuser='$gu'";
if(mysqli_query($link, $sql3)){
   
}
 
 $usdbalance = $link->query("SELECT usdbala FROM uofgame WHERE user = '$user' AND gameuser='$gu'");
$row4 = $usdbalance->fetch_assoc();
$usdba = $row4["usdbala"];
$uvv23 = $uvv - $fee;
$usdbala = $usdba + $uvv23;
$sql4 = "UPDATE uofgame SET usdbala='$usdbala' WHERE user='$user' AND gameuser='$gu'";
if(mysqli_query($link, $sql4)){
    
}
$totapro = $link->query("SELECT totapro FROM uofgame WHERE user = '$user' AND gameuser='$gu'");
$row10 = $totapro->fetch_assoc();
$tota = $row10["totapro"];
$totabt = $btc * $pbtc;
$usdtota = $usdba + $totabt;
$totapr = $usdtota - $gamebalance22;
$sql5 = "UPDATE uofgame SET totapro='$totapr' WHERE user='$user' AND gameuser='$gu'";
if(mysqli_query($link, $sql5)){
 
   
}
} elseif ($uvv > $btcvv){
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
    
    
    // END OF TRADE
}} else {
    echo '<script type="text/javascript">
    	$(document).ready(function(){

        	demo.initChartist();

        	$.notify({
            	icon: "pe-7s-bell",
            	message: "You are not in this game. First joing this game."

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
            	message: "The username of game was wrong."

            },{
                type: "info",
                timer: 4000
            });

    	});
	</script>'; 
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