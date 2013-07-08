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

?><form>
    <fieldset>
    <legend>Ajouter un film : </legend>
    
        <div class="large-2 hide-for-small columns">
            <label for="film" class="right inline">Nom du film</label>
        </div>
        <div class="large-4 columns <?php echo (isset($_POST['film']) && empty($_POST['film'])) ? 'error' : ''; ?>">
            <input <?php echo (isset($_POST['film']) && empty($_POST['film'])) ? 'class="error"' : ''; ?> type="text" id="filmInput" name="film" placeholder="Nom du film" >
            <?php echo (isset($_POST['film']) && empty($_POST['film'])) ? '<small class="error">Formulaire vide - Recherche impossible</small>' : ''; ?>
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
            <input class="small button" type="button" id="submit" name="submit" value="Rechercher" onClick="requestFilm()">
        </div>
    </fieldset>
</form>

<span id="loader" style="display: none; margin: 0 auto; text-align: center;"><img src="<?= BASE_URL . '/' . PATH_IMG ?>/ajax-loader.gif" alt="loading" /></span>

<div id="listeFilm">
        
</div>
