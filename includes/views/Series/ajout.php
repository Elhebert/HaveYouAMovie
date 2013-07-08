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

?>    <form>
        <fieldset>
        <legend>Ajouter une série : </legend>
        
            <div class="large-2 hide-for-small columns">
                <label for="Serie" class="right inline">Nom de la série</label>
            </div>
            <div class="large-4 columns <?php echo (isset($_POST['Serie']) && empty($_POST['Serie'])) ? 'error' : ''; ?>">
                <input <?php echo (isset($_POST['Serie']) && empty($_POST['Serie'])) ? 'class="error"' : ''; ?> type="text" id="serieInput" name="serie" placeholder="Nom de la série">
                <?php echo (isset($_POST['Serie']) && empty($_POST['Serie'])) ? '<small class="error">Formulaire vide - Recherche impossible</small>' : ''; ?>
            </div>
            <div class="lare-6 columns"></div>

            <div class="large-2 hide-for-small columns">
                <label for="support" class="right inline">Support</label>
            </div>
            <div class="large-4 columns">
                <select name="support" id="supportInput">
                    <option value="1">PS3</option>
                    <option value="2">DVD</option>
                </select>
            </div>

            <div class="lare-6 columns"></div>

            <div class="large-2 hide-for-small columns">
                <label for="qualite" class="right inline">Qualité</label>
            </div>
            <div class="large-4 columns">
                <select name="qualite" id="qualiteInput">
                    <option value="1">BluRay</option>
                    <option value="2">DVD</option>
                </select>
            </div>
            
            <div class="lare-6 columns"></div>

            <div class="large-6 columns">
                <input type="button" class="small button" id="submit" name="submit" value="Rechercher" onClick="requestSerie()">
            </div>
        </fieldset>
    </form>

    <span id="loader" style="margin: 0 auto; text-align: center; display: none;"><img src="<?= BASE_URL . '/' . PATH_IMG ?>/ajax-loader.gif" alt="loading" /></span>
    
    <div id="listeSerie">
        
    </div>

    