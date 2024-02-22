<h1>Liste des utilisateurs</h1>

<?php if (empty($result)) : ?>
    <p>Aucun utilisateur n'a été trouvé.</p>
    <div class="insert">
        <a href="/controllers/dashboard/users/add-ctrl.php"><input class="button" type="submit" name="insert" value="Ajouter un utilisateur"></a>
    </div>
<?php else : ?>
    <!-- Affichage de la liste  -->
    <table class="table table-bordered table-responsive">
        <thead>
            <tr>
                <th scope="col">Identifiant</th>
                <th scope="col">Nom</th>
                <th scope="col">Prénom</th>
                <th scope="col">Email</th>
                <th scope="col">Adresse</th>
                <th scope="col">Téléphone</th>
                <th scope="col">Rôle</th>
                <th scope="col">Modifier</th>
                <th scope="col">Supprimer</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($result as $user) : ?>
                <tr>
                    <td><?= htmlspecialchars($user->username) ?></td>
                    <td><?= htmlspecialchars($user->lastname) ?></td>
                    <td><?= htmlspecialchars($user->firstname) ?></td>
                    <td><?= htmlspecialchars($user->email) ?></td>
                    <td><?= htmlspecialchars($user->adress) ?></td>
                    <td><?= htmlspecialchars($user->phone) ?></td>
                    <td><?php if (htmlspecialchars($user->role) == 1) { ?>
                            Administrateur
                        <?php } elseif (htmlspecialchars($user->role) == 2) { ?>
                            Utilisateur
                        <?php } else { ?>
                            Pas inscrit
                        <?php } ?>
                    </td>
                    <td><a href="/controllers/dashboard/users/update-ctrl.php?id=<?= $user->id_user ?>"><img src="/public/assets/img/téléchargement (3).png"></a></td>
                    <td><a href="/controllers/dashboard/users/delete-ctrl.php?id=<?= $user->id_user ?>"><img src="/public/assets/img/téléchargement (4).png"></a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="insert">
        <a href="/controllers/dashboard/users/add-ctrl.php"><input class="button" type="submit" name="insert" value="Ajouter un utilisateur"></a>
    </div>
    <div class="error">
        <?= $error['name'] ?? '' ?><br>
    </div><br>
    <div class="success">
        <?= $msg['success'] ?? '' ?><br>
    </div>
<?php endif; ?>