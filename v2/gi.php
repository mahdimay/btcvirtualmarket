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
                                <h3 class="title">Game info</h3>
                                <p class="category">In this page you can get some info about the game you've joined.</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                
                                <form method="post" attribute="post" action="gi.php">
     
     <p class="category"> Enter the username of game to view the info.</p>
     

<p>Username of game:<br/>
<input class="form-control" type="text" id="gameuser" name="gameuser" required></p>
<p>Password of game:<br/>
<input class="form-control" type="text" id="pass" name="pass" required></p>
<p></p>


<button class="btn btn-default btn-block" type="submit" name="check" id="chek" value="check">Check</button>
</form>
                                
                          
                            </div>
                        </div>
                    </div>
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

                    <div class="col-md-12">
                        <div class="card card-plain">
                            
                            <div class="content table-responsive table-full-width">
                                
                               <?PHP
                               include('config.php');
                               $game = $_POST['gameuser'];
$pass = $_POST['pass'];
                               if (isset($_POST['gameuser']) and isset($_POST['pass'])){
$tickbtc = file_get_contents('https://api.coinmarketcap.com/v1/ticker/bitcoin/');
$pbtc = json_decode($tickbtc,TRUE)[0]["price_usd"];
 
 $result3 = $link->query("SELECT gameuser FROM games WHERE gameuser = '$game'");
if($result3->num_rows == 1){
    $gamepass = $link->query("SELECT pass FROM games WHERE gameuser = '$game'");
$row4 = $gamepass->fetch_assoc();
   $gamepasse = $row4["pass"];
  
if($gamepasse == $pass){
    $endd = $link->query("SELECT ended FROM games WHERE gameuser = '$game'");
$row403 = $endd->fetch_assoc();
   $end = $row403["ended"];
 if ($end == 1){
     $pwendd = $link->query("SELECT pwend FROM games WHERE gameuser = '$game'");
$row43 = $pwendd->fetch_assoc();
   $pwend = $row43["pwend"];
   
   
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
    } 

        $sql = "SELECT user, totapro, usdbala, btcbala FROM uofgame WHERE gameuser = '$game'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    echo '<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">


      <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.3.js"></script>  
<script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>   ';
    
    
    echo "<div class='header'>
                                <h4 class='title'>Ranking</h4>
                                <p class='category'>Below you can see the ranking of users in the game. *This gave was ended. The ranks are from the day that game ended.</p>
                            </div>
                            <br>";
    echo "<table class='table table-hover table-striped' id='myTable'><th>User</th><th>Total Profit In Game</th><th>USD Balance</th><th>Bitcoin Balance</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $sql2 = "SELECT amount FROM games WHERE gameuser = '$game'";
$result2 = $conn->query($sql2);
while($row2 = $result2->fetch_assoc()) {
    $dbala = $row2['amount'];
        $tota = $row["btcbala"] * $pwend + $row['usdbala'];
        $total = $tota - $dbala;
        
    
}
        echo "<tr><td>".$row["user"]."</td><td>$total</td><td>".$row["usdbala"]."</td><td>".$row["btcbala"]."</td></tr>";
    }
    echo "</table>";
   
    
}
   ?>
   <center><script>
    /*		=================================
**		==== Simple Table Controller ====
**		=================================
**
**
**			With Pure JavaScript .. 
**	 
**
**		No Libraries or Frameworks needed!
**
**
**				fb.com/bastony
**	
*/



// get the table element
var $table = document.getElementById("myTable"),
// number of rows per page
$n = 20,
// number of rows of the table
$rowCount = $table.rows.length,
// get the first cell's tag name (in the first row)
$firstRow = $table.rows[0].firstElementChild.tagName,
// boolean var to check if table has a head row
$hasHead = ($firstRow === "TH"),
// an array to hold each row
$tr = [],
// loop counters, to start count from rows[1] (2nd row) if the first row has a head tag
$i,$ii,$j = ($hasHead)?1:0,
// holds the first row if it has a (<TH>) & nothing if (<TD>)
$th = ($hasHead?$table.rows[(0)].outerHTML:"");
// count the number of pages
var $pageCount = Math.ceil($rowCount / $n);
// if we had one page only, then we have nothing to do ..
if ($pageCount > 1) {
	// assign each row outHTML (tag name & innerHTML) to the array
	for ($i = $j,$ii = 0; $i < $rowCount; $i++, $ii++)
		$tr[$ii] = $table.rows[$i].outerHTML;
	// create a div block to hold the buttons
	$table.insertAdjacentHTML("afterend","<div id='buttons'></div");
	// the first sort, default page is the first one
	sort(1);
}

// ($p) is the selected page number. it will be generated when a user clicks a button
function sort($p) {
	/* create ($rows) a variable to hold the group of rows
	** to be displayed on the selected page,
	** ($s) the start point .. the first row in each page, Do The Math
	*/
	var $rows = $th,$s = (($n * $p)-$n);
	for ($i = $s; $i < ($s+$n) && $i < $tr.length; $i++)
		$rows += $tr[$i];
	
	// now the table has a processed group of rows ..
	$table.innerHTML = $rows;
	// create the pagination buttons
	document.getElementById("buttons").innerHTML = pageButtons($pageCount,$p);
	// CSS Stuff
	document.getElementById("id"+$p).setAttribute("class","active");
}


// ($pCount) : number of pages,($cur) : current page, the selected one ..
function pageButtons($pCount,$cur) {
	/* this variables will disable the "Prev" button on 1st page
	   and "next" button on the last one */
	var	$prevDis = ($cur == 1)?"disabled":"",
		$nextDis = ($cur == $pCount)?"disabled":"",
		/* this ($buttons) will hold every single button needed
		** it will creates each button and sets the onclick attribute
		** to the "sort" function with a special ($p) number..
		*/
		$buttons = "<input type='button' value='&lt;&lt; Prev' onclick='sort("+($cur - 1)+")' "+$prevDis+">";
	for ($i=1; $i<=$pCount;$i++)
		$buttons += "<input type='button' id='id"+$i+"'value='"+$i+"' onclick='sort("+$i+")'>";
	$buttons += "<input type='button' value='Next &gt;&gt;' onclick='sort("+($cur + 1)+")' "+$nextDis+">";
	return $buttons;
}
</script></center>
   <?PHP
 } else {
     
     
     
         
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
    } 

        $sql = "SELECT user, totapro, usdbala, btcbala FROM uofgame WHERE gameuser = '$game'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    echo '<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">


      <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.3.js"></script>  
