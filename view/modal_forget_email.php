<!-- Modal forget email  -->
<div class="modal fade" id="forgetMail" tabindex="-1" aria-labelledby="Réinitialiser votre mot de passe" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-0">
            <div class="modal-header bg-color-purple rounded-0">
                <h3 class="modal-title fs-5">Réinitialiser votre mot de passe</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
            </div>
            <form method="post" action="" class="d-flex flex-column">
                <div class="modal-body modal-background">
                    <label for="input-mail-forget">Saisir votre adresse email</label>
                    <input id="input-mail-forget" class="mt-1 w-100 input" type="email" name="mail"/>
                </div>
                <div class="modal-footer modal-background">
                    <a href="login.php" class="btn lh-buttons-purple-faded" data-bs-dismiss="modal" aria-label="Annuler">Annuler</a>
                    <button aria-label="Envoyer" aria-pressed="false" class="btn lh-buttons-purple me-2">Envoyer</button>
                </div>
            </form>
        </div>
    </div>
</div>