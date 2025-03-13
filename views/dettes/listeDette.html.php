<?php
     $limit = 5; // Nombre de commandes par page
      $page = isset($_GET['p']) ? (int)$_GET['p'] : 1; // Page actuelle (défaut : 1)
      $offset = ($page - 1) * $limit; // Déterminer l'offset

      if ($dettes) {
        // Compter le nombre total de dettes
      $totaldettes = count($dettes);
      $totalPages = ceil($totaldettes / $limit);

      // Extraire les dettes pour la page actuelle
      $dettesAffichees = array_slice($dettes, $offset, $limit);
      }
      

?>
    <!-- Card Utilisateur -->
    <div class=" mx-20 mt-10 bg-white shadow-lg rounded-lg overflow-hidden">
    <?php  if ($_GET["page"]=="commande") { ?>
      <!-- Header -->
          <div class="card-header p-6 flex justify-between">
        <div class="flex items-center">
          <!-- Photo Profil -->
          <div class="flex-shrink-0 mr-6">
            <img
              id="userPhoto"
              src="https://via.placeholder.com/100"
              alt="Photo de Profil"
              class="w-20 h-20 rounded-full border-4 border-white shadow-md"
            />
          </div>
          <!-- Informations Utilisateur -->
          <div>
            <h2 class="text-lg font-bold" id="userName"><?= $client["prenom"]?> <?= $client["nom"]?></h2>
            <p class="text-gray-200 text-sm" id="userEmail"> <?= $client["telephone"]?></p>
            <p class="text-gray-200 text-sm" id="userPhone">+123 456 7890</p>
            
          </div>
          
        </div>
        <div class="flex flex-col justify-center">
            <p class="text-gray-200 text-sm " id="userEmail"><span class="text-white font-bold">montant du : </span><?= $_montant_du?> Cfa</p>
            <p class="text-gray-200 text-sm mt-2" id="userEmail"><span class="text-white font-bold">montant Payé : </span><?= $_montant_paye?> Cfa</p>

        </div>
          </div>
      <?php }else { ?>
          <div class="p-6 bg-gray-50 flex justify-end gap-3 items-center">
          <form  method="GET" >
               <div class="flex flex-row">
               <input
                   type="text"
                   name = "tel"
                   class="w-full p-1 border border-gray-300 rounded focus:ring-2 focus:ring-blue-500 focus:outline-none"
               />
               <input type="hidden" name="controller" value="commande">
               <input type="hidden" name="page" value="allcommande">
               <button
                   type="submit" 
                   title="Filtrer"
                   class="bg-blue-500 text-white mx-2 px-3 py-2 rounded-lg shadow-lg hover:bg-blue-600 transition duration-300"
                   >
                   ok
                   
                   </button>
               </div>
          </form>
          <!-- Bouton Ajouter Utilisateur -->
          <a href="?controller=dette&page=ajout">
              <button
              id=""
              title="Ajouter une commande"
              class="bg-green-500 text-white px-3 py-2 rounded-lg shadow-lg hover:bg-green-600 transition duration-300"
              >
              <i class="ri-file-add-line"></i>
              
              </button>
          </a>
         </div>
      <?php  } ?>
      <!-- Tableau Transactions -->
      <div class="overflow-x-auto py-6 px-12">
      <?php if ($dettes == null) { ?>
        <h1>Aucune commande trouvé</h1>
        <?php }else { ?>

        <?php if ($dettes == null) { ?>
        <h1>Aucun client trouvé</h1>
        <?php }else { ?>
      <table class="min-w-full table-auto ">
            <thead class="bg-gray-50">
                <tr>
                <th class="px-6 py-3 text-left text-sm  font-medium text-gray-500 uppercase tracking-wider">Reference</th>
                    <th class="px-6 py-3 text-left text-sm  font-medium text-gray-500 uppercase tracking-wider">Date</th>
                    <th class="px-6 py-3 text-left text-sm  font-medium text-gray-500 uppercase tracking-wider">Montant</th>
                    <th class="px-6 py-3 text-left text-sm  font-medium text-gray-500 uppercase tracking-wider">statut</th>
                    <th class="px-6 py-3 text-left text-sm  font-medium text-gray-500 uppercase tracking-wider">Action</th>
                    
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
           
            <?php foreach ($dettesAffichees as $client) { ?>
              <tr class="hover:bg-gray-100">
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"><?= $client["id"] ?></td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"><?= $client["date"] ?></td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?= $client["montant"] ?></td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?= $client["etat"] ?></td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                      <a href="?controller=dette&page=details<?= isset($_GET['page']) && $_GET['page'] == 'alldette' ? '' : '&id=' . $id ?>&id_dette=<?= $client['id'] ?>" 
                        class="text-indigo-600 hover:text-indigo-900 cursor-pointer">
                        Details
                      </a>
                  </td>
              </tr>
          <?php } ?>


            </tbody>
        </table>
      </div>
      

      
      <div class="p-6 flex justify-center items-center bg-gray-50 space-x-2">
                <?php if ($page > 1) { ?>
                    <a href="?controller=commande&page=allcommande&p=<?= $page - 1 ?>" class="bg-gray-400 text-white text-xs px-2 py-1 rounded-lg shadow hover:bg-gray-500">
                        Précédent
                    </a>
                <?php } ?>

                <?php for ($i = 1; $i <= $totalPages; $i++) { ?>
                    <a href="?controller=commande&page=allcommande&p=<?= $i ?>" class="<?= $i == $page ? 'bg-blue-500' : 'bg-gray-400' ?> text-white text-xs px-2 py-1 rounded-lg shadow hover:bg-gray-500">
                        <?= $i ?>
                    </a>
                <?php } ?>

                <?php if ($page < $totalPages) { ?>
                    <a href="?controller=commande&page=allcommande&p=<?= $page + 1 ?>" class="bg-gray-400 text-white text-xs px-2 py-1 rounded-lg shadow hover:bg-gray-500">
                        Suivant
                    </a>
                <?php } ?>
            </div>
    </div>
    <?php } ?>
      <?php  } ?> 
    </div>
   <!-- Popup -->
