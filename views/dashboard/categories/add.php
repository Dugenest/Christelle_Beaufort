<h1>Ajout d'une catégorie</h1>

    <form method="post">
        <div class="mb-3">
            <label for="name" class="form-label"><strong>Ajout</strong></label>
            <input type="text" class="form-control" id="name" name="name" value="<?=$name??''?>" maxlength='30' aria-describedby="nameHelp" placeholder="Veuillez entrer votre catégorie svp?">
            <div class="error">
                <?= $error['name'] ?? ''?><br>
                <?= $msg['success'] ?? '' ?><br>
            </div><br>
            <div class="insert">
                <input class="button" type="submit" name="insert" value="Ajouter une catégorie">
            </div>
            <div class="cancel">
                <a href="/controllers/dashboard/categories/list-ctrl.php"><input class="button" type="submit" name="cancel" value="Annuler"></a>
            </div>
        </div>
    </form> 