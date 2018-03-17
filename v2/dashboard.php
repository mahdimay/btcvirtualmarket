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
                                <h3 class="title">Dashboard</h3>
                                <p class="category">Welcome to Mega Crypto virtual market!</p>
                                <p class="category">Quick info about Bitcoin:</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                
                                <?PHP
                                $btc = file_get_contents('https://api.coinmarketcap.com/v1/ticker/bitcoin/');
$price = json_decode($btc,TRUE)[0]["price_usd"];
$volume = json_decode($btc,TRUE)[0]["24h_volume_usd"];
$cap = json_decode($btc,TRUE)[0]["market_cap_usd"];
$sup = json_decode($btc,TRUE)[0]["total_supply"];
$change1h = json_decode($btc,TRUE)[0]["percent_change_1h"];
$change24h = json_decode($btc,TRUE)[0]["percent_change_24h"];
$change7d = json_decode($btc,TRUE)[0]["percent_change_7d"];
echo "<p>Price of Bitcoin: $$price</p>";
echo "<p>24h Volume: $$volume</p>";
echo "<p>Market Cap: $$cap</p>";
echo "<p>Total Supply: $sup</p>";
if ($change1h >0) {
echo "<p style='color:green;'>Change 1h: $change1h%</p>";
} else{
    echo "<p style='color:red;'>Change 1h: $change1h%</p>";
}
if ($change24h >0) {
echo "<p style='color:green;'>Change 24h: $change24h%</p>";
} else{
    echo "<p style='color:red;'>Change 24h: $change24h%</p>";
}
if ($change7d >0) {
echo "<p style='color:green;'>Change 7d: $change7d%</p>";
} else{
    echo "<p style='color:red;'>Change 7d: $change7d%</p>";
}




                                ?>

     


                                
                          
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
session_start();
 if ($_SESSION['login'] != "true"){
     echo '<script>window.location.href = "login.php";</script>';


 };
?>

 <script>
  ((window.gitter = {}).chat = {}).options = {
    room: 'faspek/Main'
  };
</script>
<script src="https://sidecar.gitter.im/dist/sidecar.v1.js" async defer></script>