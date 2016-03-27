<!DOCTYPE HTML>
<!--
	Phantom by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>ADarkHero-Verse | Universe of ADarkHero</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body>
<?php	
// Database connection
	$host = "localhost";
    $user = "root";
    $pass = "";
    $db = $user;




    $verbindung = mysql_connect ($host, $user, $pass)			        	    //MySQL Verbindung aufbauen
    or die ("Keine Verbindung möglich.
             Benutzername oder Passwort sind falsch");						    //Falscher Username/Password

    mysql_select_db($db)												        //Datenbank auswählen
    or die ("Verbindung mit der Datenbank gescheitert!.");				        //Verbindung gescheitert
						
?>
	
	
		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<div class="inner">
							<!-- Logo -->
								<a name="home" href="index.php" class="logo">
									<!-- <span class="symbol"><img src="images/logo.png" alt="" /></span><span class="title"></span> -->
								</a>


							<!-- Nav -->
								<nav>
									<ul>
										<li><a href="#menu">Menu</a></li>
									</ul>
								</nav>

						</div>
					</header>

				<!-- Menu -->
					<nav id="menu">
						<h2>Menu</h2>
						<ul>
							<li><a href="#home">Home</a></li>
							<li><a href="#things">Things I do/did</a></li>
							<li><a href="#social">Social</a></li>
							<li><a href="#games">Games</a></li>
							<li><a href="#tracker">Tracker</a></li>
							<li><a href="#stuff">Stuff</a></li>
							<li><a href="#impressum">Impressum</a></li>
						</ul>
					</nav>

				<!-- Main -->
				
				<?php
				//Read from Database
					$main = array();
					$sql = "SELECT * FROM main ORDER BY ID";
					$result  =  mysql_query($sql);

					if ($result) {

						while ($ar=mysql_fetch_array($result,MYSQL_ASSOC)) {

							$GLOBALS["ID"][] = $ar["ID"];
							$GLOBALS["Name"][] = $ar["Name"];
							$GLOBALS["Text"][] = $ar["Text"];
							$GLOBALS["Link"][] = $ar["Link"];
							$GLOBALS["Picture"][] = $ar["Picture"];
							$GLOBALS["Type"][] = $ar["Type"];

						}
					}
				
					
				//Function for showing the panels
					function show($type){
						
						echo '<section class="tiles">';				
							for($i = 0; $i < count($GLOBALS["ID"]); $i++){	
								$style = rand(1, 6);
								
								if($GLOBALS["Type"][$i] == $type){
									echo '<article class="style'.$style.'">';
										echo '<span class="image">';
											echo '<img src="images/'.$GLOBALS["Picture"][$i].'" alt="" />';
										echo '</span>';
										echo '<a href="'.$GLOBALS["Link"][$i].'" target="_blank">';
											echo '<h2>'.$GLOBALS["Name"][$i].'</h2>';
											echo '<div class="content">';
												echo '<p>'.$GLOBALS["Text"][$i].'</p>';
											echo '</div>';
										echo '</a>';
									echo '</article>';
								}
							}
						echo '</section>';
						
					}				
				?>
					<div id="main">
						<div class="inner">
							<header>
								<h1>This is <i>ADarkHero.at</i>, the best site in the whole interwebs.<br />
								<p></p>
							</header>
							
							<h6>Things I do/did</h6><a name="things">&nbsp;</a>

							<?php show("Things"); ?>
							
							<br /><h6>Social Media</h6><a name="social">&nbsp;</a>

							<?php show("Social"); ?>
							
							
							<br /><h6>Games</h6><a name="games">&nbsp;</a>

							<?php show("Games"); ?>
							
							<br /><h6>Tracker</h6><a name="tracker">&nbsp;</a>

							<?php show("Tracker"); ?>
							
							<br /><h6>Stuff</h6><a name="stuff">&nbsp;</a>

							<?php show("Stuff"); ?>
							
						</div>
					</div>

				
					<footer id="footer">
						<div class="inner">
						<!-- Footer 
							<section>
								<h2>Get in touch</h2>
								<form method="post" action="index.php">
									<div class="field half first">
										<input type="text" name="name" id="name" placeholder="Subject / Name or similar" />
									</div>
									<div class="field half">
										<input type="email" name="email" id="email" placeholder="Email" />
									</div>
									<div class="field">
										<textarea name="message" id="message" placeholder="Message"></textarea>
									</div>
									<ul class="actions">
										<li><input type="submit" value="Send" class="special" /></li>
									</ul>
								</form>
							</section>
							--> 
							<ul class="copyright"><a name="impressum">&nbsp;</a>
								<h2><li>&copy; ADarkHero. All rights reserved</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li> <br /> <br /> <br />
								
									Maik Riedlsperger <br />
									Schwarzacherweg 286 <br />
									5754, Hinterglemm <br />
									Austria <br /> <br />
									E-Mail: <a href="mailto:maik_riedlsperger@yahoo.de">maik_riedlsperger@yahoo.de</a><br />
									Telefon: +43 (0)660 / 5635662<br /><br /><br />

									Webspace gehostet von <a href="http://www.easyname.eu" target="_blank">http://www.easyname.eu</a> </h2> <br /> <br />

							</ul>
						</div>
					</footer> 

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>