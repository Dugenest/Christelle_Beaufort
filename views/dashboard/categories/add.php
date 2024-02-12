<h1>Ajout d'une catégorie</h1>

<form method="post" action="">
    <div class="mb-3">
        <label for="category" class="form-label"><strong>Catégories <strong class="danger">*</strong></strong></label>
        <input type="text" class="form-control" id="category" name="category" value="<?= $category ?? '' ?>" maxlength='30' aria-describedby="categoryHelp" placeholder="Veuillez entrer votre catégorie svp?" required>
        <div class="error">
            <p id="error1" class="d-none"></p><br>
            <?= $error['category'] ?? '' ?>
        </div>
        <div class="success">
            <?= $msg['success'] ?? '' ?>
        </div><br>


        <div class="insert">
            <input class="button" type="submit" name="insert" value="Ajouter une catégorie">
        </div>
        <div class="cancel">
            <a href="/controllers/dashboard/users/list-ctrl.php"><input class="button" type="submit" name="cancel" value="Annuler"></a>
        </div>
    </div>
</form>