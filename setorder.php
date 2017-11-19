<?PHP
$tickbtc = file_get_contents('https://api.coinmarketcap.com/v1/ticker/bitcoin/');
$pbtc = json_decode($tickbtc,TRUE)[0]["price_usd"];
echo "<p>Price of Bitcoin: $$pbtc</p>";

$uv = $_POST['amount'];
$uvv = $pbtc * $uv;
if (isset($_POST['user']) and isset($_POST['pass'])){
$user = $_POST['user'];
$pass = $_POST['pass'];
$amount = $_POST['amount'];
 $link = mysqli_connect("localhost", "dbusername", "dbpassword", "dbname");
 
$result = $link->query("SELECT user FROM users2 WHERE user = '$user'");
if($result->num_rows == 0) {
    echo "Data entered for order is wrong. Try again.";
  
} elseif ($result->num_rows == 1){
    $userpass = $link->query("SELECT pass FROM users2 WHERE user = '$user'");
$row20 = $userpass->fetch_assoc();
   $userpasss = $row20["pass"];
    if ($pass == $userpasss){
       $balance = $link->query("SELECT usdbala FROM users2 WHERE user = '$user'");
$row = $balance->fetch_assoc();
$av = $row["usdbala"];
if($_POST['buy'])
{
    if ($uvv < $av){
      
$avv = $av - $uvv;
echo "<p>Account Balance: $avv</p>";
 $btcbalance = $link->query("SELECT btcbala FROM users2 WHERE user = '$user'");
$row3 = $btcbalance->fetch_assoc();
$btc = $row3["btcbala"];
$btcf = $btc + $uv;
echo "$uv";
echo "<p>BTC Balance: $btcf</p>";
$sql3 = "UPDATE users2 SET btcbala='$btcf' WHERE user='$user'";
if(mysqli_query($link, $sql3)){
    echo "<p>Updating your account ...</p>";
}
 $avgbuy = $link->query("SELECT avgbuy FROM users2 WHERE user = '$user'");
$row2 = $avgbuy->fetch_assoc();
$avgbuy = $row2["avgbuy"];
$avgbuyla = $btc * $avgbuy;
$avgbuylas = $avgbuyla + $uvv;
$avgbuylass = $uv + $btc;
$avgbuylast = $avgbuylas / $avgbuylass;
$sql2 = "UPDATE users2 SET avgbuy='$avgbuylast' WHERE user='$user'";
if(mysqli_query($link, $sql2)){
    echo "<p>Updating your account ...</p>";
}
 $usdbalance = $link->query("SELECT usdbala FROM users2 WHERE user = '$user'");
$row4 = $usdbalance->fetch_assoc();
$usdba = $row4["usdbala"];
$usdbala = $usdba - $uvv;
$sql4 = "UPDATE users2 SET usdbala='$usdbala' WHERE user='$user'";
if(mysqli_query($link, $sql4)){
    echo "<p>Updating your account ...</p>";
}
} elseif ($uvv > $av){
    echo "Sorry, the price of amount of bitcoin you are trying to buy is more than your acount USD balance.";
}
} elseif ($_POST['sell']){
    //SELL
    
    $btcbal = $link->query("SELECT btcbala FROM users2 WHERE user = '$user'");
$row8 = $btcbal->fetch_assoc();
$btcbalw = $row8["btcbala"];
    if ($uv <= $btcbalw){
      
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
    echo "<p>Updating your account BTC balance ...</p>";
}
 $avgsell = $link->query("SELECT avgsell FROM users2 WHERE user = '$user'");
$row2 = $avgsell->fetch_assoc();
$avgsel = $row2["avgsell"];
$avgsellla = $btc * $avgsel;
$avgselllas = $avgsellla + $uvv;
$avgselllass = $uv + $btc;
$avgselllast = $avgselllas / $avgselllass;
$sql2 = "UPDATE users2 SET avgsell='$avgselllast' WHERE user='$user'";
if(mysqli_query($link, $sql2)){
    echo "<p>Updating your account sells ...</p>";
}
 $usdbalance = $link->query("SELECT usdbala FROM users2 WHERE user = '$user'");
$row4 = $usdbalance->fetch_assoc();
$usdba = $row4["usdbala"];
$usdbala = $usdba + $uvv;
$sql4 = "UPDATE users2 SET usdbala='$usdbala' WHERE user='$user'";
if(mysqli_query($link, $sql4)){
    echo "<p>Updating your account USD balance ...</p>";
}
$totapro = $link->query("SELECT totapro FROM users2 WHERE user = '$user'");
$row10 = $totapro->fetch_assoc();
$tota = $row10["totapro"];
$totabt = $btc * $pbtc;
$usdtota = $usdba + $totabt;
$totapr = $usdtota - 100000;
$sql5 = "UPDATE users2 SET totapro='$totapr' WHERE user='$user'";
if(mysqli_query($link, $sql5)){
    echo "<p>Updating your account total profit ...</p>";
    echo "<p>Total profit you made: $totapr</p>";
}
} elseif ($uvv > $btcvv){
    echo "Sorry, the amount of bitcoin you are trying to sell is more than your acount BTC balance.";
}



    //END OF SELL
}
    } else {
        echo "Username or password is wrong.";
    }
}
} else{
    echo "Something went wrong. Try again.";
}
 mysqli_close($link);
