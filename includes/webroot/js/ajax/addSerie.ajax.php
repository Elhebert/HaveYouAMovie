<?php
    session_start();

    extract($_GET);

    require_once('../../../core/config.php');
    require_once('../../../core/functions.php');

    if(file_exists('../../../API/Allocine/allocine.class.php'))
        require_once('../../../API/Allocine/allocine.class.php');

    $allocine = new Allocine(ALLOCINE_PARTNER_KEY, ALLOCINE_SECRET_KEY);

    $results_detail = $allocine->getSerie($code);
    $array_detail = json_decode($results_detail, true);

    $support = ($support == '1') ? 'PS3' : 'DVD';
    $qualite = ($qualite == '1') ? 'BluRay' : 'DVD';

    $serie_detail = $array_detail['tvseries'];

    $genre = '';

    foreach ($serie_detail['genre'] as $k => $v){
        $genre .= $v['$'] . ', ';
    }

    $genre = trim($genre, ', ');
    $synopsis = (array_key_exists('synopsis', $serie_detail)) ? $serie_detail['synopsis'] : 'Pas de synopsis disponible';
    $saison = $serie_detail['seasonCount'];
    $poster = (isset($serie_detail['poster'])) ? $serie_detail['poster']['href'] : '';
    $trailer = (isset($serie_detail['trailer'])) ? $serie_detail['trailer']['code'] : '';

    if(array_key_exists('castingShort', $serie_detail))
        if(array_key_exists('actors', $serie_detail['castingShort']))
            $casting = $serie_detail['castingShort']['actors'];
        else
            $casting = 'Pas d\'information disponible';

    $serie_detail['title'] = (isset($serie_detail['title'])) ? $serie_detail['title'] : $serie_detail['originalTitle'];

    if(ajoutSerie($serie_detail['originalTitle'], $serie_detail['title'], $genre, $serie_detail['code'], $casting, $saison, $synopsis, $qualite, $support, $trailer, $poster, $db)){
        echo '<div data-alert id="errorAlertBox" class="alert-box alert">Une erreur s\'est produite ! Veuillez réessayer plus tard !<a href="#" class="close">&times;</a></div>';
    }else{
        echo '<div data-alert id="successAlertBox" class="alert-box success">La série "' . $serie_detail['title'] . '" vient d\'être ajoutée à votre base de donnée !<a href="#" class="close">&times;</a></div>';
    }