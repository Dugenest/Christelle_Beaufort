<h1>Modification d'une catégorie</h1>

<form method="post" action="">
    <div class="row justify-content-center py-5">
        <div class="col col-md-6 mb-3">
            <label for="category" class="form-label"><strong>Catégories <strong class="danger">*</strong></strong></label>
            <select class="form-control" id="category" name="category" aria-describedby="categoryHelp" required>
                <option value="Gallerie" <?= ($idCategories->category ?? '') === 'Gallerie' ? 'selected' : '' ?>>Gallerie</option>
                <option value="Portfolio" <?= ($idCategories->category ?? '') === 'Portfolio' ? 'selected' : '' ?>>Portfolio</option>
            </select>
            <div class="error"></div>
            <p id="error1" class="d-none"></p><br>
            <?= $error['category'] ?? '' ?>
        </div>
        <div class="success">
            <?= $msg['success'] ?? '' ?>
        </div><br>

        <div class="col col-md-6 mb-3">
            <label for="sub_category" class="form-label"><strong>Sous catégories <strong class="danger">*</strong></strong></label>
            <input type="text" class="form-control" id="sub_category" name="sub_category" value="<?= $idCategories->sub_category ?? '' ?>" maxlength='30' aria-describedby="sub_categoryHelp" placeholder="Veuillez entrer votre sous catégorie svp?">
            <div class="error">
                <p id="error1" class="d-none"></p><br>
                <?= $error['sub_category'] ?? '' ?>
            </div>
            <div class="success">
                <?= $msg['success'] ?? '' ?>
            </div><br>

            <div class="insert">
                <input class="button" type="submit" name="insert" value="Modifier une catégorie">
            </div>
            <div class="cancel">
                <a href="/controllers/dashboard/categories/list-ctrl.php"><input class="button" type="submit" name="cancel" value="Annuler"></a>
            </div>
        </div>
    </div>
</form>
