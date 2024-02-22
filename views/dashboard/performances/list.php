<h1>Liste des tarifs</h1>

<?php if (empty($result)) : ?>
    <p>Aucun tarif n'a été trouvé.</p>
    <div class="insert">
        <a href="/controllers/dashboard/performances/add-ctrl.php"><input class="button" type="submit" name="insert" value="Ajouter un tarif"></a>
    </div>
<?php else : ?>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">Nom de la prestation</th>
                <th scope="col">Titre</th>
                <th scope="col">Description</th>
                <th scope="col">Tarif en €</th>
                <th scope="col">Modifier</th>
                <th scope="col">Supprimer</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($result as $performance) : ?>
                <tr>
                    <td><?= htmlspecialchars($performance->category) ?></td>
                    <td><?= htmlspecialchars($performance->titlePerformance) ?></td>
                    <td><?= htmlspecialchars($performance->description) ?></td>
                    <td><?= htmlspecialchars($performance->price) ?></td>
                    <td><a href="/controllers/dashboard/performances/update-ctrl.php?id=<?= $performance->id_performance ?>"><img src="/public/assets/img/téléchargement (3).png"></a></td>
                    <td><a href="/controllers/dashboard/performances/delete-ctrl.php?id=<?= $performance->id_performance ?>"><img src="/public/assets/img/téléchargement (4).png"></a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="insert">
        <a href="/controllers/dashboard/performances/add-ctrl.php"><input class="button" type="submit" name="insert" value="Ajouter un tarif"></a>
    </div>
    <div class="error">
        <?= $error['name'] ?? '' ?><br>
    </div><br>
    <div class="success">
        <?= $msg['success'] ?? '' ?><br>
    </div>
<?php endif; ?>