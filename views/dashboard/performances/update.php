<h1>Modification d'un tarif</h1>

<form method="post" action="">
    <div class="row justify-content-center">
        <div class="col col-md-6 mb-3">
            <label for="id_category" class="form-label"><strong>Nom de la prestation</strong></label>
            <select name="id_category" id="id_category" class="form-select">
                <?php foreach ($categories as $category) { ?>
                    <option value="<?= $category->id_category ?>"><?= $category->sub_category ?></option>
                <?php } ?>
            </select>
            <div class="error">
                <p id="error4" class="d-none"></p><br>
                <?= $error['category'] ?? '' ?>
            </div>

            <label for="titlePerformance" class="form-label"><strong>Titre <strong class="danger">*</strong></strong></label>
            <input type="text" class="form-control" id="titlePerformance" name="titlePerformance" value="<?= $performance->titlePerformance ?? '' ?>" maxlength='30' aria-describedby="titlePerformanceHelp" placeholder="Veuillez entrer le titre de la prestation svp?">
            <div class="error">
                <p id="error1" class="d-none"></p><br>
                <?= $error['titlePerformance'] ?? '' ?>
            </div>
            <div class="success">
                <?= $msg['success'] ?? '' ?>
            </div><br>

            <div class="col-sm-12 col-md-6 mb-3">
                <label for="description" class="form-label"><strong>Description</strong></label>
                <input type="text" class="form-control" id="description" name="description" value="<?= $performance->description ?? '' ?>" maxlength='30' placeholder="Veuillez entrer votre description de la prestation svp?">
                <div class="error">
                    <p id="error2" class="d-none alert alert-danger"></p><br>
                    <?= $error['description'] ?? '' ?>
                </div>
                <div class="success">
                    <?= $msg['success'] ?? '' ?>
                </div><br>
            </div>

            <div class="col-sm-12 col-md-6 mb-3">
                <label for="price" class="form-label"><strong>Tarif</strong></label>
                <input type="number" class="form-control" id="price" name="price" value="<?= $performance->price ?? '' ?>" maxlength='30' placeholder="Veuillez entrer votre prénom svp?">
                <div class="error">
                    <p id="error3" class="d-none alert alert-danger"></p><br>
                    <?= $error['price'] ?? '' ?>
                </div>
                <div class="success">
                    <?= $msg['success'] ?? '' ?>
                </div><br>
            </div>

            <div class="col-12 mb-3">
                <div class="insert">
                    <input class="btn btn-primary" type="submit" name="insert" value="Modifier un tarif">
                </div><br>
                <div class="cancel">
                    <a href="/controllers/dashboard/performances/list-ctrl.php"><input class="btn btn-secondary" type="submit" name="cancel" value="Annuler"></a>
                </div>
            </div>
        </div>
</form>