<h1>Modification d'une catégorie</h1>

<form method="post" enctype="multipart/form-data" action="">
    <div class="row justify-content-center py-5">
        <div class="col-md-6 mb-3">
            <label for="category" class="form-label"><strong>Catégories</strong></label>
            <select name="category" id="category" class="form-select">
                    <option value="<?= $categories->id_category ?>" <?= $categories->category ? 'selected' : '' ?>>
                    <?= $categories->category ?>
                    </option>
            </select>
            <div class="error">
                <p id="error4" class="d-none alert alert-danger"></p><br>
                <?= $error['category'] ?? '' ?>
            </div>
            <div class="success">
                <?= $msg['success'] ?? '' ?>
            </div>
        </div><br>

        <div class="col-md-6 mb-3">
            <label for="picture" class="form-label"><strong>Photo</strong></label>
            <input type="file" class="form-control" id="picture" name="picture" accept=".jpeg, .pdf, .gif, .png" value="<?= $categories->picture ?? '' ?>" maxlength='30' aria-describedby="pictureHelp" placeholder="Veuillez insérer la photo svp?">
            <img id="pictureImg" src="/public/uploads/pictures/categories/<?= $categories->picture ?>" class="img-fluid" alt="Preview">
            <div class="error">
                <p id="error3" class="d-none"></p><br>
                <?= $error['picture'] ?? '' ?>
            </div>
            <div class="success">
                <?= $msg['success'] ?? '' ?>
            </div>
        </div><br>

        <div class="insert">
            <input class="button" type="submit" name="insert" value="Modifier une catégorie">
        </div>
        <div class="cancel">
            <a href="/controllers/dashboard/categories/list-ctrl.php"><input class="button" type="submit" name="cancel" value="Annuler"></a>
        </div>
    </div>
</form>