<?php
    session_start();

    extract($_GET);

    require_once('../../../core/config.php');
    require_once('../../../core/functions.php');

    if(file_exists('../../../API/Allocine/allocine.class.php'))
        require_once('../../../API/Allocine/allocine.class.php');

    $allocine = new Allocine(ALLOCINE_PARTNER_KEY, ALLOCINE_SECRET_KEY);

    $results = $allocine->searchFilm($film);
    $array = json_decode($results, true);

    echo '<table class="large-12 columns">';
    echo '<tbody>';
    for($i = 0; $i < $array['feed']['totalResults'] && $i <= 9; $i ++){
        $movie = $array['feed']['movie'][$i];

        $productionYear = (array_key_exists('productionYear', $movie)) ? $movie['productionYear'] : '';

        if(array_key_exists('castingShort', $movie))
            if(array_key_exists('actors', $movie['castingShort']))
                $casting = $movie['castingShort']['actors'];
        else
            $casting = 'Pas d\'information disponible';

        echo '<tr><td class="large-2 small-2 show-for-landscape hide-for-medium-down columns">';
        echo (isset($movie['poster'])) ? '<img src="' . $movie['poster']['href']  . '" alt="">' : '<img src="/HaveYouAMovie/' . PATH_IMG . '/' . 'empty_photo.jpg" alt="">';
        echo '</td><td class="large-10 small-10 columns">';
        echo (isset($movie['title'])) ? '<h6><a href="#" data-reveal-id="film' . $i . '">' . $movie['title']  . '</a></h6>' : '<h6><a href="#" data-reveal-id="film' . $i . '">' . $movie['originalTitle']  . '</a></h6>';
        echo '<p><b>Année de production</b> : '. $productionYear .'</p>';
        echo '<p><b>Acteurs</b> : '.  $casting .'</p>';
        echo '</td><td><a href="#" class="button round success" onClick="addFilm(' . $movie['code'] . ',' . $support . ',' . $qualite . ')">Choisir</a></td></tr>';

        echo '<div id="film' . $i . '" class="reveal-modal">';
            $results_detail = $allocine->getFilm($movie['code']);
            $array_detail = json_decode($results_detail, true);

            $movie_detail = $array_detail['movie'];

            $genre = '';

            foreach ($movie_detail['genre'] as $k => $v){
                $genre .= $v['$'] . ', ';
            }

            $genre = trim($genre, ', ');
            $synopsis = (array_key_exists('synopsis', $movie_detail)) ? $movie_detail['synopsis'] : 'Pas de synopsis disponible';
            $productionYear = (array_key_exists('productionYear', $movie_detail)) ? $movie_detail['productionYear'] : '';

            if(array_key_exists('castingShort', $movie_detail))
                if(array_key_exists('actors', $movie_detail['castingShort']))
                    $casting = $movie_detail['castingShort']['actors'];
                else
                    $casting = 'Pas d\'information disponible';

            echo '<div class="large-2 small-2 hide-for-medium-down columns">';
                echo (isset($movie_detail['poster'])) ? '<img src="' . $movie_detail['poster']['href']  . '" alt="">' : '<img src="/HaveYouAMovie/' . PATH_IMG . '/' . 'empty_photo.jpg" alt="">';
                echo '</div><div class="large-10 small-10 columns">';
                echo (isset($movie_detail['title'])) ? '<h3>' . $movie_detail['title']  . '</h3>' : '<h3>' . $movie_detail['originalTitle']  . '</h3>';
                echo '<p><b>Année de production</b> : '. $productionYear .'</p>';
                echo '<p><b>Genre</b> : '.  $genre .'</p>';
                echo '<p><b>synopsis</b> : '.  $synopsis .'</p>';
                echo '<p><b>Acteurs</b> : '.  $casting .'</p>';
            echo '</div>';
        echo '<a class="close-reveal-modal">Fermer &#215;</a>';
        echo '</div>';
    }
    echo '</tbody></table>';