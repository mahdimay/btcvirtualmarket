<?PHP
 session_start();
 include 'config.php';
 $pass = $_POST['pass'];
$user = $_POST['user'];
if (isset($_POST['user']) and isset($_POST['pass'])){

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
require_once('lo.php');
}
 $result = $link->query("SELECT user FROM users2 WHERE user = '$user'");
if($result->num_rows == 0) {
  
    echo '<script type="text/javascript">
    	$(document).ready(function(){

        	demo.initChartist();

        	$.notify({
            	icon: "pe-7s-bell",
            	message: "Username of password was wrong. Please try again."

            },{
                type: "info",
                timer: 4000
            });

    	});
	</script>';
	$_SESSION['auth'] = "2";
  	echo "<meta http-equiv='refresh' content=0.0001;URL='login.php' />    ";
} elseif ($result->num_rows == 1){
    $userpass = $link->query("SELECT pass FROM users2 WHERE user = '$user'");
$row = $userpass->fetch_assoc();
   $userpasss = $row["pass"];
    if ($pass == $userpasss){
       


 echo '<script type="text/javascript">
    	$(document).ready(function(){

        	demo.initChartist();

        	$.notify({
            	icon: "pe-7s-bell",
            	message: "You are logged in successfully! Redirecting ..."

            },{
                type: "info",
                timer: 4000
            });

    	});
	</script>';
	
	$_SESSION['login'] = "true";
$_SESSION['username'] = "$user";
$_SESSION['auth'] = "1";
	echo "<meta http-equiv='refresh' content=0.0001;URL='login.php' />    ";


// Storing session data

    } else {
         echo '<script type="text/javascript">
    	$(document).ready(function(){

        	demo.initChartist();

        	$.notify({
            	icon: "pe-7s-bell",
            	message: "Username of password was wrong. Please try again."

            },{
                type: "info",
                timer: 4000
            });

    	});
	</script>';
	$_SESSION['auth'] = "2";
		echo "<meta http-equiv='refresh' content=0.0001;URL='login.php' />    ";
    }
}

	?>