

    <h1>Liste des commentaires</h1>
    
    <?php if (empty($result)): ?>
        <p>Aucun commentaire n'a été trouvé.</p>
    <?php else: ?>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Identifiant</th>
                    <th scope="col">Commentaire</th>
                    <th scope="col">Prestation</th>
                    <th scope="col">Date de création</th>
                    <th scope="col">Valider</th>
                    <th scope="col">Supprimer</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($result as $value): 
                var_dump($value);
                die;?>
                <tr>
                    <td><?= $value->username ?? '' ?></td>
                    <td><?= $value->message ?></td>
                    <td><?= $value->performance ?></td>
                    <td><?= $value->created_at ?></td>
                    <td><a href="/controllers/dashboard/comments/validate-ctrl.php?id=<?= $value->id_comment ?>"><img src="/public/assets/img/Microsoft OneNote.jpeg"></a></td>
                    <td><a href="/controllers/dashboard/comments/delete-ctrl.php?id=<?= $value->id_comment ?>"><img src="/public/assets/img/téléchargement (4).png"></a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        </table>
        <div class="error">
            <?= $error['comment'] ?? ''?><br>
        </div><br>
        <div class="success">
            <?= $msg['success'] ?? '' ?><br>
        </div>
    <?php endif; ?>
