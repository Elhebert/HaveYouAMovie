<?php
    session_start();

    extract($_GET);

    require_once('../../../core/config.php');
    require_once('../../../core/functions.php');

    if(file_exists('../../../API/Allocine/allocine.class.php'))
        require_once('../../../API/Allocine/allocine.class.php');

    $allocine = new Allocine(ALLOCINE_PARTNER_KEY, ALLOCINE_SECRET_KEY);

    $results_detail = $allocine->getFilm($code);
    $array_detail = json_decode($results_detail, true);

    $support = ($support == '1') ? 'PS3' : 'DVD'; 
    $qualite = ($qualite == '1') ? 'BluRay' : 'DVD'; 

    $movie_detail = $array_detail['movie'];

    $genre = '';

    foreach ($movie_detail['genre'] as $k => $v){
        $genre .= $v['$'] . ', ';
    }

    $genre = trim($genre, ', ');
    $synopsis = (array_key_exists('synopsis', $movie_detail)) ? $movie_detail['synopsis'] : 'Pas de synopsis disponible';
    $productionYear = (array_key_exists('productionYear', $movie_detail)) ? $movie_detail['productionYear'] : '';
    $poster = (isset($movie_detail['poster'])) ? $movie_detail['poster']['href'] : '/HaveYouAMovie/' . PATH_IMG . '/' . 'empty_photo.jpg';
    $trailer = (isset($movie_detail['trailer'])) ? $movie_detail['trailer']['code'] : '';

    if(array_key_exists('castingShort', $movie_detail))
        if(array_key_exists('actors', $movie_detail['castingShort']))
            $casting = $movie_detail['castingShort']['actors'];
        else
            $casting = 'Pas d\'information disponible';

    $movie_detail['title'] = (isset($movie_detail['title'])) ? $movie_detail['title'] : $movie_detail['originalTitle'];

    if(ajoutFilm($movie_detail['originalTitle'], $movie_detail['title'], $genre, $movie_detail['code'], $casting, $productionYear, $synopsis, $qualite, $support, $trailer, $poster, $db)){
        echo '<div data-alert id="errorAlertBox" class="alert-box alert">Une erreur s\'est produite ! Veuillez réessayer plus tard !<a href="#" class="close">&times;</a></div>';
    }else{
        echo '<div data-alert id="successAlertBox" class="alert-box success">Le film "' . $movie_detail['title'] . '" vient d\'être ajoutée à votre base de donnée !<a href="#" class="close">&times;</a></div>';
    }