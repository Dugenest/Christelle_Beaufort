<h1>Liste des catégories</h1>

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
                <th scope="col">Photos</th>
                <th scope="col">Modifier</th>
                <th scope="col">Supprimer</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($result as $category) : ?>
                <tr>
                    <td class="tablePerformance"><?= htmlspecialchars($category->category) ?></td>
                    <td>
                        <?php if (isset($category->picture)) { ?>
                            <img class="img tablePerformance" src="/public/uploads/pictures/categories/<?= $category->picture ?>">
                        <?php } ?>
                    </td>
                    <td  class="tablePerformance"><a href="/controllers/dashboard/categories/update-ctrl.php?id=<?= $category->id_category ?>"><img src="/public/assets/img/téléchargement (3).png"></a></td>
                    <td  class="tablePerformance"><a href="/controllers/dashboard/categories/delete-ctrl.php?id=<?= $category->id_category ?>"><img src="/public/assets/img/téléchargement (4).png"></a></td>
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