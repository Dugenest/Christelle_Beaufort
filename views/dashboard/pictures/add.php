<h1>Ajout d'une photo</h1>

<form method="post" enctype="multipart/form-data" action="">
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-6 mb-3">
            <label for="picture" class="form-label"><strong>Photo</strong></label>
            <input type="file" class="form-control" id="picture" name="picture" accept=".jpeg, .pdf, .gif, .png" value="<?= $pictures->picture ?? '' ?>" maxlength='30' aria-describedby="pictureHelp" placeholder="Veuillez insérer la photo svp?">
        </div>
        <div class="error">
            <p id="error1" class="d-none"></p><br>
            <?= $error['picture'] ?? '' ?>
        </div>
        <div class="success">
            <?= $msg['success'] ?? '' ?>
        </div><br>

        <div class="col-sm-12 col-md-6 mb-3">
            <label for="id_category" class="form-label"><strong>Catégories</strong></label>
            <select name="id_category" id="id_category">
                <?php foreach ($categories as $category) { ?>
                    <option value="<?= $category->id_category ?>"><?= $category->category ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="error">
            <p id="error1" class="d-none"></p><br>
            <?= $error['picture'] ?? '' ?>
        </div>
        <div class="success">
            <?= $msg['success'] ?? '' ?>
        </div><br>

        <div class="insert">
            <input class="button" type="submit" name="insert" value="Ajouter une photo">
        </div>
        <div class="cancel">
            <a href="/controllers/dashboard/pictures/list-ctrl.php"><input class="button" type="submit" name="cancel" value="Annuler"></a>
        </div>
    </div>
</form>