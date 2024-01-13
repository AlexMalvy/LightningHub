<!-- Modal delete Account -->
<div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-labelledby="Confirmation supprimer votre compte" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-0">
            <div class="modal-header bg-color-purple rounded-0">
                <h3 class="modal-title fs-5">Confirmation suppression compte</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
            </div>
            <div class="modal-body modal-background">
                Êtes vous sur de vouloir supprimer votre compte ?
            </div>
            <div class="modal-footer modal-background">
                <form action="../handlers/User-handler.php" method="POST" class="d-flex justify-content-end p-0">
                    <input type="text" name="action" value="deleteaccount" hidden>
                    <a href="account.php" class="btn lh-buttons-purple-faded" data-bs-dismiss="modal" aria-label="Annuler">Annuler</a>
                    <button href="#"  class="btn lh-buttons-red" aria-label="Confirmer">Confirmation</button>
                </form>
            </div>
        </div>
    </div>
</div>