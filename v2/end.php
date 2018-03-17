<?PHP

include 'config.php';
$conn = new mysqli($servername, $username, $password, $dbname);
$game = "tpt4";
 $sql2 = "SELECT end FROM games";
  $sql3 = "SELECT gameuser FROM games";
$result2 = $conn->query($sql2);
$date = date("Ymd");
echo $date;
while($row2 = $result2->fetch_assoc()) {
    if ($row2["end"] == $date) {
        
     $tickbtc = file_get_contents('https://api.coinmarketcap.com/v1/ticker/bitcoin/');
$pbtc = json_decode($tickbtc,TRUE)[0]["price_usd"];
        $sql233 = "UPDATE games SET ended='1' WHERE end = '$date'";
       

if ($conn->query($sql233) === TRUE) {
    echo "Record updated successfully";
}
 $sql234 = "UPDATE games SET pwend='$pbtc' WHERE end = '$date'";
if ($conn->query($sql234) === TRUE) {
    echo "Record updated successfully";
}
    } else {
       
    }
   
    
}