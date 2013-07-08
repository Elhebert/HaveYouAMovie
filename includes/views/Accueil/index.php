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

?>
<h3>Les cinq derniers films ajoutés :</h3>
<?php
    
    $data = rechercherLestCinqDernierFilms($db);

?>
    <table id="tableFilm" class="large-12 small-12 columns">
    <thead>
        <tr>
            <th class="large-5">Titre</th>
            <th class="large-3">Genre</th>
            <th class="large-2">Support</th>
            <th class="large-2">Qualité</th>
        </tr>
    </thead>
    <tbody>
<?php
    while($q = $data->fetch()){
        echo '<tr><td>';
        echo '<strogn><a href="#" data-reveal-id="film' . $q['id'] . '">' . $q['title'] . '</a></strong>';
        echo '</td><td>' . $q['genre'] . '</td>';
        echo '</td><td>' . $q['support'] . '</td>';
        echo '</td><td>' . $q['qualite'] . '</td>';

        echo '<div id="film' . $q['id'] . '" class="reveal-modal">';
           if(!empty($q['poster'])){
                echo '<div class="large-2 small-2 hide-for-medium-down hide-for-portrait columns">';
                echo '<img src="' . $q['poster']  . '" alt="">';
                echo '</div><div class="large-10 small-10 columns">';
           }else{
                echo '</div><div class="large-12 small-12 columns"';
           }
            echo '<h3>' . $q['title'] . '</h3>';
            echo '<p><strong>Année de production</strong> : '. $q['productionYear'] .'</p>';
            echo '<p><strong>Genre</strong> : '.  $q['genre'] .'</p>';
            echo '<p><strong>synopsis</strong> : '.  $q['synopsis'] .'</p>';
            echo '<p><strong>Acteurs</strong> : '.  $q['actors'] .'</p>';
            if(!empty($q['trailer']))
                echo '<p><b><a href="#" data-reveal-id="trailerFilm' . $q['id'] . '">Trailer</a></b></p>';
            echo '</div>';

        echo '<a class="close-reveal-modal">&#215;</a>';
        echo '</div>';
        if(!empty($q['trailer'])){
            echo '<div id="trailerFilm' . $q['id'] . '" class="reveal-modal medium">';
                echo '<div class="flex-video"><iframe src="http://www.allocine.fr/_video/iblogvision.aspx?cmedia=' . $q['trailer'] . '" width="480px" height="270px" frameborder="0"></iframe></div>';
            echo '<a class="close-reveal-modal">&#215;</a>';
            echo '</div>'; 
        }       
    }

    $data->closecursor();
?>
    </tbody>
</table>

<h3>Les cinq dernières séries ajoutées :</h3>
<?php
    
    $data = rechercherLestCinqDerniereSerie($db);

?>
    <table id="tableSerie" class="large-12 small-12 columns">
    <thead>
        <tr>
            <th class="large-5">Titre</th>
            <th class="large-3">Genre</th>
            <th class="large-2">Support</th>
            <th class="large-2">Qualité</th>
        </tr>
    </thead>
    <tbody>
<?php
    while($q = $data->fetch()){
        echo '<tr><td>';
        echo '<a href="#" data-reveal-id="serie' . $q['id'] . '">' . $q['title'] . '</a>';
        echo '</td><td>' . $q['genre'] . '</td>';
        echo '</td><td>' . $q['support'] . '</td>';
        echo '</td><td>' . $q['qualite'] . '</td>';

        echo '<div id="serie' . $q['id'] . '" class="reveal-modal">';
           if(!empty($q['poster'])){
                echo '<div class="large-2 small-2 hide-for-medium-down hide-for-portrait columns">';
                echo '<img src="' . $q['poster']  . '" alt="">';
                echo '</div><div class="large-10 small-10 columns">';
           }else{
                echo '</div><div class="large-12 small-12 columns"';
           }
            echo '<h3>' . $q['title'] . '</h3>';
            echo '<p><strong>Nombre de saisons</strong> : '. $q['saison'] .'</p>';
            echo '<p><strong>Genre</strong> : '.  $q['genre'] .'</p>';
            echo '<p><strong>synopsis</strong> : '.  $q['synopsis'] .'</p>';
            echo '<p><strong>Acteurs</strong> : '.  $q['actors'] .'</p>';
            if(!empty($q['trailer']))
                echo '<p><b><a href="#" data-reveal-id="trailerSerie' . $q['id'] . '">Trailer</a></b></p>';
            echo '</div>';

        echo '<a class="close-reveal-modal">&#215;</a>';
        echo '</div>';
        if(!empty($q['trailer'])){
            echo '<div id="trailerSerie' . $q['id'] . '" class="reveal-modal medium">';
                echo '<div class="flex-video"><iframe src="http://www.allocine.fr/_video/iblogvision.aspx?cmedia=' . $q['trailer'] . '" width="480px" height="270px" frameborder="0"></iframe></div>';
            echo '<a class="close-reveal-modal">&#215;</a>';
            echo '</div>'; 
        }       
    }

    $data->closecursor();
?>
    </tbody>
</table>
