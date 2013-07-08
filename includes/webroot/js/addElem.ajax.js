function addSerie(code, support, qualite){
    var xhr   = getXMLHttpRequest();

    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
            var ajaxDisplay = document.getElementById('listeSerie');
            ajaxDisplay.innerHTML = xhr.responseText;
        }
    };

    var support = document.getElementById('supportInput').value;
    var qualite = document.getElementById('qualiteInput').value;

    var query = "?code=" + code + "&support=" + support + "&qualite=" + qualite;

    xhr.open("GET", "/HaveYouAMovie/includes/webroot/js/ajax/addSerie.ajax.php" + query, true);
    xhr.send(null);
}

function addFilm(code) {
    var xhr   = getXMLHttpRequest();

    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
            var ajaxDisplay = document.getElementById('listeFilm');
            ajaxDisplay.innerHTML = xhr.responseText;
        }
    };

    var support = document.getElementById('supportInput').value;
    var qualite = document.getElementById('qualiteInput').value;

    var query = "?code=" + code + "&support=" + support + "&qualite=" + qualite;

    xhr.open("GET", "/HaveYouAMovie/includes/webroot/js/ajax/addFilm.ajax.php" + query, true);
    xhr.send(null);
}