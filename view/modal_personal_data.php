<!-- Modal forget email  -->
<div class="modal fade" id="personaldata" tabindex="-1" aria-labelledby="Faire une demande pour vos données personnelles" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-0">
            <div class="modal-header bg-color-purple rounded-0">
                <h3 class="modal-title fs-5">Récupérer vos données personnelles</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
            </div>
            <form action="handlers/User-handler.php" method="POST" class="d-flex flex-column">
                <input type="text" name="action" value="sendmail" hidden>
                <div class="modal-body">
                    <label for="input-personal-data">Email</label>
                    <input id="input-personal-data" class="mt-1 mb-2 w-100 input" type="email" name="mail"/>
                    <label for="input-personal-data">Message</label>
                    <textarea id="input-personal-data" class="mt-1 w-100 input" rows="8" name="message"></textarea>
                </div>
                <div class="modal-footer">
                    <a href="account.php" class="btn lh-buttons-purple-faded" data-bs-dismiss="modal" aria-label="Annuler">Annuler</a>
                    <button aria-label="Envoyer" aria-pressed="false" class="btn lh-buttons-purple me-2">Envoyer</button>
                </div>
            </form>
        </div>
    </div>
</div>