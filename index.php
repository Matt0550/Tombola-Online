<!DOCTYPE html>
<html lang="it">

<head>

	<title>Tombola Gratis Online</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

	<link rel="shortcut icon" href="/favicon.ico">
	<link rel="apple-touch-icon" href="/img/apple-touch-icon.png">
	<link rel="stylesheet" type="text/css" href="css/home.css?v=<?php echo uniqid(); ?>" media="all">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script charset="utf-8" src="https://platform.twitter.com/js/button.0d6aa7fd095b2a9dd19cc66c7c2ed64b.js"></script>
</head>

<body class="home" cz-shortcut-listen="true">
	<h1 class="logo">Tombola Gratis Online</h1>

	<div class="container maxwidth">
		<article class="containerTop">
			<h2>Non trovi la scatola della tombola?<br> Giocate online a tombola gratis!</h2>
			<p>Sedetevi comodi! Collegatevi a <strong class="blue">TombolaGratis.it</strong> da PC, Tablet o da
				Smartphone.<br>
				Scegliete chi tra voi userà il <a href="tabellone.php">Tabellone</a>, gli altri parteciperanno con le
				<u class="openCartelle">Cartelle</u>.</p>
			<p class="provalo">Pronti a Giocare Insieme? <br>PROVATELO!</p>
			<a href="tabellone.php" class="button openTabellone">Tabellone</a>
			<div class="button openCartelle">Cartelle</div>
		</article>
		<img src="img/curve.png" class="curve" alt="curve">
		<div class="containerBottom">
			<div class="devices"></div>
			<p>Non vi serve nessuna scatola!<br> Giocate a <strong>Tombola online</strong> dal vostro
				<strong>Computer</strong>, <strong>Tablet</strong>, <strong>iPhone</strong> o
				<strong>Android</strong>...</p>
		</div>
	</div>


	<div class="spiega maxwidth">
		<article class="spiegaInner">
			<p>
				La <strong>tombola</strong> è il gioco natalizio della tradizione italiana. Da oggi tutti possono
				<strong>giocare a tombola online</strong> con i propri famigliari e amici usando <strong
					class="blue">TombolaGratis.it</strong>. Come il gioco da tavola originale, TombolaGratis, riunisce
				tutti attorno a un tavolo, ognuno con il proprio <strong>Smartphone</strong>, Tablet, iPhone, Android,
				pc, Mac …<br>Il divertimento è assicurato!
			</p>
			<div class="illustrazione"><img src="img/come-si-gioca-a-tombola.png" alt="come si gioca a tombola"></div>
			<h3>Come si gioca a Tombola Online</h3>
			<p>
				Un giocatore, a scelta tra di voi, aprirà il <a href="tabellone">Tabellone</a>, estrarrà i numeri
				tramite il bottone arancione «Estrai numero» e come in una classica <strong>Tombola</strong> annuncerà
				il numero estratto in modo da permettere a tutti i partecipanti di marcare il numero sulle loro
				cartelle. Inoltre il <strong>tabellone della Tombola</strong> suggerirà un’associazione tra numeri e
				significati, classico della <strong>Tombola napoletana</strong>.
			</p>
			<p>
				Tutti gli altri giocatori presenti sceglieranno, prima di tutto, con quante <u
					class="openCartelle">Cartelle</u> partecipare, in seguito ad ogni numero estratto dal tabellone,
				selezioneranno la casella corrispondente ai numeri se presenti. Le caselle verranno marcate con il
				fagiolo, legume utilizzato come segna numero nella <strong>Tombola classica</strong>.
			</p>
		</article>
	</div>

	<div class="footer">
		<img src="img/fagiolo.png" class="fagiolo" alt="icona fagiolo">
		<p>Buon divertimento da <a rel="external" href="https://www.linkedin.com/in/manuel-kanah/">Manuel</a> &amp; <a
				rel="external" href="https://www.linkedin.com/in/massimomastromarino/">Massimo</a><br>
		<p>© Tutti i diritti sono riservati</p>
	</div>


	<div class="overlay cartelle" id="codicePartita">
		<div class="iconClose"></div>

		<div class="overlayInner">
			<h4>Inserisci un codice partita<b> o entra in una partita già esistente.</b></h4><b>
				<input type="text" id="gameCode" placeholder="Codice partita" maxlength = "11" oninput="separate()"><br>
				<input type="text" id="nickname" style="display: none;" placeholder="Nickname"><br>

				<h3 id="errorCode"></h4><b>

				<div class="button-join">Unisciti</div>
			</b>
		</div><b>
		</b>
		<div class="game-list">
			<div class="w-layout-grid grid" id="game-list">
				<!-- <div class="div-block w-clearfix">
					<h1 class="heading-3" id="game-list-position">01</h1>
					<h1 class="heading" id="game-list-id">GGG-GGG-GGG</h1>
					<a class="button-join-game" id="game-list-button">Entra in partita</a>
					<h1 class="heading-2" id="game-list-players">10/12</h1>
				</div> -->
			</div>
		</div>
	</div><b>

	<div class="overlay cartelle" id="selezionaCartelle">
		<div class="iconClose"></div>

		<div class="overlayInner">
			<h4>Con quante cartelle<b> vuoi giocare?</b></h4><b>
				<a onclick="joinGame(1, $('#gameCode').val())">1 cartella</a>
				<a onclick="joinGame(2, $('#gameCode').val())">2 cartelle</a>
				<a onclick="joinGame(3, $('#gameCode').val())">3 cartelle</a>
				<a onclick="joinGame(4, $('#gameCode').val())">4 cartelle</a>
				<a onclick="joinGame(5, $('#gameCode').val())">5 cartelle</a>
				<a onclick="joinGame(6, $('#gameCode').val())">6 cartelle</a>
			</b>
		</div><b>
		</b>
	</div><b>
	<script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>
	<script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-database.js"></script>
	<script src="./init-firebase.js"></script>
	<script src="index.js?v=<?php echo uniqid(); ?>"></script>
</body>

</html>