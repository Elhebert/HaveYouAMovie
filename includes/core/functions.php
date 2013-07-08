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

    /**
     * Permet le debug d'une variable
     *
     * @param $var variable à débugger
     * @return void
     * @author Dieter Stinglhamber
     **/
    function debug($var){
        if(ENVIRONNEMENT == 'dev'){
            $debug = debug_backtrace(); 

            echo '<p>&nbsp;</p><p><a href="#" onclick="$(this).parent().next(\'ol\').slideToggle(); return false;"><strong>' . $debug[0]['file'] . ' </strong> l.' . $debug[0]['line'] . '</a></p>'; 
                echo '<ol style="display:none;">';

            foreach($debug as $k => $v){ 
                if($k > 0)
                    echo '<li><strong>' . $v['file'] . ' </strong> l.' . $v['line'] . '</li>'; 
            }

                echo '</ol>';

            echo '<pre>';
                print_r($var);
            echo '</pre>'; 
        }
    }

    // Router

    /**
     * Permet de parser une url
     *
     * @param $url url à parser
     * @return r tableau contenant les paramètres
     * @author Dieter Stinglhamber
     **/
    function parse($url = ''){
        $url = trim($url, '/');

        $params = explode('/', $url);

        $r = array();

        $r['path'] = '/views/';
        $r['prefix'] = '';
        
        if(isset($params[1])){
            if(strtolower($params[1]) == 'admin'){
                $r['prefix'] = $params[1];
                array_shift($params);
            }else if(strtolower($params[1]) == 'admin')
                $r['prefix'] = 'membre';
            else
                $r['prefix'] = 'views';
            $r['path'] = '/' . $r['prefix'] . '/';
        }

        $r['page'] = (isset($params[1])) ? $params[1] : 'Accueil';
        $r['action'] = (isset($params[2])) ? $params[2] : 'Index';
        $r['params'] = array_slice($params, 3);

        return $r;
    }

    /**
     * Permet de créer une url
     *
     * @param $request page voulu
     * @return $url url
     * @author Dieter Stinglhamber
     **/
    function url($request, $label){
        $url = '<a href="' . BASE_URL . '/' . $request . '">' . $label . '</a>';

        return $url;
    }

    /**
     * Redirige l'utilisateur vers la page souhaiter
     *
     * @param url page vers laquelle on veux redirigé le visiteur
     * @param delais après combien de temps la rediriction doit être éffectuer (en seconde)
     * @return void
     * @author Dieter Stinglhamber
     **/
    function redirection($url, $delais=0){
       die('<meta http-equiv="refresh" content="' . $delais . ';URL=' . $url . '">');
    }

    // Requête SQL

    /**
     * undocumented function
     *
     * @return void
     * @author 
     **/
    function ajoutFilm($originalTitle, $titre, $genre, $code, $actors, $productionYear, $synopsis, $qualite, $support, $trailer, $poster, $db){
        $synopsis = mysql_real_escape_string($synopsis);

        $sql = "INSERT INTO `film` (title, originalTitle, genre, actors, productionYear, synopsis, qualite, support, poster, trailer, code) VALUES ('$titre', '$originalTitle', '$genre', '$actors', $productionYear, '$synopsis', '$qualite', '$support', '$poster', '$trailer', $code)";

        $query = $db->prepare($sql);
        $query->execute();
    }

    /**
     * undocumented function
     *
     * @return void
     * @author 
     **/
    function rechercherToutLesFilms($db, $tri = 'title'){
        $tri = strtolower($tri);
        $sql = "SELECT * FROM film ORDER BY $tri ASC";

        $query = $db->prepare($sql);
        $query->execute();        

        return $query;
    }

    /**
     * undocumented function
     *
     * @return void
     * @author 
     **/
    function rechercheFilmparTitre($titre, $db){
        $sql = "SELECT * FROM film WHERE originalTitle LIKE '%$titre%' OR title LIKE '%$titre%'";

        $query = $db->prepare($sql);
        $query->execute();

        return $query;
    }

    /**
     * undocumented function
     *
     * @return void
     * @author 
     **/
    function rechercherLestCinqDernierFilms($db){
        $sql = "SELECT * FROM film ORDER BY id DESC LIMIT 5";

        $query = $db->prepare($sql);
        $query->execute();        

        return $query;   
    }

    /**
     * undocumented function
     *
     * @return void
     * @author 
     **/
    function ajoutSerie($originalTitle, $titre, $genre, $code, $actors, $saison, $synopsis, $qualite, $support, $trailer, $poster, $db){
        $synopsis = mysql_real_escape_string($synopsis);

        $sql = "INSERT INTO `serie` (title, originalTitle, genre, actors, saison, synopsis, qualite, support, poster, trailer, code) VALUES ('$titre', '$originalTitle', '$genre', '$actors', $saison, '$synopsis', '$qualite', '$support', '$poster', '$trailer', $code)";

        $query = $db->prepare($sql);
        $query->execute();
    }

    /**
     * undocumented function
     *
     * @return void
     * @author 
     **/
    function rechercherToutesLesSeries($db){
        $sql = "SELECT * FROM Serie";

        $query = $db->prepare($sql);
        $query->execute();        

        return $query;
    }

    /**
     * undocumented function
     *
     * @return void
     * @author 
     **/
    function rechercheSeriesparTitre($titre, $db){
        $sql = "SELECT * FROM serie WHERE originalTitle LIKE '%$titre%' OR title LIKE '%$titre%'";

        $query = $db->prepare($sql);
        $query->execute();

        return $query;
    }

    /**
     * undocumented function
     *
     * @return void
     * @author 
     **/
    function rechercherLestCinqDerniereSerie($db){
        $sql = "SELECT * FROM serie ORDER BY id DESC LIMIT 5";

        $query = $db->prepare($sql);
        $query->execute();        

        return $query;   
    }