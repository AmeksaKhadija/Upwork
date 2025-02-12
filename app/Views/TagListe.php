




<div class="table-container">
    <div class="table-header">
        <h2 class="table-title">les tags disponibles</h2>
    </div>
    <table>
        <thead>
            <tr>
                <th>Nom de tag</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tags as $tagModel): ?>
                <tr>
                    <td><?= $tagModel->getName() ?></td>
                    <td><?= $tagModel->getDescription() ?></td>
                    <td>
                       
                        <a  type="button" onclick="openModal('tagModal_<?= $tagModel->getId() ?>')" class="action-btn">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="/Tags/delete/<?= $tagModel->getId() ?>" type="button" class="action-btn">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>

              
                <div id="tagModal_<?= $tagModel->getId() ?>" class="modal">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="modal-title">Editer tag</h2>
                            <button type="button" class="close-modal" onclick="closeModal('tagModal_<?= $tagModel->getId() ?>')">&times;</button>
                        </div>
                        <form action="/Tags/update/<?= $tagModel->getId() ?>" method="POST">
                           <input type="hidden" name="id" value="<?= $tagModel->getId()?>" />
                            <div class="form-group">
                                <label class="form-label">Nom du tag</label>
                                <input type="text" name="name" class="form-input" value="<?= $tagModel->getName() ?>" placeholder="Entrez le nom du tag">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Logo du tag</label>
                                <input type="text" name="logo" class="form-input" value="<?= $tagModel->getLogo() ?>" placeholder="Entrez le logo du tag">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Description</label>
                                <textarea class="form-input" name="description" rows="3" placeholder="Description du tag"><?= $tagModel->getDescription() ?></textarea>
                            </div>
                            <button type="submit" name="submit" class="form-submit">Mettre à jour</button>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>





<div class="action-buttons">
<button class="add-button" onclick="openModal('tagModal')">
                <i class="fas fa-tags"></i>
                Ajouter un tag
 </button>
</div>

 <div id="tagModal" class="modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Ajouter un nouveau tag</h2>
                    <button class="close-modal" onclick="closeModal('tagModal')">&times;</button>
                </div>
                <form  action="/Tags/add" method="POST" >
                    <div class="form-group">
                        <label class="form-label">Nom du tag</label>
                        <input type="text"  name="name" class="form-input" placeholder="Entrez le nom du tag">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Logo</label>
                        <input type="file"  name="logo" class="form-input" placeholder="Entrez logo">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Description</label>
                        <textarea class="form-input" name="description" rows="3" placeholder="Description du tag"></textarea>
                    </div>
                    <button type="submit" name="submit" class="form-submit">Ajouter le tag</button>
                </form>
            </div>
        </div>




 <script>
        function openModal(modalId) {
            document.getElementById(modalId).style.display = 'flex';
        }

        function closeModal(modalId) {
            document.getElementById(modalId).style.display = 'none';
        }

        // Fermer le modal si on clique en dehors
        window.onclick = function(event) {
            if (event.target.className === 'modal') {
                event.target.style.display = 'none';
            }
        }
        function openModal(modalId) {
    document.getElementById(modalId).style.display = 'block';
}

function closeModal(modalId) {
    document.getElementById(modalId).style.display = 'none';
}

// Fermer le modal si on clique en dehors
window.onclick = function(event) {
    if (event.target.classList.contains('modal')) {
        event.target.style.display = 'none';
    }
}

    </script>
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 