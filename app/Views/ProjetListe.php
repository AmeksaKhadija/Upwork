

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
           <span class="badge badge-progress"><?=$projet->getStatus()?></span>
       </div>
       <?php endforeach;?>
   </div>