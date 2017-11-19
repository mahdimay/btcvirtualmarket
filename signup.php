<?PHP
if (isset($_POST['user']) and isset($_POST['pass'])){
$pass = $_POST['pass2'];
$user = $_POST['user2'];
$link = mysqli_connect("localhost", "dbusername", "dbpassword", "dbname");
$sql = "INSERT INTO prices (user, pass, usdbala, ) VALUES ('$user', '$pass', '100000'";
if(mysqli_query($link, $sql)){
    echo "You are signed up! You have a total of 100,000 USD in your account. HAVE FUN TRADING!";
}
}
?>
