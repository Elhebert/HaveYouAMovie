<?php

    session_start();

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

    // Chemins
    define('CORE', 'includes/core');
    define('BASE_URL', dirname($_SERVER['SCRIPT_NAME']));
    define('WEBROOT', 'includes/webroot');
    define('ADMIN', 'includes/admin');
    define('MEMBRE', 'includes/membre');

    // Config Générale
    header('Content-Type: text/html; charset=utf-8');       // Charset
    @ini_set('magic_quotes_runtime', 0);                    // Désactive la fonction magic_quotes
    @ini_set('magic_quotes_gpc', '0');                      // Désactive la fonction magic_quotes

    require(CORE . '/config.php');                          // Chemin vers le fichier de configuration
    require(CORE . '/functions.php');                       // Chemin vers le fichier de fonction
    require(CORE . '/router.php');                          // Chemin vers le fichier de routage
    
    include(WEBROOT . '/header.html');

    echo '<div class="row">';
    // Inclusion des différentes pages
    if($r['prefix'] == 'admin'){
        if(!isset($_SESSION['login']) && ucfirst($request_page) != 'Inscription')
            include(ADMIN . '/login.php');
        else{

        }
    }else{
        if (file_exists("includes" . $r['path'] . $r['page'] . "/" . strtolower($r['action']) . ".php"))
            include("includes" . $r['path'] . $r['page'] . "/" . strtolower($r['action']) . ".php");
    }
    echo '</div>';
    include(WEBROOT . '/footer.html');