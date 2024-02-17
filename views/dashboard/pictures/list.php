<h1>Liste des photos</h1>

<?php if (empty($result)) : ?>
    <p>Aucune photo n'a été trouvée.</p>
    <div class="insert">
        <a href="/controllers/dashboard/pictures/add-ctrl.php"><input class="button" type="submit" name="insert" value="Ajouter une photo"></a>
    </div>
<?php else : ?>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Catégorie</th>
                <th scope="col">Titre</th>
                <th scope="col">Photo</th>
                <th scope="col">Description</th>
                <th scope="col">Prix en €</th>
                <th scope="col">Modifier</th>
                <th scope="col">Supprimer</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($result as $picture) : ?>
                <tr>
                    <td class="tablePicture"><?= $picture->category ?></td>
                    <td class="tablePicture"><?= $picture->pictureTitle ?></td>
                    <td class="tablePicture"><?php if (isset($picture->picture)) { ?>
                        <img class="img" src="/public/uploads/pictures/picture/<?= $picture->picture ?>">
                        <?php } ?>
                    </td>
                    <td class="tablePicture"><?= $picture->description ?></td>
                    <td class="tablePicture"><?= $picture->price ?></td>
                    <td class="tablePicture"><a href="/controllers/dashboard/pictures/update-ctrl.php?id=<?= $picture->id_picture ?>"><img src="/public/assets/img/téléchargement (3).png"></a></td>
                    <td class="tablePicture"><a href="/controllers/dashboard/pictures/delete-ctrl.php?id=<?= $picture->id_picture ?>"><img src="/public/assets/img/téléchargement (4).png"></a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="insert">
        <a href="/controllers/dashboard/pictures/add-ctrl.php"><input class="button" type="submit" name="insert" value="Ajouter une photo"></a>
    </div>
    <div class="error">
        <?= $error['name'] ?? '' ?><br>
    </div><br>
    <div class="success">
        <?= $msg['success'] ?? '' ?><br>
    </div>
<?php endif; ?>