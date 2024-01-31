
<h1>Modification d'un utilisateur</h1>

    <form method="post" action="">
        <div class="mb-3">
            <label for="username" class="form-label"><strong>Identifiant</strong></label>
            <input type="text" class="form-control" id="username" name="username" value="<?=$user->username??''?>" maxlength='30' aria-describedby="userNameHelp" placeholder="Veuillez entrer votre identifiant svp?">
            <div class="error">
                <p id="error1" class="d-none"></p><br>
                <?= $error['username'] ?? ''?>
            </div>
            <div class="success">
                <?= $msg['success'] ?? '' ?>
            </div><br>

            <label for="lastname" class="form-label"><strong>Nom</strong></label>
            <input type="text" class="form-control" id="lastname" rows="3" name="lastname" value="<?=$user->lastname??''?>" maxlength='30' aria-describedby="lastNameHelp" placeholder="Veuillez entrer votre nom svp?">
            <div class="error">
                <p id="error2" class="d-none"></p><br>
                <?= $error['lastname'] ?? ''?>
            </div>
            <div class="success">
                <?= $msg['success'] ?? '' ?>
            </div><br>

            <label for="firstname" class="form-label"><strong>Prénom</strong></label>
            <input type="text" class="form-control" id="firstname" name="firstname" value="<?=$user->firstname??''?>" maxlength='30' aria-describedby="firstNameHelp" placeholder="Veuillez entrer votre prénom svp?">
            <div class="error">
                <p id="error3" class="d-none"></p><br>
                <?= $error['firstname'] ?? ''?>
            </div>
            <div class="success">
                <?= $msg['success'] ?? '' ?>
            </div><br>

            <label for="email" class="form-label"><strong>Email</strong></label>
            <input type="text" class="form-control" id="email" name="email" value="<?=$user->email??''?>" maxlength='30' aria-describedby="emailHelp" placeholder="Veuillez entrer votre mail svp?">
            <div class="error">
                <p id="error4" class="d-none"></p><br>
                <?= $error['email'] ?? ''?>
            </div>
            <div class="success">
                <?= $msg['success'] ?? '' ?>
            </div><br>

            <label for="adress" class="form-label"><strong>Adresse</strong></label>
            <textarea class="form-control" id="adress" name="adress" value="<?=$user->adress??''?>" maxlength='50' aria-describedby="adressHelp" placeholder="Veuillez entrer votre adresse svp?"><?=$user->adress??''?></textarea>
            <div class="error">
                <p id="error5" class="d-none"></p><br>
                <?= $error['adress'] ?? ''?>
            </div>
            <div class="success">
                <?= $msg['success'] ?? '' ?>
            </div><br>

            <label for="phone" class="form-label"><strong>Téléphone</strong></label>
            <input type="text" class="form-control" id="phone" name="phone" value="<?=$user->phone??''?>" maxlength='30' aria-describedby="phoneHelp" placeholder="Veuillez entrer votre numéro de téléphone svp?">
            <div class="error">
                <p id="error6" class="d-none"></p><br>
                <?= $error['phone'] ?? ''?>
            </div>
            <div class="success">
                <?= $msg['success'] ?? '' ?>
            </div><br>

            <label for="role" class="form-label"><strong>Rôle</strong></label>
            <select class="form-select" id="role" name="role">
                <option value="Administrateur" <?= ($user->role == "Administrateur") ? "selected" : "" ?>>Administrateur</option>
                <option value="Utilisateur" <?= ($user->role == "Utilisateur") ? "selected" : "" ?>>Utilisateur</option>
            </select>
            <div class="error">
                <p id="error7" class="d-none"></p><br>
                <?= $error['role'] ?? ''?>
            </div>
            <div class="success">
                <?= $msg['success'] ?? '' ?>
            </div><br>

            <label for="password" class="form-label"><strong>Mot de passe</strong></label>
            <input type="password" class="form-control" id="password" name="password" value="<?=$user->password??''?>" maxlength='30' aria-describedby="passwordHelp" placeholder="Veuillez entrer votre mot de passe svp?">
            <div class="error">
                <p id="error8" class="d-none"></p><br>
                <?= $error['password'] ?? ''?>
            </div>
            <div class="success">
                <?= $msg['success'] ?? '' ?>
            </div><br>

            <div class="insert">
                <input class="button" type="submit" name="insert" value="Modifier un utilisateur">
            </div>
            <div class="cancel">
                <a href="/controllers/dashboard/users/list-ctrl.php"><input class="button" type="submit" name="cancel" value="Annuler"></a>
            </div>
        </div>
    </form> 
