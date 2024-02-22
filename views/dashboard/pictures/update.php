<h1 class="text-center">Modification d'une photo</h1>

<form method="post" enctype="multipart/form-data" action="">
    <div class="card m-5">
        <div class="row styleCard justify-content-center m-3 py-5">
            <div class="col-sm-12 col-md-6 mb-3">
                <label for="picture" class="form-label"><strong>Photo</strong></label>
                <input type="file" class="form-control" id="picture" name="picture" accept="image/jpeg, .pdf, .gif, .png" value="<?= $pictures->picture ?>" maxlength='30' aria-describedby="pictureHelp" placeholder="Veuillez insérer la photo svp?"><br>
                <img id="pictureImg" src="/public/uploads/pictures/picture/<?= $pictures->picture ?>" class="img-fluid objectif-fit" alt="Preview">
                <div class="error">
                    <p id="error1" class="d-none alert alert-danger"></p><br>
                    <?= $error['picture'] ?? '' ?>
                </div>
            </div>

            <div class="col-sm-12 col-md-6 mb-3">
                <label for="pictureTitle" class="form-label"><strong>Titre</strong></label>
                <input type="text" class="form-control" id="pictureTitle" aria-describedby="pictureTitle" name="pictureTitle" value="<?= $pictures->pictureTitle ?? '' ?>" maxlength='30' autocomplete="pictureTitle" placeholder="Votre titre svp?">
                <div class="error">
                    <p id="error2" class="d-none alert alert-danger"></p><br>
                    <?= $error['pictureTitle'] ?? '' ?><br>
                </div>
                <div class="success">
                    <?= $msg['success'] ?? '' ?>
                </div><br>
            </div>

            <div class="col-sm-12 col-md-6 mb-3">
                <label for="description" class="form-label"><strong>Description</strong></label>
                <textarea class="form-control" rows="5" id="description" name="description" maxlength='30' placeholder="<?= $picture->description ?? '' ?>"><?= $picture->description ?? '' ?></textarea>
                <div class="error">
                    <p id="error3" class="d-none alert alert-danger"></p><br>
                    <?= $error['description'] ?? '' ?><br>
                </div>
                <div class="success">
                    <?= $msg['success'] ?? '' ?>
                </div><br>
            </div>

            <div class="col-sm-12 col-md-6 mb-3">
                <label for="id_category" class="form-label"><strong>Catégories</strong></label>
                <select name="id_category" id="id_category" class="form-select">
                    <?php foreach ($categories as $category) { ?>
                        <option value="<?= $category->id_category ?>" <?= ($category->id_category == $pictures->id_category) ? 'selected' : '' ?>>
                            <?= $category->category ?>
                        </option>
                    <?php } ?>
                </select>
                <div class="error">
                    <p id="error4" class="d-none alert alert-danger"></p><br>
                    <?= $error['category'] ?? '' ?>
                </div>
                <div class="success">
                    <?= $msg['success'] ?? '' ?>
                </div><br>
            </div>

            <div class="col-sm-12 col-md-6 mb-3">
                <label for="price" class="form-label"><strong>Prix</strong></label>
                <input type="number" class="form-control" id="price" aria-describedby="price" name="price" value="<?= $pictures->price ?? '' ?>" maxlength='30' autocomplete="price" placeholder="Votre prix en €">
                <div class="error">
                    <p id="error5" class="d-none alert alert-danger"></p><br>
                    <?= $error['price'] ?? '' ?><br>
                </div>
                <div class="success">
                    <?= $msg['success'] ?? '' ?>
                </div><br>
            </div>

            <div class="col-12 mb-3 text-center">
                <div class="insert">
                    <input class="btn btn-primary" type="submit" name="insert" value="Modifier une photo">
                </div><br>
                <div class="cancel">
                    <a href="/controllers/dashboard/pictures/list-ctrl.php" class="btn btn-secondary">Annuler</a>
                </div>
            </div>
        </div>
    </div>
</form>