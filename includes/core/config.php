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

    $config = array(
            'name'      => 'HaveYouAMovie',
            'version'   => '0.1',
            'author'    => 'Elhebert',
    );
    
    // Configuration de la base de donnée
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'hyam';

        

    // NE PAS MODIFIER !

    define('ENVIRONNEMENT', 'prod');                 // Environnment de l'application

    // Dossiers
    define('PATH_CSS', 'includes/webroot/css');
    define('PATH_JS', 'includes/webroot/js');
    define('PATH_IMG', 'includes/webroot/img');


    // Affichage des erreurs
    switch (ENVIRONNEMENT) {
        case 'dev':
            ini_set('display_errors', true);
            break;

        case 'prod':
            ini_set('display_errors', false);
            break;
    }

    // Import des API
    if(file_exists('includes/API/Allocine/allocine.class.php'))
        require_once('includes/API/Allocine/allocine.class.php');

    // Config de l'API Allocine
    define('ALLOCINE_PARTNER_KEY', '100043982026');
    define('ALLOCINE_SECRET_KEY', '29d185d98c984a359e6e6f26a0474269');

    // Connexion à la base de données
    try
    {
        $db = new PDO("mysql:host=$hostname;dbname=$database", "$username", "$password");
        $db->exec("SET CHARACTER SET utf8");
    }
    catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }