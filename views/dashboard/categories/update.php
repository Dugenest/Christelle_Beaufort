<h1>Modification d'une catégorie</h1>

    <form method="post" action="">
        <!-- Ajouter un champ d'entrée caché pour l'ID de la catégorie -->
        <input type="hidden" name="id" value="<?= htmlspecialchars($category->id ?? '') ?>">

        <div class="mb-3">
            <label for="name" class="form-label"><strong>Modification</strong></label>
            <input type="text" class="form-control" id="name" name="name" value="<?= htmlspecialchars($category->name ?? '') ?>" maxlength='30' aria-describedby="nameHelp" placeholder="Veuillez entrer votre nouvelle catégorie svp?">
            <div class="error">
                <?= $error['name'] ?? '' ?><br>
                <?= $msg['success'] ?? '' ?><br>
            </div><br>
            <div class="insert">
                <input class="button" type="submit" name="update" value="Modifier la catégorie">
            </div>
            <div class="cancel">
                <a href="/controllers/dashboard/categories/list-ctrl.php"><input class="button" type="button" value="Annuler"></a>
            </div>
        </div>
    </form>
