<h1>Ajout d'une catégorie</h1>

<form method="post" enctype="multipart/form-data" action="">
    <div class="row justify-content-center py-5">
        <div class="col col-md-6 mb-3">
            <label for="category" class="form-label"><strong>Catégories <strong class="danger">*</strong></strong></label>
            <input type="text" class="form-control" id="category" name="category" accept=".jpeg, .pdf, .gif, .png" value="<?= $category ?? '' ?>" maxlength='30' aria-describedby="categoryHelp" placeholder="Veuillez insérer la catégorie svp?" required>
            <div class="error">
                <p id="error1" class="d-none"></p><br>
                <?= $error['category'] ?? '' ?>
            </div>
            <div class="success">
                <?= $msg['success'] ?? '' ?>
            </div>
        </div><br>

        <div class="col-md-6 mb-3">
            <label for="picture" class="form-label"><strong>Photo</strong></label>
            <input type="file" class="form-control" id="picture" name="picture" accept=".jpeg, .pdf, .gif, .png" value="<?= $picture ?? '' ?>" maxlength='30' aria-describedby="pictureHelp" placeholder="Veuillez insérer la photo svp?">
            <div class="error">
                <p id="error2" class="d-none"></p><br>
                <?= $error['picture'] ?? '' ?>
            </div>
            <div class="success">
                <?= $msg['success'] ?? '' ?>
            </div>
        </div><br>


        <div class="insert">
            <input class="button" type="submit" name="insert" value="Ajouter une catégorie">
        </div>
        <div class="cancel">
            <a href="/controllers/dashboard/users/list-ctrl.php"><input class="button" type="submit" name="cancel" value="Annuler"></a>
        </div>
    </div>
</form>