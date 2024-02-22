<h1 class="text-center">Ajout d'une photo</h1>

<!-- Création du formulaire -->
<form method="post" enctype="multipart/form-data" action="">
    <div class="card m-5">
        <div class="row styleCard justify-content-center m-3 py-5">
            <div class="col-sm-12 col-md-6 mb-3">
                <label for="picture" class="form-label"><strong>Photo</strong></label>
                <input type="file" class="form-control" id="picture" name="picture" accept=".jpeg, .pdf, .gif, .png" value="<?= $pictures->picture ?? '' ?>" maxlength='30' aria-describedby="pictureHelp" placeholder="Veuillez insérer la photo svp?">
                <div class="error">
                    <p id="error1" class="d-none"></p><br>
                    <?= $error['picture'] ?? '' ?>
                </div>
            </div>

            <div class="col-sm-12 col-md-6 mb-3">
                <label for="pictureTitle" class="form-label"><strong>Titre</strong></label>
                <input type="text" class="form-control" id="pictureTitle" aria-describedby="pictureTitle" name="pictureTitle" value="<?= $pictureTitle ?? '' ?>" maxlength='30' autocomplete="pictureTitle" placeholder="Votre titre svp?" required>
                <div class="error">
                    <p id="error2" class="d-none"></p><br>
                    <?= $error['pictureTitle'] ?? '' ?><br>
                </div>
            </div>

            <div class="col-sm-12 col-md-6 mb-3">
                <label for="description" class="form-label"><strong>Description</strong></label>
                <textarea class="form-control" rows="5" id="description" aria-describedby="description" name="description" maxlength="300" autocomplete="description" placeholder="Votre description"><?= $description ?? '' ?></textarea>
                <div class="error">
                    <p id="error3" class="d-none"></p><br>
                    <?= $error['description'] ?? '' ?><br>
                </div>
            </div>

            <div class="col-sm-12 col-md-6 mb-3">
                <label for="id_category" class="form-label"><strong>Catégories</strong></label>
                <select name="id_category" id="id_category" class="form-select">
                    <?php foreach ($categories as $category) { ?>
                        <option value="<?= $category->id_category ?>"><?= $category->category ?></option>
                    <?php } ?>
                </select>
                <div class="error">
                    <p id="error4" class="d-none"></p><br>
                    <?= $error['id_category'] ?? '' ?>
                </div>
            </div>

            <div class="col-sm-12 col-md-6 mb-3">
                <label for="price" class="form-label"><strong>Prix</strong></label>
                <input type="number" class="form-control" id="price" aria-describedby="price" name="price" value="<?= $price ?? '' ?>" maxlength='30' autocomplete="price" placeholder="Votre prix en €">
                <div class="error">
                    <p id="error5" class="d-none"></p><br>
                    <?= $error['price'] ?? '' ?><br>
                </div>
            </div>

            <div class="col-12 text-center">
                <div class="insert mb-3">
                    <input class="btn btn-primary" type="submit" name="insert" value="Ajouter une photo">
                </div>
                <div class="cancel">
                    <a href="/controllers/dashboard/pictures/list-ctrl.php"><input class="btn btn-secondary" type="submit" name="cancel" value="Annuler"></a>
                </div>
            </div>
        </div>
    </div>
<!-- Fin du formulaire -->
</form>