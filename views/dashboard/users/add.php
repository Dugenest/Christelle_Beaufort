<h1>Ajout d'un utilisateur</h1>

    <form method="post" action="">
        <div class="mb-3">
            <label for="username" class="form-label"><strong>Identifiant</strong></label>
            <input type="text" class="form-control" id="username" name="username" value="<?=$username??''?>" maxlength='30' aria-describedby="userNameHelp" placeholder="Veuillez entrer votre identifiant svp?">
            <div class="error">
                <?= $error['username'] ?? ''?>
                <?= $msg['success'] ?? '' ?>
            </div><br>

            <label for="lastname" class="form-label"><strong>Nom</strong></label>
            <input type="text" class="form-control" id="lastname" name="lastname" value="<?=$lastname??''?>" maxlength='30' aria-describedby="lastNameHelp" placeholder="Veuillez entrer votre nom svp?">
            <div class="error">
                <?= $error['lastname'] ?? ''?>
                <?= $msg['success'] ?? '' ?>
            </div><br>

            <label for="firstname" class="form-label"><strong>Prénom</strong></label>
            <input type="text" class="form-control" id="firstname" name="firstname" value="<?=$firstname??''?>" maxlength='30' aria-describedby="firstNameHelp" placeholder="Veuillez entrer votre prénom svp?">
            <div class="error">
                <?= $error['firstname'] ?? ''?>
                <?= $msg['success'] ?? '' ?>
            </div><br>

            <label for="email" class="form-label"><strong>Email</strong></label>
            <input type="text" class="form-control" id="email" name="email" value="<?=$email??''?>" maxlength='30' aria-describedby="emailHelp" placeholder="Veuillez entrer votre mail svp?">
            <div class="error">
                <?= $error['email'] ?? ''?>
                <?= $msg['success'] ?? '' ?>
            </div><br>

            <label for="adress" class="form-label"><strong>Adresse</strong></label>
            <input type="area" class="form-control" id="adress" name="adress" value="<?=$adress??''?>" maxlength='50' aria-describedby="adressHelp" placeholder="Veuillez entrer votre prénom svp?">
            <div class="error">
                <?= $error['adress'] ?? ''?>
                <?= $msg['success'] ?? '' ?>
            </div><br>

            <label for="phone" class="form-label"><strong>Téléphone</strong></label>
            <input type="text" class="form-control" id="phone" name="phone" value="<?=$phone??''?>" maxlength='30' aria-describedby="phoneHelp" placeholder="Veuillez entrer votre numéro de téléphone svp?">
            <div class="error">
                <?= $error['phone'] ?? ''?>
                <?= $msg['success'] ?? '' ?>
            </div><br>

            <label for="role" class="form-label"><strong>Rôle</strong></label>
            <select class="form-select"  id="role" name="role" value="<?=$role??''?>">
                <option selected>Selection du rôle</option>
                <option value="1">Administrateur</option>
                <option value="2">Utilisateur</option>
            </select>
            <div class="error">
                <?= $error['role'] ?? ''?>
                <?= $msg['success'] ?? '' ?>
            </div><br>

            <label for="password" class="form-label"><strong>Mot de passe</strong></label>
            <input type="text" class="form-control" id="password" name="password" value="<?=$password??''?>" maxlength='30' aria-describedby="passwordHelp" placeholder="Veuillez entrer votre mot de passe svp?">
            <div class="error">
                <?= $error['password'] ?? ''?>
                <?= $msg['success'] ?? '' ?>
            </div><br>

            <div class="insert">
                <input class="button" type="submit" name="insert" value="Ajouter un utilisateur">
            </div>
            <div class="cancel">
                <a href="/controllers/dashboard/users/list-ctrl.php"><input class="button" type="submit" name="cancel" value="Annuler"></a>
            </div>
        </div>
    </form> 