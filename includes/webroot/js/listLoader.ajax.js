function requestSerie() {
    var xhr   = getXMLHttpRequest();
     
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
            var ajaxDisplay = document.getElementById('listeSerie');
            ajaxDisplay.innerHTML = xhr.responseText;
            document.getElementById("loader").style.display = "none";
        }else if (xhr.readyState < 4) {
            document.getElementById("loader").style.display = "block";
        }
    };
     
    var serie = document.getElementById('serieInput').value;
    var support = document.getElementById('supportInput').value;
    var qualite = document.getElementById('qualiteInput').value;

    var query = "?serie=" + serie + "&support=" + support + "&qualite=" + qualite;

    xhr.open("GET", "/HaveYouAMovie/includes/webroot/js/ajax/listeSerieLoader.ajax.php" + query, true);
    xhr.send(null);
}

function requestFilm() {
    var xhr   = getXMLHttpRequest();
     
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
            var ajaxDisplay = document.getElementById('listeFilm');
            ajaxDisplay.innerHTML = xhr.responseText;
            document.getElementById("loader").style.display = "none";
        }else if (xhr.readyState < 4) {
            document.getElementById("loader").style.display = "block";
        }
    };
     
    var film = document.getElementById('filmInput').value;
    var support = document.getElementById('supportInput').value;
    var qualite = document.getElementById('qualiteInput').value;

    var query = "?film=" + film + "&support=" + support + "&qualite=" + qualite;

    xhr.open("GET", "/HaveYouAMovie/includes/webroot/js/ajax/listeFilmLoader.ajax.php" + query, true);
    xhr.send(null);
}