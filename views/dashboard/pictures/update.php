<h1>Modification d'une photo</h1>

<form method="post" enctype="multipart/form-data" action="">
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-6 mb-3">
            <label for="picture" class="form-label"><strong>Photo</strong></label>
            <input type="file" class="form-control" id="picture" name="picture" accept="image/jpeg, .pdf, .gif, .png" value="<?= $pictures->picture ?>" maxlength='30' aria-describedby="pictureHelp" placeholder="Veuillez insérer la photo svp?"><br>
            <img id="pictureImg" src="/public/uploads/pictures/<?= $pictures->picture ?>">
        </div>
        <div class="error">
            <p id="error1" class="d-none alert alert-danger"></p><br>
            <?= $error['picture'] ?? '' ?>
        </div>
        <div class="success">
            <?= $msg['success'] ?? '' ?>
        </div><br>

        <div class="col-sm-12 col-md-6 mb-3">
            <label for="id_category" class="form-label"><strong>Catégories</strong></label>
            <select name="id_category" id="id_category">
                <?php foreach ($categories as $category) { ?>
                    <option value="<?= $category->id_category ?>" <?= ($category->id_category == $pictures->id_category) ? 'selected' : '' ?>>
                        <?= $category->category ?>
                    </option>
                <?php } ?>
            </select>
            <div class="error">
                <p id="error2" class="d-none alert alert-danger"></p><br>
                <?= $error['category'] ?? '' ?>
            </div>
            <div class="success">
                <?= $msg['success'] ?? '' ?>
            </div><br>
        </div>


        <div class="col-12 mb-3">
            <div class="insert">
                <input class="btn btn-primary" type="submit" name="insert" value="Modifier une photo">
            </div><br>
            <div class="cancel">
                <a href="/controllers/dashboard/pictures/list-ctrl.php"><input class="btn btn-secondary" type="submit" name="cancel" value="Annuler"></a>
            </div>
        </div>
    </div>
</form>