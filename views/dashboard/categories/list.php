<h1>Liste des utilisateurs</h1>

<?php if (empty($result)) : ?>
    <p>Aucune catégorie n'a été trouvée.</p>
    <div class="insert">
        <a href="/controllers/dashboard/categories/add-ctrl.php"><input class="button" type="submit" name="insert" value="Ajouter une catégorie"></a>
    </div>
<?php else : ?>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Catégories</th>
                <th scope="col">Supprimer</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($result as $category) : ?>
                <tr>
                    <td><?= htmlspecialchars($category->category) ?></td>
                    <td><a href="/controllers/dashboard/categories/delete-ctrl.php?id=<?= $category->id_category ?>"><img src="/public/assets/img/téléchargement (4).png"></a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="insert">
        <a href="/controllers/dashboard/categories/add-ctrl.php"><input class="button" type="submit" name="insert" value="Ajouter une catégorie"></a>
    </div>
    <div class="error">
        <?= $error['name'] ?? '' ?><br>
    </div><br>
    <div class="success">
        <?= $msg['success'] ?? '' ?><br>
    </div>
<?php endif; ?>