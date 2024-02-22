<h1>Ajout d'un tarif</h1>

<!-- Création du formulaire -->
<form method="post" action="">
    <div class="card m-5">
        <div class="row styleCard justify-content-center m-3 py-5">
            <div class="col-sm-12 col-md-6 mb-3">
                <label for="id_category" class="form-label"><strong>Nom la prestation <strong class="danger">*</strong></strong></label>
                <select name="id_category" id="id_category" class="form-select" required>
                    <?php foreach ($categories as $category) { ?>
                        <option value="<?= $category->id_category ?>"><?= $category->category ?></option>
                    <?php } ?>
                </select>
                <div class="error">
                    <p id="error4" class="d-none"></p><br>
                    <?= $error['category'] ?? '' ?>
                </div>
            </div>

            <div class="col-sm-12 col-md-6 mb-3">
                <label for="titlePerformance" class="form-label"><strong>Titre <strong class="danger">*</strong></strong></label>
                <input type="text" class="form-control" id="titlePerformance" name="titlePerformance" value="<?= $titlePerformance ?? '' ?>" maxlength='30' aria-describedby="titlePerformanceHelp" placeholder="Veuillez entrer le titre de la prestation svp?" required>
                <div class="error">
                    <p id="error2" class="d-none"></p><br>
                    <?= $error['titlePerformance'] ?? '' ?>
                </div>
                <div class="success">
                    <?= $msg['success'] ?? '' ?>
                </div><br>
            </div>

            <div class="col-sm-12 col-md-6 mb-3">
                <label for="description" class="form-label"><strong>Description <strong class="danger">*</strong></strong></label>
                <textarea type="text" class="form-control" id="description" name="description" value="<?= $description ?? '' ?>" maxlength='300' rows="5" aria-describedby="descriptionHelp" placeholder="Veuillez entrer votre description de la prestation svp?" required></textarea>
                <div class="error">
                    <p id="error3" class="d-none"></p><br>
                    <?= $error['description'] ?? '' ?>
                </div>
                <div class="success">
                    <?= $msg['success'] ?? '' ?>
                </div><br>
            </div>

            <div class="col-sm-12 col-md-6 mb-3">
                <label for="price" class="form-label"><strong>Tarif en € <strong class="danger">*</strong></strong></label>
                <input type="number" class="form-control" id="price" name="price" value="<?= $price ?? '' ?>" maxlength='30' aria-describedby="priceHelp" placeholder="Veuillez entrer votre tarif svp?" required>
                <div class="error">
                    <p id="error4" class="d-none"></p><br>
                    <?= $error['price'] ?? '' ?>
                </div>
                <div class="success">
                    <?= $msg['success'] ?? '' ?>
                </div><br>
            </div>

            <div class="insert">
                <input class="button" type="submit" name="insert" value="Ajouter un tarif">
            </div>
            <div class="cancel">
                <a href="/controllers/dashboard/performances/list-ctrl.php"><input class="button" type="submit" name="cancel" value="Annuler"></a>
            </div>
        </div>
    </div>
<!-- Fin du formulaire -->
</form>