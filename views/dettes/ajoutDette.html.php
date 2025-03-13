<div class="max-w-xl mx-auto p-6 bg-white rounded-lg shadow-lg">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6 text-center">Ajouter une Dette</h2>
    
    <form action="?page=ajout" method="POST">
        <!-- Nom du client -->
        <div class="mb-4">
            <label for="nom_client" class="block text-gray-700 font-medium">Nom du client</label>
            <input type="text" id="nom_client" name="nom_client" required 
                   class="w-full p-3 mt-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" 
                   placeholder="Entrez le nom du client">
        </div>

        <!-- Téléphone du client -->
        <div class="mb-4">
            <label for="telephone_client" class="block text-gray-700 font-medium">Téléphone du client</label>
            <input type="text" id="telephone_client" name="telephone_client" required
                   class="w-full p-3 mt-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" 
                   placeholder="Entrez le numéro de téléphone du client">
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
            <input type="date" id="date" name="date_echeance" required
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
