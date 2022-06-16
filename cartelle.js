const dbRef = firebase.database().ref();

var urlParams = new URLSearchParams(window.location.search);

var quantity = urlParams.get('q');

function createCartella(data, code) {
    var table = $('<table>');
    for (var a = 0; a < 3; a++) {
        var row = $('<tr>');
        for (var b = 0; b < 9; b++) {
            if (data[a][b]) {
                row.append('<td class="clickable" data-number="' + data[a][b] + '"><span>' + data[a][b] + '</span></td>');

            } else {
                row.append('<td class="emptyCell">&nbsp;</td>');
            }
        }
        table.append(row);
    }

    var cartellaWrapper = $('<div>').addClass('cartella-wrapper');
    if (!!code) {
        cartellaWrapper.append($('<div>').addClass('code').append('<span><i>Cartella: </i><b>' + code + '</b></span'));
    }
    cartellaWrapper.append(table);
    $('#cartelle').append(cartellaWrapper);
}

function createCartelle(quantity) {
    var queryString = isNaN(quantity) ? 'u=' + quantity : 'q=' + quantity;
    $.getJSON('https://tombolagratis.it/cartella.php?' + queryString, function (data) {
        $.each(data, function (index, item) {
            createCartella(item.numbers, item.code);
        });
        $('.clickable').click(function () {
            $('.clickable[data-number="' + $(this).data('number') + '"]').toggleClass('selected');
        });
    });
}

createCartelle(quantity);

// SWITCH: FUNCTION
$('.switch').click(function () {
    $(this).toggleClass('on');
});

// SWITCH: RISPARMIO ENERGETICO
$('.darkOnButton').click(function () {
    $('body').toggleClass('darkOn darkOff');
});

// GESTIONE OVERLAY
$('.iconClose').click(function () {
    $('.chiudiPagina').toggleClass('view');
    $('.chiudiPagina .overlayInner').toggleClass('view');
});

$('.chiudiPagina').click(function () {
    $(this).toggleClass('view');
    $('.chiudiPagina .overlayInner').toggleClass('view');
});

$('.openAiuto').click(function () {
    $('.aiutoPagina').toggleClass('view');
    $('.aiutoPagina .overlayInner').toggleClass('view');
});
$('.aiutoPagina').click(function () {
    $(this).toggleClass('view');
    $('.aiutoPagina .overlayInner').toggleClass('view');
});

// SCROLL HIDDEN FOOTER
$(window).scroll(function () {
    var y = $(this).scrollTop();
    if (y > 1) {
        $(".footerFixed").addClass("hidden");

    } else {
        $(".footerFixed").removeClass("hidden");
    }
});

function getCookie(cname) {
    let name = cname + "=";
    let ca = document.cookie.split(';');
    for(let i = 0; i < ca.length; i++) {
      let c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
}

function deleteAndHome() {

}

var gameID = urlParams.get('gamecode');
var nicknameID = getCookie("nicknameID");
console.log(gameID, nicknameID);

var game_settings = dbRef.child("/games").child(gameID);
game_settings.on('value', function(snapshot) {
    if (snapshot.exists() === true) {
        $("#gameID").text(gameID);
        try {
            if(nicknameID) {
                $("#nickname").text(snapshot.val().players[nicknameID]);
            } else {
                $(".tabellone").remove();
                $(".tabella").remove();

                $("#errorCode").html("Si è verificato un errore!<br>Perfavore <a href='index.php'>ritorna alla home.</a>");
                $("#errorCode").fadeIn("fast");
            }
        } catch(err) {
            $(".tabellone").remove();
            $(".tabella").remove();

            $("#errorCode").html("Si è verificato un errore!<br>Perfavore ritorna alla home.");
            $("#errorCode").fadeIn("fast");
            console.error(err);
        }

        if(snapshot.val().last_number != "") {
            console.log(snapshot.val().last_number);

            // ANIMATION: RESTART BOLLO
            $('.sidebarTop').removeClass('action');
            setTimeout(function () {
                $('.sidebarTop').addClass('action');
            }, 1000);
    
            $('#disableExtract').addClass('active');
            setTimeout(function () {
                $('#disableExtract').removeClass("active");
            }, 4500);
            
            $('#number').text(snapshot.val().last_number);    
        }

    } else {
        $(".tabellone").remove();
        $(".tabella").remove();

        $("#errorCode").text("Partita non trovata!");
        $("#errorCode").fadeIn("fast");
    }
});


$("#exitGame").click(function() {
    game_settings.child("players").child(nicknameID).remove();
    document.cookie = "nicknameID=;";
});

window.onbeforeunload = function(){
    e.preventDefault();
    game_settings.child("players").child(nicknameID).remove();
    document.cookie = "nicknameID=;";

}

window.addEventListener("beforeunload", function(e){
    e.preventDefault();
    game_settings.child("players").child(nicknameID).remove();
    document.cookie = "nicknameID=;";

}, false);