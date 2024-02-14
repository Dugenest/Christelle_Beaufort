<h1>Modification d'un tarif</h1>

<form method="post" action="">
    <div class="row">
        <div class="col-sm-12 col-md-6 mb-3">
            <label for="name" class="form-label"><strong>Nom de la prestation</strong></label>
            <input type="text" class="form-control" id="name" name="name" value="<?= $performance->name ?? '' ?>" maxlength='30' placeholder="Veuillez entrer votre nom de prestation svp?">
            <div class="error">
                <p id="error1" class="d-none alert alert-danger"></p><br>
                <?= $error['name'] ?? '' ?>
            </div>
            <div class="success">
                <?= $msg['success'] ?? '' ?>
            </div><br>
        </div>

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