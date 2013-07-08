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

?><form method="POST" action="<?= BASE_URL ?>/Films/Recherche/">
    <fieldset>
    <legend>Rechercher un film : </legend>
    
        <div class="large-2 hide-for-small columns">
            <label for="film" class="right inline">Nom du film</label>
        </div>
        <div class="large-4 columns <?php echo (isset($_POST['film']) && empty($_POST['film'])) ? 'error' : ''; ?>">
            <input <?php echo (isset($_POST['film']) && empty($_POST['film'])) ? 'class="error"' : ''; ?> type="text" id="film" name="film" placeholder="Nom du film..." >
            <?php echo (isset($_POST['film']) && empty($_POST['film'])) ? '<small class="error">Formulaire vide - Recherche impossible</small>' : ''; ?>
        </div>
        <div class="large-6 columns">
            <input class="small button" type="submit" id="submit" name="submit" value="Rechercher">
        </div>
    </fieldset>
</form>

<?php
    if(isset($_POST['submit']) && !empty($_POST['film'])){
        extract($_POST);

        $data = rechercheFilmParTitre($film, $db);

        echo '<table id="tableFilm" class="large-12 small-12 columns">';
        echo '<thead><tr><th>Titre</th><th>Genre</th><th>Support</th><th>Qualité</th></tr></thead><tbody>';
    
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
                echo '<p><b>Année de production</b> : '. $q['productionYear'] .'</p>';
                echo '<p><b>Genre</b> : '.  $q['genre'] .'</p>';
                echo '<p><b>synopsis</b> : '.  $q['synopsis'] .'</p>';
                echo '<p><b>Acteurs</b> : '.  $q['actors'] .'</p>';
                echo '<p><b><a href="#" data-reveal-id="trailer' . $q['id'] . '">Trailer</a></b></p>';
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

    }else if(isset($r['params']['0']) && !isset($r['params']['1'])){

        $r['params']['0'] = str_replace('%20', ' ', $r['params']['0']);

        $data = rechercheFilmParTitre($r['params']['0'], $db);

        echo '<table id="tableFilm" class="large-12 small-12 columns">';
        echo '<thead><tr><th>Titre</th><th>Genre</th><th>Support</th><th>Qualité</th></tr></thead><tbody>';
    
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
                echo '<p><b>Année de production</b> : '. $q['productionYear'] .'</p>';
                echo '<p><b>Genre</b> : '.  $q['genre'] .'</p>';
                echo '<p><b>synopsis</b> : '.  $q['synopsis'] .'</p>';
                echo '<p><b>Acteurs</b> : '.  $q['actors'] .'</p>';
                echo '<p><b><a href="#" data-reveal-id="trailer' . $q['id'] . '">Trailer</a></b></p>';
            echo '</div>';

            echo '<a class="close-reveal-modal">Fermer &#215;</a>';
            echo '</div>';
            
            echo '<div id="trailer' . $q['id'] . '" class="reveal-modal medium">';
                echo '<div class="flex-video"><iframe src="http://www.allocine.fr/_video/iblogvision.aspx?cmedia=' . $q['trailer'] . '" width="480px" height="270px" frameborder="0"></iframe></div>';
            echo '<a class="close-reveal-modal">Fermer &#215;</a>';
            echo '</div>';          
        }
    }