<script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>   ';
    
    
    echo "<div class='header'>
                                <h4 class='title'>Ranking</h4>
                                <p class='category'>Below you can see the ranking of users in the game.</p>
                            </div>
                            <br>";
    echo "<table class='table table-hover table-striped' id='myTable'><th>User</th><th>Total Profit In Game</th><th>USD Balance</th><th>Bitcoin Balance</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $sql2 = "SELECT amount FROM games WHERE gameuser = '$game'";
$result2 = $conn->query($sql2);
while($row2 = $result2->fetch_assoc()) {
    $dbala = $row2['amount'];
        $tota = $row["btcbala"] * $pbtc + $row['usdbala'];
        $total = $tota - $dbala;
        
    
}
        echo "<tr><td>".$row["user"]."</td><td>$total</td><td>".$row["usdbala"]."</td><td>".$row["btcbala"]."</td></tr>";
    }
    echo "</table>";
   
    
} 
?>
<center><script>
    /*		=================================
**		==== Simple Table Controller ====
**		=================================
**
**
**			With Pure JavaScript .. 
**	 
**
**		No Libraries or Frameworks needed!
**
**
**				fb.com/bastony
**	
*/



// get the table element
var $table = document.getElementById("myTable"),
// number of rows per page
$n = 20,
// number of rows of the table
$rowCount = $table.rows.length,
// get the first cell's tag name (in the first row)
$firstRow = $table.rows[0].firstElementChild.tagName,
// boolean var to check if table has a head row
$hasHead = ($firstRow === "TH"),
// an array to hold each row
$tr = [],
// loop counters, to start count from rows[1] (2nd row) if the first row has a head tag
$i,$ii,$j = ($hasHead)?1:0,
// holds the first row if it has a (<TH>) & nothing if (<TD>)
$th = ($hasHead?$table.rows[(0)].outerHTML:"");
// count the number of pages
var $pageCount = Math.ceil($rowCount / $n);
// if we had one page only, then we have nothing to do ..
if ($pageCount > 1) {
	// assign each row outHTML (tag name & innerHTML) to the array
	for ($i = $j,$ii = 0; $i < $rowCount; $i++, $ii++)
		$tr[$ii] = $table.rows[$i].outerHTML;
	// create a div block to hold the buttons
	$table.insertAdjacentHTML("afterend","<div id='buttons'></div");
	// the first sort, default page is the first one
	sort(1);
}

// ($p) is the selected page number. it will be generated when a user clicks a button
function sort($p) {
	/* create ($rows) a variable to hold the group of rows
	** to be displayed on the selected page,
	** ($s) the start point .. the first row in each page, Do The Math
	*/
	var $rows = $th,$s = (($n * $p)-$n);
	for ($i = $s; $i < ($s+$n) && $i < $tr.length; $i++)
		$rows += $tr[$i];
	
	// now the table has a processed group of rows ..
	$table.innerHTML = $rows;
	// create the pagination buttons
	document.getElementById("buttons").innerHTML = pageButtons($pageCount,$p);
	// CSS Stuff
	document.getElementById("id"+$p).setAttribute("class","active");
}


// ($pCount) : number of pages,($cur) : current page, the selected one ..
function pageButtons($pCount,$cur) {
	/* this variables will disable the "Prev" button on 1st page
	   and "next" button on the last one */
	var	$prevDis = ($cur == 1)?"disabled":"",
		$nextDis = ($cur == $pCount)?"disabled":"",
		/* this ($buttons) will hold every single button needed
		** it will creates each button and sets the onclick attribute
		** to the "sort" function with a special ($p) number..
		*/
		$buttons = "<input type='button' value='&lt;&lt; Prev' onclick='sort("+($cur - 1)+")' "+$prevDis+">";
	for ($i=1; $i<=$pCount;$i++)
		$buttons += "<input type='button' id='id"+$i+"'value='"+$i+"' onclick='sort("+$i+")'>";
	$buttons += "<input type='button' value='Next &gt;&gt;' onclick='sort("+($cur + 1)+")' "+$nextDis+">";
	return $buttons;
}
</script></center>
<?PHP
$conn->close();
}} else {
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
}
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

   


	<?PHP

	?>
</html>

 <script>
  ((window.gitter = {}).chat = {}).options = {
    room: 'faspek/Main'
  };
</script>
<script src="https://sidecar.gitter.im/dist/sidecar.v1.js" async defer></script>