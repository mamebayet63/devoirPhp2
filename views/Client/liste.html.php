<?php
    //  require_once("../layout/layout.php");
$elements_par_page = 5;
$page_actuelle = isset($_GET['page_ac']) ? (int)$_GET['page_ac'] : 1;
$debut = ($page_actuelle - 1) * $elements_par_page;

// Nombre total d'éléments
if ($clients) {
  $total_clients = count($clients);
  $total_pages = ceil($total_clients / $elements_par_page);
}
?>

<div class="max-w-5xl mx-auto p-6 bg-[#F8F8FF] rounded-lg shadow-sm mt-8">
        <!-- Barre d'actions -->
        <div class="flex justify-between items-center bg-white p-4 rounded-t-lg shadow-sm border border-gray-200">
            <div>
                <h2 class="text-2xl font-semibold text-gray-800">Clinico <span class="bg-blue-100 text-xs  text-blue-600 px-2 py-1 rounded-lg font-medium">Simple et direct</span></h2>
                <p class="text-gray-500 text-sm">Liste des rendez-vous</p>
            </div>
            <div class="flex space-x-3">
                <button class=" text-gray-700 px-2 py-2 rounded-lg font-medium text-base flex items-center diseabled cursor-not-allowed hover:bg-red-600 hover:text-white">
                    <i class="ri-delete-bin-6-line text-lg font-medium mx-1 text-red-500 hover:text-white "></i> Annuler
                </button>
                <button class="border border-[#D0D5DD] text-gray-700 px-3 py-1 rounded-lg font-medium text-base flex items-center hover:bg-gray-300">
                    <i class="ri-filter-3-line text-lg font-medium "></i> Filtres
                </button>
                <a href="?controller=client&page=ajout">
                    <button class="bg-[#0070FF] text-white px-3 font-medium py-2 rounded-lg text-sm flex items-center hover:bg-blue-700">
                        <i class="ri-add-line text-lg font-bold"></i> Add new Rv
                    </button>
                </a>
            </div>
        </div>

        <!-- Tableau -->
        <div class="overflow-x-auto  border rounded-b-lg shadow-xs">
        <?php if ($clients == null) { ?>
        <h1>Aucun client trouvé</h1>
        <?php }else { ?>
            <table class="min-w-full border-collapse bg-white">
                <thead>
                    <tr class="bg-[#EAECF0] text-gray-800 uppercase text-sm">
                        <th class="py-3 px-6 text-left w-12">
                            <input type="checkbox" class="w-4 h-4 accent-blue-500">
                        </th>
                        <th class="py-3 px-6 text-left">Nom</th>
                        <th class="py-3 px-6 text-left">Prenom</th>
                        <th class="py-3 px-6 text-left">telephone</th>
                        <th class="py-3 px-6 text-left">Adresse ⬍</th>
                        <!-- <th class="py-3 px-6 text-left">Action</th> -->
                        <th class="py-3 px-6 text-left"></th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm bg-white">
                <?php foreach (array_slice($clients, $debut, $elements_par_page) as $client) { ?>
                    <!-- Ligne de données -->
                    <tr class="border-b border-gray-200 hover:bg-gray-50">
                        <td class="py-3 px-6"><input type="checkbox" class="w-4 h-4 accent-blue-500"></td>
                        <td class="py-3 px-2 font-medium text-[#101828]"><?= $client["nom"]?></td>
                        <td class="py-3 px-2 text-[#667085]"><?= $client["prenom"]?></td>
                        <td class="py-3 px-2 text-[#667085]"><?= $client["telephone"]?></td>
                        <td class="py-3 px-2 text-[#667085]"><?= $client["adresse"]?></td>
                        <!-- <td class="py-3 px-6 flex space-x-3"> 
                            <a href="#">
                                <span class="bg-green-100 text-green-800 px-3 py-[4px] rounded-[15.39px] text-sm flex items-center space-x-1 hover:bg-green-200 text-green-900 font-medium">Validé</span>
                            </a>
                            <a href="#">
                                <span class="bg-red-100 text-red-800 px-3 py-[4px] rounded-[15.39px] text-sm flex items-center space-x-1 hover:bg-red-200 text-green-900 font-medium">Validé</span>
                            </a>
                        </td> -->
                        <td>
                            <a href="#">
                                <span>
                                    <i class="ri-more-2-fill text-lg font-medium"></i>
                                </span>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
                    
                </tbody>
            </table>
               <!-- Pagination -->
    <div class="px-6 py-2 flex justify-center space-x-2 bg-gray-50">
      <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
        <a href="?controller=client&page_ac=<?= $i ?>" class="px-3 py-1 <?= ($i == $page_actuelle) ? 'bg-blue-500 text-white' : 'bg-gray-400 text-white' ?> rounded-lg">
          <?= $i ?>
        </a>
      <?php } ?>
    </div>
            <?php } ?>
        </div>
    </div>