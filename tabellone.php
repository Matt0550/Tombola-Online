<!DOCTYPE html>
<html lang="it">

<head>

	<title>Tombola Gratis Online - Tabellone</title>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
	<meta property="og:title" content="Tombola Gratis Online" />
	<meta property="og:description"
		content="Non trovi la scatola della tombola? Sedetevi comodi! Collegatevi a TombolaGratis.it da PC, Tablet o Smartphone. Scegliete chi tra voi userà il Tabellone, gli altri parteciperanno con le Cartelle." />
	<meta property="og:url" content="https://tombolagratis.it" />
	<meta property="og:image" content="https://tombolagratis.it/img/shareImage02.png" />
	<meta property="og:type" content="website" />
	<meta property="og:site_name" content="Tombolagratis.it" />
	<link rel="shortcut icon" href="favicon.ico" />
	<link rel="apple-touch-icon" href="img/apple-touch-icon.png" />
	<link rel="stylesheet" type="text/css" href="css/tabellone.css" media="all" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body class="tabellone darkOff">
	<div class="iconClose"></div>
	<div class="content">
		<div class="tabella">
			<div class="tabellaInner" id="tabellaInner"></div>
			<!--<img class="pixel" src="img/pixel.png"/>-->
			<div class="sidebar">
				<h1 class="logo"><a href="index.php">Tombola Gratis Online</a></h1>
				<div id="extract" class="button">Estrai numero</div>
				<div id="disableExtract" class="button">Attendi ...</div>
				<div class="sidebarTop">
					<div id="number"></div>
					<div class="baloon">
						<p id="didascalia"></p>
						<p id="traduzione"></p>
					</div>
					<div class="player-list">
						<p><strong>Giocatori:</strong></p>
						<div id="player-list"></div>
					</div>
					
				</div>
			</div>
		</div>
	</div>
	<p class="player-join"></p>

	<div class="footerFixed">
		<div class="optionWrapper">
			<div class="option01">
				<p>Codice partita: <strong id="gameID"></strong></p>

			</div>
			<div class="option02">
				<strong id="nickname" style="margin-right: 10px;"></strong>

				<div class="openAiuto">AIUTO ?</div>
			</div>
		</div>
	</div>

	<div class="overlay chiudiPagina">
		<div class="overlayInner">
			<h4>Vuoi uscire dalla<b /> partita in corso?</h4>
			<a href="index.php">Si</a>
			<a href="#" class="nonUscire">No</a>
		</div>
	</div>

	<div class="overlay aiutoPagina">
		<div class="overlayInner text">
			<div class="iconCloseText"></div>
			<h4>Come funziona<br /> Tombola Gratis.it</h4>
			<p>
				Un giocatore, a scelta tra di voi, aprirà il <strong>Tabellone</strong>, estrarrà i numeri tramite il
				bottone arancione -Estrai numero- e come in una classica <strong>Tombola</strong> annuncerà il numero
				estratto in modo da permettere a tutti i partecipanti di marcare il numero sulle loro cartelle. Inoltre
				il <strong>tabellone della Tombola</strong> suggerirà un’associazione tra numeri e significati, classico
				della <strong>Tombola napoletana</strong>.
				<br />
				Tutti gli altri giocatori presenti sceglieranno, prima di tutto, con quante <strong>Cartelle</strong>
				partecipare, in seguito ad ogni numero estratto dal tabellone, selezioneranno la casella corrispondente
				ai numeri se presenti. Le caselle verranno marcate con il fagiolo, legume spesso utilizzato come segna
				numero nella <strong>Tombola</strong> classica.
			</p>
		</div>
	</div>
	<script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>

	<script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-database.js"></script>
	<script src="./init-firebase.js"></script>
	<script src="tabellone.js?v=<?php echo uniqid(); ?>"></script>
</body>
</html>