<!-- <div
  id="popup"
  class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center hidden"
>
  <div class="bg-white rounded-lg shadow-lg max-w-lg w-full p-6">
    <h2 class="text-lg font-bold mb-4">Détails de la Commande</h2>
    <p class="text-sm mb-2"><span class="font-bold">Date :</span> <span id="popupDate"></span></p>
    <p class="text-sm mb-2"><span class="font-bold">Montant :</span> <span id="popupMontant"></span></p>
    <p class="text-sm mb-4"><span class="font-bold">Statut :</span> <span id="popupStatut"></span></p>

    <div class="mb-4">
      <h3 class="text-md font-bold mb-2">Produits :</h3>
      <table class="w-full border-collapse border border-gray-300 text-sm text-left">
        <thead>
          <tr>
            <th class="border border-gray-300 px-2 py-1">Nom</th>
            <th class="border border-gray-300 px-2 py-1">Quantité</th>
            <th class="border border-gray-300 px-2 py-1">Prix (CFA)</th>
          </tr>
        </thead>
        <tbody id="popupProducts">
          Produits seront insérés ici dynamiquement
        </tbody>
      </table>
    </div>

    <button
      onclick="closePopup()"
      class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600"
    >
      Fermer
    </button>
  </div>
</div> -->

<!-- <script>
  // Fonction pour ouvrir le popup avec des informations de commande
  function openPopup(date, montant, statut, produits) {
    document.getElementById('popupDate').innerText = date;
    document.getElementById('popupMontant').innerText = montant;
    document.getElementById('popupStatut').innerText = statut;

    // Insérer les produits dans le tableau
    const productsTable = document.getElementById('popupProducts');
    productsTable.innerHTML = ''; // Réinitialiser le contenu
    produits.forEach((produit) => {
      const row = document.createElement('tr');
      row.innerHTML = `
        <td class="border border-gray-300 px-2 py-1">${produit.nom}</td>
        <td class="border border-gray-300 px-2 py-1 text-center">${produit.quantite}</td>
        <td class="border border-gray-300 px-2 py-1 text-right">${produit.prix}</td>
      `;
      productsTable.appendChild(row);
    });

    document.getElementById('popup').classList.remove('hidden');
  }

  // Fonction pour fermer le popup
  function closePopup() {
    document.getElementById('popup').classList.add('hidden');
  }

  // Exemple d'appel avec des données fictives
  openPopup(
    "2025-01-28",
    "15 000 CFA",
    "Payée",
    [
      { nom: "Produit A", quantite: 2, prix: "2 500" },
      { nom: "Produit B", quantite: 1, prix: "5 000" },
      { nom: "Produit C", quantite: 3, prix: "1 500" },
    ]
  );
</script> -->

  </body>
</html>
