




<div class="table-container">
    <div class="table-header">
        <h2 class="table-title">Les categories</h2>
    </div>
    <table>
        <thead>
            <tr>
                <th>Nom de catégorie</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categories as $categorieModel): 
                // var_dump($categories);
                // die;
                ?>

                <tr>
                    <td><?= $categorieModel->getName() ?></td>
                    <td><?= $categorieModel->getDescription() ?></td>
                    <td>
                        <a onclick="openModal('categorieModal_<?= $categorieModel->getId() ?>')"  type="button" class="action-btn">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="/Categorie/delete/<?= $categorieModel->getId() ?>" class="action-btn">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>

                <div id="categorieModal_<?= $categorieModel->getId() ?>" class="modal">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="modal-title">Éditer catégorie</h2>
                            <button type="button" class="close-modal" onclick="closeModal('categorieModal_<?= $categorieModel->getId() ?>')">&times;</button>
                        </div>
                        <form action="/Categorie/update/<?= $categorieModel->getId() ?>" method="POST">
                            <input type="hidden" name="id" value="<?= $categorieModel->getId() ?>" />
                            <div class="form-group">
                                <label class="form-label">Nom de catégorie</label>
                                <input type="text" name="name" class="form-input" value="<?= $categorieModel->getName() ?>" placeholder="Entrez le nom de la catégorie">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Description</label>
                                <textarea class="form-input" name="description" rows="2" placeholder="Description de la catégorie"><?= $categorieModel->getDescription() ?></textarea>
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
<button class="add-button" onclick="openModal('categoryModal')">
                <i class="fas fa-folder"></i>
                Ajouter une catégorie

</button>
</div>


<div id="categoryModal" class="modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Ajouter une nouvelle catégorie</h2>
                    <button class="close-modal" onclick="closeModal('categoryModal')">&times;</button>
                </div>
                <form action="/Categorie/add" method="POST">
                    <div class="form-group">
                        <label class="form-label">Nom de la catégorie</label>
                        <input type="text" class="form-input" name="name" placeholder="Entrez le nom de la catégorie">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Description</label>
                        <textarea class="form-input" rows="3"  name="description" placeholder="Description de la catégorie"></textarea>
                    </div>
                    
                    <button type="submit" name="submit" class="form-submit">Ajouter la catégorie</button>
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



