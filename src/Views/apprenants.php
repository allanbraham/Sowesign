<tbody>
<?php foreach ($apprenants as $index => $apprenant): ?>
  <tr>
    <th scope="row"><?php echo $index + 1; ?></th>
    <td><?php echo htmlspecialchars($apprenant->nom); ?></td>
    <td><?php echo htmlspecialchars($apprenant->prenom); ?></td>
    <td><?php echo htmlspecialchars($apprenant->email); ?></td>
    <td>
      <!-- Boutons d'action pour chaque apprenant -->
      <a href="edit.php?id=<?php echo $apprenant->id; ?>" class="btn btn-sm btn-warning">Éditer</a>
      <a href="delete.php?id=<?php echo $apprenant->id; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet apprenant ?');">Supprimer</a>
    </td>
  </tr>
<?php endforeach; ?>
</tbody>


<div class="container mt-5">
  <h2>Liste des Apprenants</h2>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nom</th>
        <th scope="col">Prénom</th>
        <th scope="col">Email</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      <!-- Les données des apprenants seront insérées ici via PHP -->
    </tbody>
  </table>
</div>
<!-- Formulaire pour ajouter un nouvel apprenant -->
<div class="container mt-5">
  <h2>Ajouter un Apprenant</h2>
  <form id="formApprenant" action="URL_DU_TRAITEMENT_BACKEND" method="post">
    <div class="form-group">
      <label for="nom">Nom</label>
      <input type="text" class="form-control" id="nom" name="nom" required>
    </div>
    <div class="form-group">
      <label for="prenom">Prénom</label>
      <input type="text" class="form-control" id="prenom" name="prenom" required>
    </div>
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <button type="submit" class="btn btn-primary">Soumettre</button>
  </form>
</div>
