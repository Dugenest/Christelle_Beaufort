<!-- /views/dashboard/categories/list.php -->
<?php
$isExist = '';
$delete = '';
?>

    <h1>Liste des catégories</h1>
    
    <?php if (empty($result)): ?>
        <p>Aucune catégorie n'a été trouvée.</p>
    <?php else: ?>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Modifier</th>
                    <th scope="col">Supprimer</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($result as $key => $category): ?>
                <tr>
                    <td><?= htmlspecialchars($category->id_category) ?></td>
                    <td><?= htmlspecialchars($category->name) ?></td>
                    <td><a href="/controllers/dashboard/categories/update-ctrl.php?id=<?= $category->id_category ?>"><img src="/public/assets/img/téléchargement (3).png"></a></td>
                    <td><a href="/controllers/dashboard/categories/delete-ctrl.php?id=<?= $category->id_category ?>"><img src="/public/assets/img/téléchargement (4).png"></a></td>
                </tr>
                
            <?php endforeach; ?>
        </tbody>
        </table>
        <div class="insert">
            <a href="/controllers/dashboard/categories/add-ctrl.php"><input class="button" type="submit" name="insert" value="Ajouter une catégorie"></a>
        </div>
        <div class="error">
            <?= $error['name'] ?? ''?><br>
            <?= $msg['success'] ?? '' ?><br>
            </div><br>
    <?php endif; ?>
