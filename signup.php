<?PHP

if (isset($_POST['user2']) and isset($_POST['pass2'])){
$pass = $_POST['pass2'];
$user = $_POST['user2'];

$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "myDB";

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
    echo "Hi $user! Welcome to Bitcoin Virtual Market! You have 100,000 USD in your account! Go to login page and loing and start trading! HAVE FUN TRADING!";
}
    
} else {
    echo "The username you've choosed already exist. Choose another username.";
}
} else{
    echo "Something went wrong. Please try to register again.";
}
?>
