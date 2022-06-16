const dbRef = firebase.database().ref();

// GESTIONE OVERLAY
$('.openCartelle').click(function () {
    $('#codicePartita').toggleClass('view');
    $('#codicePartita .overlayInner').toggleClass('view');
    $("#gameCode").focus();


    var game_running = dbRef.child("/games");
    let playersMax = 12;
    let x = 0;
    let childNum = 0;
    game_running.once("value").then(function(snapshot) {
        if (snapshot.exists()) {
            childNum = snapshot.numChildren();
            snapshot.forEach(function(childSnapshot) {
                x++;
                var key = childSnapshot.key;
                // childData will be the actual contents of the child
                var childData = childSnapshot.val();
                var players = childData.players;

                if(players == undefined) {
                    players = 0;
                } else {
                    players = childData.players.length;
                }

                $("#game-list").append('<div class="w-layout-grid grid"><div class="div-block w-clearfix"><h1 class="heading-3" id="game-list-position">'+x+'</h1><h1 class="heading" id="game-list-id">'+key+'</h1><a class="button-join-game" id="game-join-'+key+'">Entra in partita</a><h1 class="heading-2" id="game-list-players">'+players+"/"+playersMax+'</h1></div></div>');
        
                $("#game-join-"+key).click(function() {
                    $("#gameCode").val(key);
                    $("#nickname").fadeIn(200);
                });
            
            });

        } else {
            console.log("No data available");
        }
    });
});

$(".iconClose").click(function() {
    $('#codicePartita').removeClass('view');
    $('#codicePartita .overlayInner').removeClass('view');
    $('#selezionaCartelle').removeClass('view');
    $('#selezionaCartelle .overlayInner').removeClass('view');
    $(".w-layout-grid .grid").remove();

    var gameID = $("#gameCode").val();
    var nickname = $("#nickname").val();

    var game_settings = dbRef.child("/games").child(gameID);
    game_settings.child("players").once("value").then((snapshot) => {
        let numChildren = snapshot.val().indexOf(nickname).toString();
        console.log(numChildren);
        game_settings.child("players/"+numChildren).remove();
        document.cookie = "nicknameID=";
    });
    var gameID = $("#gameCode").val("");
    var gameID = $("#nickname").val("");


});

function joinGame(quantity, gameCode) {
    window.location.href = "./cartelle.php?q="+quantity+"&gamecode="+gameCode;
}


function separate() {
    var foo = $("#gameCode").val().split("-").join(""); // remove hyphens
    if (foo.length > 0) {
        foo = foo.match(new RegExp('.{1,3}', 'g')).join("-");
    }

    $("#gameCode").val(foo.toUpperCase());

    if(foo.length >= 11) {
        $("#nickname").fadeIn(200);

    } else {
        $("#nickname").fadeOut(200);
    }
};


$(".button-join").click(function() {
    if($("#nickname").val().length > 0) {
        var gameID = $("#gameCode").val();
        var game_settings = dbRef.child("/games").child(gameID);
        var nickname = $("#nickname").val();
        game_settings.get().then((snapshot) => {
            if(snapshot.exists()) {
                game_settings.child("players").once("value").then((snapshot) => {
                    console.log(snapshot.val());
                    if(!snapshot.val().includes(nickname)){
                        let numChildren = parseInt(snapshot.numChildren());
                        game_settings.child("players").child(""+(numChildren)).set(nickname);
                        document.cookie = "nicknameID=;";
                        document.cookie = "nicknameID="+numChildren;
                        $('#codicePartita').toggleClass('view');
                        $('#codicePartita .overlayInner').toggleClass('view');
                        $('#selezionaCartelle').toggleClass('view');
                        $('#selezionaCartelle .overlayInner').toggleClass('view');

                    } else {
                        console.log("Exists");
                        $("#errorCode").text("Nickname già in uso!");
                        $("#errorCode").fadeIn("fast").delay(2000).fadeOut("fast");
                    }
                });
                
            } else {
                console.log("No data available");
                $("#errorCode").text("Partita non trovata!");
                $("#errorCode").fadeIn("fast").delay(2000).fadeOut("fast");
            }
        }).catch((error) => {
            console.error(error);
            $("#errorCode").text("Errore. Codice partita non valida!");
            $("#errorCode").fadeIn("fast").delay(2000).fadeOut("fast");
        });
       
    }
});