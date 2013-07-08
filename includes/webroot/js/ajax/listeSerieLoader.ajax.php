<?php
    session_start();

    extract($_GET);

    require_once('../../../core/config.php');
    require_once('../../../core/functions.php');

    if(file_exists('../../../API/Allocine/allocine.class.php'))
        require_once('../../../API/Allocine/allocine.class.php');

    $allocine = new Allocine(ALLOCINE_PARTNER_KEY, ALLOCINE_SECRET_KEY);
    
    $results = $allocine->searchSerie($serie);
    $array = json_decode($results, true);

    echo '<table class="large-12 columns">';
    echo '<tbody>';
    for($i = 0; $i < $array['feed']['totalResults'] && $i <= 9; $i ++){
        $serie = $array['feed']['tvseries'][$i];

        $yearStart = (array_key_exists('yearStart', $serie)) ? $serie['yearStart'] : '';

        if(array_key_exists('castingShort', $serie))
            if(array_key_exists('actors', $serie['castingShort']))
                $casting = $serie['castingShort']['actors'];
        else
            $casting = 'Pas d\'information disponible';

        echo '<tr><td class="large-2 small-2 show-for-landscape hide-for-medium-down columns">';
        echo (isset($serie['poster'])) ? '<img src="' . $serie['poster']['href']  . '" alt="">' : '';
        echo '</td><td class="large-10 small-10 columns">';
        echo (isset($serie['title'])) ? '<a href="#" data-reveal-id="film' . $i . '">' . $serie['title']  . '</a>' : '<a href="#" data-reveal-id="film' . $i . '">' . $serie['originalTitle']  . '</a>';
        echo '<p><b>Première diffusion</b> : '. $yearStart .'</p>';
        echo '<p><b>Acteurs</b> : '.  $casting .'</p>';
        echo '</td><td><a href="#" class="button round success" onClick="addSerie(' . $serie['code'] . ',' . $support . ',' . $qualite . ');">Choisir</a></td></tr>';

        echo '<div id="film' . $i . '" class="reveal-modal">';
            $results_detail = $allocine->getSerie($serie['code']);
            $array_detail = json_decode($results_detail, true);

            $serie_detail = $array_detail['tvseries'];

            $genre = '';

            foreach ($serie_detail['genre'] as $k => $v){
                $genre .= $v['$'] . ', ';
            }

            $genre = trim($genre, ', ');
            $synopsis = (array_key_exists('synopsis', $serie_detail)) ? $serie_detail['synopsis'] : 'Pas de synopsis disponible';
            $saison = $serie_detail['seasonCount'];

            if(array_key_exists('castingShort', $serie_detail))
                if(array_key_exists('actors', $serie_detail['castingShort']))
                    $casting = $serie_detail['castingShort']['actors'];
                else
                    $casting = 'Pas d\'information disponible';

            echo '<div class="large-2 small-2 hide-for-medium-down columns">';
                echo (isset($serie_detail['poster'])) ? '<img src="' . $serie_detail['poster']['href']  . '" alt="">' : '';
                echo '</div><div class="large-10 small-10 columns">';
                echo (isset($serie_detail['title'])) ? '<h3>' . $serie_detail['title']  . '</h3>' : '<h3>' . $serie_detail['originalTitle']  . '</h3>';
                echo '<p><b>Nombre de saisons</b> : '. $saison .'</p>';
                echo '<p><b>Genre</b> : '.  $genre .'</p>';
                echo '<p><b>synopsis</b> : '.  $synopsis .'</p>';
                echo '<p><b>Acteurs</b> : '.  $casting .'</p>';
            echo '</div>';
        echo '<a class="close-reveal-modal">Fermer &#215;</a>';
        echo '</div>';
    }
    echo '</tbody></table>';