<?php include("settings.php"); ?>
<!------------------------------------------------------------------ -->
<!-- A Garry's Mod loading screen ~ It's universal for all GameModes -->
<!-- 	Designed and Coded by Shea Lavington (www.ItsShea.co.uk) 	 -->
<!------------------------------------------------------------------ -->
<!-- You have permission to edit the code for the use of your server -->
<!-- You do not have permission to redistribute for free or to sell. -->
<!------------------------------------------------------------------ -->
<!--  Donations are much accepted -  http://PayPal.me/SheaLavington  -->
<!------------------------------------------------------------------ -->

<?php
// Don't edit any of the PHP stuff here or else you may break the script
// If you website isn't displaying correctly then please make sure you have configured your loading url correctly
if (!isset($_GET["steamid"])) {
	die("Oops! Looks like your loading URL is wrong. Make sure your URL looks like this while trying to load: http://YOURDOMAIN/darkstern/index.php?steamid=%s&mapname=%m");
}
$steamid64 = $_GET["steamid"];
$url = "http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=" . $SteamAPIKey . "&steamids=" . $steamid64;$json = file_get_contents($url);$table2 = json_decode($json, true);$table = $table2["response"]["players"][0];
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="description" content="A Garry's Mod loading screen called ~ Dark Stern" />
	<title>Dark Stern ~ Loading Screen</title>
	<link href="assets/css/style.css" rel="stylesheet" type="text/css" /> 	
    <script type="text/javascript" src="assets/scripts/jquery.js"></script>
    <script type="text/javascript">
	$(document).ready(function() {
		//Changes volume of song. 0.5=50% volume     ( 1 is a whole = 100% | therefore every 0.# is a 10th)
		$('.audio').prop("volume", 0.5);
			
		//Perfectly centres content to the middle of the screen both vertically and horizontally
		$(window).resize(function(){
			  $('.core-wrapper').css({
			   position:'absolute',
			   left: ($(window).width() 
				 - $('.core-wrapper').outerWidth())/2,
			   top: ($(window).height() 
				 - $('.core-wrapper').outerHeight())/2
			  });	
		});
		// Initiate centre function
		$(window).resize();
	});
    </script>
</head>
	<body>
	<div class="copyright">
		<p>&copy ItsShea.co.uk - <?php echo date("Y ", time()); ?></p>
	</div>
    <div class="core-wrapper">
    <div id="background"> 
		<div id="middle-items">
			<img src="assets/images/logo.png" class="logo" alt="Your Logo" />
		</div>	
    	<div id="left-items">
		<div class="profile">
			<?php
				echo "<div id=\"profile-wrap\">";
					echo "<div id=\"profile-avatar\">";
						echo "<div id=\"avatarimg\">";
							echo "<img src=\"" . $table["avatarfull"] . "\" />";
						echo "</div>";
					echo "</div>";
					echo "<div id=\"profile-name\">";
						echo "<p>" . $table["personaname"] . "</p>";
					echo "</div>";
				echo "<hr>";
					echo "<div id=\"profile-id\">";
						echo "<p>" . $table["steamid"] . "</p>";
					echo "</div>";
				echo "</div>";
            ?>
            <div class="clear"></div>
            </div>
		<div class="server">         
            <ul id="server-list">
            	<li><img src="assets/images/home-icon.png" class="item" alt="Server Name" /> <span id="s-name">Server Name</span></li>		
                <li><img src="assets/images/screen-icon.png" class="item" alt="Game Mode" /> <span id="s-mode">Server Game Mode</span></li>
                <li><img src="assets/images/map-icon.png" class="item" alt="Map Name" /> <span id="s-map">Server Map Name</span></li>	
           	</ul>
		</div>
     	</div>
        <div id="right-items">
        	<div class="news-area">
				<?php include("news.php"); ?>
			</div>
      	</div>
        <div class="clear"></div>
        <div id="download-item" class="download-item" >
        	<p>Connecting...</p>
      	</div>
    </div>
    <!-- Adding copyrighted music is illegal as you will be re-distributing from the server this is hosted from, this means that you will be held liable -->   
    <!--
    <audio class="audio" autoplay autobuffer="autobuffer">
    	<source src="music.ogg" type="audio/ogg">
    	<source src="music.mp4" type="audio/mp4">
    </audio>
    -->
    <script type="text/javascript" src="assets/scripts/main.js"></script>
	</body>
</html>
