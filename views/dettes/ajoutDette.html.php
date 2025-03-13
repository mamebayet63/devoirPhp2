<div class="max-w-xl mx-auto p-6 bg-white rounded-lg shadow-lg">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6 text-center">Ajouter une Dette</h2>
    
    <form action="?page=ajout" method="POST">
        <!-- Sélectionner un client -->
        <div class="mb-4">
            <label for="client_id" class="block text-gray-700 font-medium">Sélectionner le client</label>
            <select id="client_id" name="client_id" required 
                    class="w-full p-3 mt-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="" disabled selected>Choisir un client</option>
                <?php foreach ($clients as $client) { ?>
                    <option value="<?= $client['id'] ?>"><?= $client['nom'] ?> <?= $client['prenom'] ?></option>
                <?php } ?>
            </select>
        </div>

        <!-- Montant de la dette -->
        <div class="mb-4">
            <label for="montant" class="block text-gray-700 font-medium">Montant de la dette</label>
            <input type="number" id="montant" name="montant" required step="0.01"
                   class="w-full p-3 mt-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" 
                   placeholder="Entrez le montant de la dette">
        </div>

        <!-- Date d'échéance -->
        <div class="mb-4">
            <label for="date_echeance" class="block text-gray-700 font-medium">Date d'échéance</label>
            <input type="date" id="date_echeance" name="date_echeance" required
                   class="w-full p-3 mt-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- Description de la dette -->
        <div class="mb-4">
            <label for="description" class="block text-gray-700 font-medium">Description (facultatif)</label>
            <textarea id="description" name="description" rows="4" 
                      class="w-full p-3 mt-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" 
                      placeholder="Entrez une description de la dette (facultatif)"></textarea>
        </div>

        <!-- Bouton d'envoi -->
        <div class="text-center">
            <button type="submit" name="submit" class="bg-blue-500 text-white py-3 px-6 rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                Ajouter la dette
            </button>
        </div>
    </form>
</div>
y