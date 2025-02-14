
<div class="content-grid">
           
           <div class="card">
       <div class="card-header">
           <h2 class="card-title">Détails du projet</h2>
       </div>

       
       <?php  
       
       
       foreach ($projets as $projet):
       
          ?>
       <div class="project-item">
           <div class="project-info">
               <div class="project-title">Titre du projet: <?=$projet->getTitre()?></div>
               <div class="project-description">Description du projet<?=$projet->getDescription()?></div>
               <div class="project-details">
                   <div class="project-budget">Budget : <?=$projet->getBudget()?></div>
                   <div class="project-dates">
                       <span class="date-debut">Début: <?=$projet->getDateDebut()?></span>
                       <span class="date-separator">•</span>
                       <span class="date-fin">Fin: <?=$projet->getDateFin()?></span>
                   </div>
               
                   <div class="project-category">Catégorie: <?=$projet->name?></div>

                   <div class="project-tags">
                   <?php if (!empty($projet->getTags())): ?>
                               <?php foreach ($projet->getTags() as $tag): ?>
                                   <span class="tag"> Tags : <?= $tag->getName() ?></span>
                               <?php endforeach; ?>
                           <?php else: ?>
                               <span class="tag">Aucun tag</span>
                           <?php endif; ?>
                   </div>

               </div>

           </div>
                   
                   <a href="/Projet/delete/<?=$projet->getId()?>"  type class="action-btn"><i class="fas fa-trash"></i></a> 
                   <a type="button" href="/cours/apply/<?=$projet->getId()?>" class=" badge badge-progress"> apply</a>
           <span class="badge badge-progress"><?=$projet->getStatus()?></span>
       </div>
       <a type="button" onclick="openModal('projetModal_<?=$projet->getId()?>')"   class="action-btn"><i class="fas fa-edit"></i></a>
       <?php endforeach;?>
   </div>





   <div id="projetModal_<?=$projet->getId()?>" class="modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Editer projet</h2>
                    <button class="close-modal" onclick="closeModal('projetModal_<?=$projet->getId()?>')">&times;</button>
                </div>
                <form  action="/Projet/update/<?=$projet->getId()?>" method="POST" >
                <input type="hidden" name="id" value="<?= $projet->getId()?>" />
                    <div class="form-group">
                        <label class="form-label">Titre du projet</label>
                        <input type="text"  name="titre" class="form-input" value="<?=$projet->getTitre()?>" placeholder="Entrez le nom du tag">
                    </div>
                 
                    <div class="form-group">
                        <label class="form-label">Description</label>
                        <textarea class="form-input" name="description" rows="3" value="<?=$projet->getDescription()?>" placeholder="Description du tag"></textarea>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Budget</label>
                        <input type="text"  name="budget" class="form-input" value="<?=$projet->getBudget()?>" placeholder="">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Date debut </label>
                        <input type="text"  name="date_debut" class="form-input" value="<?=$projet->getDateDebut()?>" placeholder="Entrez date debut ">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Date fin </label>
                        <input type="text"  name="date_fin" class="form-input"  value="<?=$projet->getDateFin()?>" placeholder="Entrez date fin ">
                    </div>

                    <div class="form-group">
                            <label class="form-label">Catégorie</label>
                            <select class="form-select" name="categorie_id">
                                <option value="">Sélectionnez une catégorie</option>
                                <?php foreach ($categories as $categorie) { ?>
                                    <option value=<?= $categorie->getId() ?>><?= $categorie->getName() ?></option>
                                <?php } ?>
                            </select>
                    </div>

                    <div class="form-group">
                      <label class="form-label">Tags</label>
                      <select class="form-select" name="tags[]" multiple>
                       <option value="">Sélectionnez une catégorie</option>
                      <?php
                         foreach ($tags as $tag) { ?>
                        <option value=<?= $tag->getId() ?>><?= $tag->getName() ?></option>
                        <?php } ?>
                     </select>
                   </div>

                    <button type="submit" name="submit" class="form-submit">editer le projet</button>
                </form>
            </div>
        </div>


   
<div class="action-buttons">
<button class="add-button" onclick="openModal('projetModal')">
                <i class="fas fa-tags"></i>
                Ajouter un projet
 </button>
</div>

 <div id="projetModal" class="modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Ajouter un nouveau projet</h2>
                    <button class="close-modal" onclick="closeModal('projetModal')">&times;</button>
                </div>
                <form  action="/Projet/add" method="POST" >
                    <div class="form-group">
                        <label class="form-label">Titre du projet</label>
                        <input type="text"  name="titre" class="form-input" placeholder="Entrez le nom du tag">
                    </div>
                 
                    <div class="form-group">
                        <label class="form-label">Description</label>
                        <textarea class="form-input" name="description" rows="3" placeholder="Description du tag"></textarea>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Budget</label>
                        <input type="text"  name="budget" class="form-input" placeholder="">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Date debut </label>
                        <input type="text"  name="date_debut" class="form-input" placeholder="Entrez date debut ">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Date fin </label>
                        <input type="text"  name="date_fin" class="form-input" placeholder="Entrez date fin ">
                    </div>

                    <div class="form-group">
                            <label class="form-label">Catégorie</label>
                            <select class="form-select" name="categorie">
                                <option value="">Sélectionnez une catégorie</option>
                                <?php foreach ($categories as $categorie) { ?>
                                    <option value=<?= $categorie->getId() ?>><?= $categorie->getName() ?></option>
                                <?php } ?>
                            </select>
                    </div>

                    <div class="form-group">
                      <label class="form-label">Tags</label>
                      <select class="form-select" name="tags[]" multiple>
                       <option value="">Sélectionnez une catégorie</option>
                      <?php
                         foreach ($tags as $tag) { ?>
                        <option value=<?= $tag->getId() ?>><?= $tag->getName() ?></option>
                        <?php } ?>
                     </select>
                   </div>

                    <button type="submit" name="submit" class="form-submit">Ajouter le projet</button>
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

       
        window.onclick = function(event) {
            if (event.target.className === 'modal') {
                event.target.style.display = 'none';
            }
        }
//         function openModal(modalId) {
//     document.getElementById(modalId).style.display = 'block';
// }

// function closeModal(modalId) {
//     document.getElementById(modalId).style.display = 'none';
// }


// window.onclick = function(event) {
//     if (event.target.classList.contains('modal')) {
//         event.target.style.display = 'none';
//     }
// }



    </script>
 