<h1>Ajout d'une catégorie</h1>

<form method="post" action="">
    <div class="row justify-content-center py-5">
        <div class="col col-md-6 mb-3">
            <label for="category" class="form-label"><strong>Catégories <strong class="danger">*</strong></strong></label>
            <select class="form-control" id="category" name="category" aria-describedby="categoryHelp" required>
                <option value="Gallerie">Gallerie</option>
                <option value="Portfolio">Portfolio</option>
            </select>
            <div class="error"></div>
            <p id="error1" class="d-none"></p><br>
            <?= $error['category'] ?? '' ?>
        </div>
        <div class="success">
            <?= $msg['success'] ?? '' ?>
        </div><br>

        <div class="col col-md-6 mb-3">
            <label for="sub_category" class="form-label"><strong>Sous catégories </strong></label>
            <input type="text" class="form-control" id="sub_category" name="sub_category" value="<?= $sub_category ?? '' ?>" maxlength='30' aria-describedby="sub_categoryHelp" placeholder="Veuillez entrer votre sous catégorie svp?">
            <div class="error">
                <p id="error1" class="d-none"></p><br>
                <?= $error['sub_category'] ?? '' ?>
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
    </div>
</form>