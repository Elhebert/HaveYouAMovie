<?php

    /**
     *  _    _              __     __         
     * | |  | |             \ \   / /         
     * | |__| | __ ___   ____\ \_/ /__  _   _ 
     * |  __  |/ _` \ \ / / _ \   / _ \| | | |
     * | |  | | (_| |\ V /  __/| | (_) | |_| |
     * |_|  |_|\__,_| \_/ \___||_|\___/ \__,_|
     *           __  __            _          
     *     /\   |  \/  |          (_)         
     *    /  \  | \  / | _____   ___  ___     
     *   / /\ \ | |\/| |/ _ \ \ / / |/ _ \    
     *  / ____ \| |  | | (_) \ V /| |  __/    
     * /_/    \_\_|  |_|\___/ \_/ |_|\___|  
     *
     *
     * HaveYouAMovie 0.1 - Gérer votre liste de films de manière simple et rapide ...
     * 
     * @author      Elhebert (http://twitter.com/Elhebert)
     * @licence     Copyleft - GNU GPL v3
     * @name        HaveYouAMovie
     * @version     0.1
     * 
     */


    if(isset($r['params']['1']) && $r['params']['1'] == 'true')
        echo '<div data-alert class="alert-box success">Un film vient d\'être ajouté à votre base de donnée !<a href="#" class="close">&times;</a></div>';

    echo '<h3>Liste des films :</h3>';

    $data = rechercherToutLesFilms($db);

    echo '<table id="tableFilm" class="large-12 small-12 columns">';
        echo '<thead><tr><th>Titre</th><th>Genre</th><th>Support</th><th>Qualité</th><thead><tbody>';
    
    while($q = $data->fetch()){
        echo '<tr><td>';
        echo '<a href="#" data-reveal-id="film' . $q['id'] . '">' . $q['title'] . '</a>';
        echo '</td><td>' . $q['genre'] . '</td>';
        echo '</td><td>' . $q['support'] . '</td>';
        echo '</td><td>' . $q['qualite'] . '</td>';

        echo '<div id="film' . $q['id'] . '" class="reveal-modal">';
            echo '<div class="large-2 small-2 hide-for-medium-down columns">';
            echo '<img src="' . $q['poster']  . '" alt="">';
            echo '</div><div class="large-10 small-10 columns">';
            echo '<h3>' . $q['title'] . '</h3>';
            echo '<p><strong>Année de production</strong> : '. $q['productionYear'] .'</p>';
            echo '<p><strong>Genre</strong> : '.  $q['genre'] .'</p>';
            echo '<p><strong>synopsis</strong> : '.  $q['synopsis'] .'</p>';
            echo '<p><strong>Acteurs</strong> : '.  $q['actors'] .'</p>';
            echo '<p><strong><a href="#" data-reveal-id="trailer' . $q['id'] . '">Trailer</a></strong></p>';
            echo '</div>';

        echo '<a class="close-reveal-modal">Fermer &#215;</a>';
        echo '</div>';
        
        echo '<div id="trailer' . $q['id'] . '" class="reveal-modal medium">';
            echo '<div class="flex-video"><iframe src="http://www.allocine.fr/_video/iblogvision.aspx?cmedia=' . $q['trailer'] . '" width="480px" height="270px" frameborder="0"></iframe></div>';
        echo '<a class="close-reveal-modal">Fermer &#215;</a>';
        echo '</div>';          
    }

    $data->closecursor();

    echo '</tbody></table>';