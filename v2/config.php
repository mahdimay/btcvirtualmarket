<?PHP
$servername = "localhost";
$username = "btcvi_usern";
$password = "pass";
$dbname = "btcvi_dbn";
$link = mysqli_connect("localhost", "btcvi_usern", "pass", "btcvi_dbn");
$file = $_SERVER['SCRIPT_NAME'];
if ($file == "trade.php"){
    $trade = "active";
} elseif ($file == "cg.php"){
    $cg = "active";
}elseif ($file == "dashboard.php"){
    $dash = "active";
}elseif($file == "game.php"){
    $game = "active";
}elseif($file == "join.php"){
    $join = "active";
}elseif($file == "news.php"){
    $news = "active";
} elseif($file == "chart.php"){
    $chart = "active";
}elseif($file == "help.php"){
    $help = "active";
}elseif($file == "gi.php"){
    $gi = "active";
}
?>
