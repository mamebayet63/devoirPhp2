
    <div class=" mx-12 bg-white p-6 rounded-lg shadow-md my-12">
        <h2 class="text-2xl font-bold mb-4">Enregistrer une Commande</h2>

        <div class="flex flex-row gap-8">
            <!-- Section de gauche : Informations du client -->
            <div class="w-1/3">
                <!-- <form method="POST" class="mb-4">
                    <label class="block mb-2 font-semibold">Numéro du client :</label>
                    <input type="text" name="telephone" class="w-full p-2 border rounded" placeholder="Entrer le numéro"
                           value="<?php echo htmlspecialchars($clientTrouve[0]['telephone'] ?? ''); ?>">
                    <button type="submit" class="bg-blue-500 text-white p-2 rounded mt-2 w-full">Rechercher</button>
                </form> -->
                <form method="POST" class="mb-4">
                <div class="relative w-full">
                    <input 
                        type="text" 
                        name="telephone"
                        value="<?php echo htmlspecialchars($clientTrouve[0]['telephone'] ?? ''); ?>"
                        placeholder="Numéro du client :" 
                        class="w-4/4 p-3 pl-5 pr-12 rounded-full shadow-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-500"
                    >
                    <button 
                        type="submit"
                        class="absolute right-32 top-1/2 transform -translate-y-1/2 bg-gradient-to-r from-blue-500 to-purple-600 text-white py-2 px-3 rounded-full hover:bg-green-600 transition-all">
                        <i class="ri-search-eye-line"></i>
                    </button>
                </div>
                </form>

                <p class="mb-4 <?php echo $clientTrouve ? 'font-bold bg-clip-text text-transparent bg-gradient-to-r from-blue-400 to-purple-500' : 'text-red-500'; ?>">
                    <?php echo $clientTrouve ? "Client : {$clientTrouve[0]['nom']} {$clientTrouve[0]['prenom']}" : $erreurTelephone; ?>
                </p>

                <label class="block mb-2 font-semibold">Date :</label>
                <input type="date" class="w-full p-2 border rounded mb-4" value="<?php echo $dateCommande; ?>" readonly>



            </div>
            

            <!-- Section de droite : Tableau des produits -->
            <div class="w-2/3 px-4">
                <h3 class="text-xl font-bold mb-2">Produits</h3>
                
                <div class="flex flex-row items-center">
                    <form method="POST" class="flex gap-2  w-1/2">
                        <div class=" relative ">
                        <input type="number" name="produit_id"
                        class="w-4/4 p-3 pl-5 pr-12 rounded-full shadow-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-500"
                        placeholder="Entrer l'ID du produit">
                        <button type="submit" 
                        class="  bg-gradient-to-r from-blue-500 to-purple-600 text-white p-3 mt-2 rounded-full hover:bg-green-600 transition-all 
                        <?= $produitPeutEtreRechercher ? '' : 'disabled'; ?>"
                        >OK</button>
                        </div>
                    </form>

                    <form method="POST" class="w-1/2">
                        <div class="flex gap-2 my-4">
                            <input type="hidden" name="produit_nom" value="<?= $produitTrouve['nom_produit'] ?? ""?>" >
                            <input type="number" name="produit_quantite" value="<?= $produitModif["quantite"] ?? ""?>" placeholder="Quantité" class="p-3 border rounded-full ">
                            <input type="hidden" name="produit_prix" value="<?= $produitTrouve['prix_unitaire'] ?? ""?>" >
                            <button type="submit" class="bg-gradient-to-r from-blue-500 to-purple-600 text-white p-2 rounded-full   <?php echo $produitsPeutEtreEnregistree ? '' : 'opacity-50 cursor-not-allowed'; ?>"
                            <?php echo $produitsPeutEtreEnregistree ? '' : 'disabled'; ?>">Ajouter</button>
                        </div>
                    </form>
                </div>
                

                <div class="flex flex-row my-3">
                    <?php if ($produitTrouve): ?>
                        <p class="text-green-500 font-semibold bg-gray-100 px-3 rounded-full mx-3">Produit : <?= htmlspecialchars($produitTrouve['nom_produit']) ?></p>
                        <p class="text-gray-700 font-semibold bg-gray-100 px-3 rounded-full mx-3">Quantité en stock : <?= htmlspecialchars($produitTrouve['quantite_stock']) ?></p>
                        <p class="text-gray-700 font-semibold bg-gray-100 px-3 rounded-full mx-3">prix_unitaire : <?= htmlspecialchars($produitTrouve['prix_unitaire']) ?></p>
                    <?php elseif ($erreurProduit): ?>
                        <p class="text-red-500"><?= $erreurProduit ?></p>
                    <?php endif; ?>
                </div>
               

                <table class="min-w-full table-auto ">
                    <thead class="bg-gray-50">
                        <tr class="px-6 py-3 text-left text-sm  font-medium text-gray-500 uppercase tracking-wider">
                            <th class="p-2 text-start">Nom</th>
                            <th class="p-2  text-start">Quantité</th>
                            <th class="p-2  text-start">Prix</th>
                            <th class="p-2  text-start">Montant</th>
                            <th class="p-2  text-start">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if ( isset($_SESSION["produits"]) ): ?>

                        <?php foreach ( $_SESSION["produits"] as $index => $produit): ?>

                            <tr>
                                <td class="p-2 "><?php echo htmlspecialchars($produit['nom_produit']); ?></td>
                                <td class="p-2 text"><?php echo htmlspecialchars($produit['quantite']); ?></td>
                                <td class="p-2"><?php echo htmlspecialchars($produit['prix_unitaire']); ?>€</td>
                                <td class="p-2"><?php echo htmlspecialchars($produit['total']); ?>€</td>
                                <td class="p-2">
                                    
                                    <form method="GET" style="display:inline;"> 
                                        <input type="hidden" name="produit_index" value="<?php echo $index; ?>">
                                        <input type="hidden" name="page" value="ajout">
                                        <input type="hidden" name="controller" value="commande">

                                        <input type="number" name="nouvelle_quantite" class="p-2 border rounded w-16" placeholder="Quantité">
                                        <button type="submit" name="modifier_produit" class="text-blue-500">Modifier</button>
                                    </form>
                                    <!--  <a href="?controller=commande&page=ajout&modif=<?php echo $index; ?>"><i class="ri-pencil-fill text-xl"></i></a>-->
                                    <form method="POST" style="display:inline;">
                                        <input type="hidden" name="produit_index" value="<?php echo $index; ?>">
                                        <button type="submit" name="supprimer_produit" class="text-red-500 text-xl"><i class="ri-delete-bin-3-line"></i></button>
                                    </form> 
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>


                <form method="POST">
                     <input type="hidden" name="controller" value="commande"> 
                    <input type="hidden" name="page" value="allcommande">
                    
                     <label class="block mb-2 font-semibold">Statut de la commande :</label>

                    <div class="flex items-center space-x-4 mb-4">
                        <label class="flex items-center">
                            <input type="radio" name="statut" value="paye" class="mr-2" <?php echo ($statut == 'payé') ? 'checked' : ''; ?>>
                            Paye
                        </label>

                        <label class="flex items-center">
                            <input type="radio" name="statut" value="en attente" class="mr-2" <?php echo ($statut == 'en attente') ? 'checked' : ''; ?>>
                            En attente
                        </label>
                    </div>
                    <div class="flex flex-row justify-between items-center">
                        <p class="font-bold">Total de la commande : <?php echo $totalCommande; ?>€</p>

                        <button type="submit" name="enregistrer"
                                class="bg-gradient-to-r from-blue-500 to-purple-600  text-white p-2 rounded-full w-1/3 py-4 
                                <?php echo $commandePeutEtreEnregistree ? '' : 'opacity-50 cursor-not-allowed'; ?>"
                                <?php echo $commandePeutEtreEnregistree ? '' : 'disabled'; ?>>
                            Enregistrer la Commande
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>


