  <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">

    <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->

<?PHP
include ('config.php');
?>
    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="http://megacrypto.online" class="simple-text">
                   MegaCrypto
                </a>
            </div>

            <ul class="nav">
                <li class="<?PHP echo $dash;?>">
                    <a href="dashboard.php">
                        <i class="pe-7s-home"></i>
                        <p>Dashboard</p>
                        
                    </a>
                </li>
                
                <li class="<?PHP echo $trade;?>">
                    <a href="trade.php">
                        <i class="pe-7s-cash"></i>
                        <p>Trade Bitcoin</p>
                    </a>
                </li>
                <li class="<?PHP echo $game;?>">
                    <a href="game.php">
                        <i class="pe-7s-wallet"></i>
                        <p>Trade in games</p>
                    </a>
                </li>
                 <li <?PHP echo $join;?>>
                    <a href="join.php">
                        <i class="pe-7s-users"></i>
                        <p>Join game</p>
                    </a>
                </li>
                <li <?PHP echo $cg;?>>
                    <a href="cg.php">
                        <i class="pe-7s-global"></i>
                        <p>Create game</p>
                    </a>
                </li>
                <li <?PHP echo $gi;?>>
                    <a href="gi.php">
                        <i class="pe-7s-graph3"></i>
                        <p>Game info</p>
                    </a>
                </li>
                 <li <?PHP echo $news;?>>
                    <a href="news.php">
                        <i class="pe-7s-news-paper"></i>
                        <p>Latest News</p>
                    </a>
                </li>
                <li <?PHP echo $chart;?>>
                    <a href="chart.php">
                        <i class="pe-7s-graph1"></i>
                        <p>Bitcoin Chart</p>
                    </a>
                </li>
                
		
                <li <?PHP echo $help;?>>
                    <a href="help.php">
                        <i class="pe-7s-help1"></i>
                        <p>Help</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>
    