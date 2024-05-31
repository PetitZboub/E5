<?php
// Connexion à la base de données
$pdo = new PDO('mysql:host=localhost;dbname=canardsound', 'root', '');

// Récupération des 5 musiques aléatoires
$requete = $pdo->query('SELECT * FROM titres JOIN coveralbum ON titres.cover_album_id = coveralbum.id');
$musiques = $requete->fetchAll();
$requete->closeCursor();
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Canardsound</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script src="scripts.js"></script>
	<base target="_blank" />
	<meta name="author" content="Onyx" />
	<meta charset="UTF-8" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
</head>

<body> <?php session_start();
		include('header.php'); ?> 
		<div id="audiobloc">
		<span id="lectureEnCours"></span>
		<!-- COMMANDES DU LECTEUR AUDIO -->
		<div id="audiocommands">
			<!-- COMMANDE PLAY -->
			<span onclick="playsong()" id="audiocommand_play"><img src="http://www.aht.li/3055457/Play_Gris.png" alt="Play" /></span>
			<!-- COMMANDE PAUSE -->
			<span onclick="pausesong()" id="audiocommand_pause" style="display: none;"><img src="http://www.aht.li/3055456/Pause_gris.png" alt="Pause" /></span>
			<!-- TEMPS DE LA CHANSON -->
			<span id="audio_time">0:00</span>
			<!-- BARRE DE PROGRESSION DE LA CHANSON -->
			<input type="range" id="audiocommand_time" value="0" max=""></input>
			<!-- COMMANDE VOLUME -->
			<span id="audiocommand_volume_bloc">
				<img id="audiocommand_volume_full" src="http://www.aht.li/3055459/Volume_Max_Gris.png" alt="Volume Maxumum" />
				<img id="audiocommand_volume_middle" src="http://www.aht.li/3055460/Volume_Middle_Gris.png" alt="Volume Middle" style="display: none;" />
				<img id="audiocommand_volume_low" src="http://www.aht.li/3055458/Volume_Low_Gris.png" alt="Volume Minimum" style="display: none;" />
				<img id="audiocommand_volume_off" src="http://www.aht.li/3055461/Volume_No_gris.png" alt="Volume Off" style="display: none;" />
				<span id="audiocommand_volume_rangebloc">
					<input type="range" id="audiocommand_volume" value="10" max="10"></input>
				</span>
			</span>
			<!-- COMMANDE RÉPÉTER LA CHANSON -->
			<span onclick="loopsongstart()" id="audiocommand_loopstart"><img src="http://www.aht.li/3055455/Loop_gris.png" alt="Repeat" /></span>
			<!-- COMMANDE ARRÊTER DE RÉPÉTER LA CHANSON -->
			<span onclick="loopsongstop()" id="audiocommand_loopstop" style="display: none;"><img src="http://www.aht.li/3055455/Loop_gris.png" alt="No Repeat" /></span>
		</div>
		<!-- FIN COMMANDES DU LECTEUR AUDIO -->
		<!-- LECTEUR AUDIO -->
		<audio id="lecteuraudio" preload="none" onended="nextsong()" src="Photograph.mp3"> Votre navigateur ne supporte
			pas ce lecteur audio. </audio>
		<!-- FIN LECTEUR AUDIO -->
	</div>
	<!-- Foreach titre -->
	<? foreach ($musiques as $musique) {
		echo '<div class="music_line">';
		echo '<span data-music-src="' . $musique['url_musique'] . '" class="music_song"> ' . $musique['titre'] . ' <br />';
		echo '<img src="' . $musique['url_image'] . '" />';
		echo '</span>';
		echo '</div>';
	}
	?>
	<!-- FIN CHANSON XXX -->
</body>

</html>