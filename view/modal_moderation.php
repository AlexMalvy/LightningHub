<!-- Modal forget email  -->
<div class="modal fade" id="moderation" tabindex="-1" aria-labelledby="gestion de a moderation" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-0">
            <div class="modal-header bg-color-purple rounded-0">
                <h3 class="modal-title fs-5">Gestion de la modération</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
            </div>
            <form action="moderation.php" method="POST" class="d-flex flex-column">
                <input type="text" name="action" value="moderation" hidden>
                <input type="text" name="userId" value="<?php echo $user->getId()?>" hidden>
                <div class="modal-body">
                    <label for="ban-type">Type de Ban</label>
                    <select id="ban-type" name="BanType" class="mt-1 mb-2 w-100 input">
                        <?php foreach ($bans as $key => $value): ?>
                            <option value="<?php echo $value['idBanType']?>"><?php echo $value['nameBan']?></option>
                        <?php endforeach; ?>
                    </select>
                    <label for="duration">Durée - jours</label>
                    <input id="duration" class="mt-1 mb-2 w-100 input" type="number" name="duration"/>
                    <label for="description-ban">Description</label>
                    <textarea id="description-ban" class="mt-1 w-100 input" rows="8" name="description"></textarea>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn lh-buttons-purple-faded" data-bs-dismiss="modal" aria-label="Annuler">Annuler</a>
                    <button aria-label="Envoyer" aria-pressed="false" class="btn lh-buttons-purple me-2">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</div>