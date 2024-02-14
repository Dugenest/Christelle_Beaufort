<h1>Ajout d'un utilisateur</h1>

<form method="post" action="">
    <div class="mb-3">
        <label for="name" class="form-label"><strong>Nom de la prestation <strong class="danger">*</strong></strong></label>
        <input type="text" class="form-control" id="name" name="name" value="<?= $name ?? '' ?>" maxlength='30' aria-describedby="NameHelp" placeholder="Veuillez entrer votre nom de prestation svp?" required>
        <div class="error">
            <p id="error1" class="d-none"></p><br>
            <?= $error['name'] ?? '' ?>
        </div>
        <div class="success">
            <?= $msg['success'] ?? '' ?>
        </div><br>

        <label for="description" class="form-label"><strong>Description <strong class="danger">*</strong></strong></label>
        <textarea type="text" class="form-control" id="description" name="description" value="<?= $description ?? '' ?>" maxlength='30' row="10" aria-describedby="descriptionHelp" placeholder="Veuillez entrer votre description de la prestation svp?" required></textarea>
        <div class="error">
            <p id="error2" class="d-none"></p><br>
            <?= $error['description'] ?? '' ?>
        </div>
        <div class="success">
            <?= $msg['success'] ?? '' ?>
        </div><br>

        <label for="price" class="form-label"><strong>Tarif en € <strong class="danger">*</strong></strong></label>
        <input type="number" class="form-control" id="price" name="price" value="<?= $price ?? '' ?>" maxlength='30' aria-describedby="priceHelp" placeholder="Veuillez entrer votre tarif svp?" required>
        <div class="error">
            <p id="error3" class="d-none"></p><br>
            <?= $error['price'] ?? '' ?>
        </div>
        <div class="success">
            <?= $msg['success'] ?? '' ?>
        </div><br>

        <div class="insert">
            <input class="button" type="submit" name="insert" value="Ajouter un tarif">
        </div>
        <div class="cancel">
            <a href="/controllers/dashboard/performances/list-ctrl.php"><input class="button" type="submit" name="cancel" value="Annuler"></a>
        </div>
    </div>
</form>