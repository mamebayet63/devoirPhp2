<div class="flex justify-center items-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full sm:w-96">
        <h2 class="text-2xl font-semibold text-gray-700 text-center mb-6">Ajouter un Client</h2>

        <form action="" method="POST">
            <input type="hidden" name="controller" value="client"> 
            <input type="hidden" name="page" value="ajout">

            <!-- Nom -->
            <div class="mb-4">
                <label for="nom" class="block text-gray-700 text-sm font-medium">Nom</label>
                <input type="text" id="nom" name="nom" value="<?= $_POST['nom'] ?? '' ?>" 
                       class="w-full p-3 mt-1 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                <?php if (!empty($_SESSION['errors']['nom'])) : ?>
                    <span class="text-red-500 text-sm"><?= $_SESSION['errors']['nom'] ?></span>
                <?php endif; ?>
            </div>

            <!-- Prénom -->
            <div class="mb-4">
                <label for="prenom" class="block text-gray-700 text-sm font-medium">Prénom</label>
                <input type="text" id="prenom" name="prenom" value="<?= $_POST['prenom'] ?? '' ?>" 
                       class="w-full p-3 mt-1 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                <?php if (!empty($_SESSION['errors']['prenom'])) : ?>
                    <span class="text-red-500 text-sm"><?= $_SESSION['errors']['prenom'] ?></span>
                <?php endif; ?>
            </div>

            

            <!-- Téléphone -->
            <div class="mb-4">
                <label for="tel" class="block text-gray-700 text-sm font-medium">Numéro de téléphone</label>
                <input type="text" id="tel" name="tel" value="<?= $_POST['tel'] ?? '' ?>" 
                       class="w-full p-3 mt-1 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                <?php if (!empty($_SESSION['errors']['tel'])) : ?>
                    <span class="text-red-500 text-sm"><?= $_SESSION['errors']['tel'] ?></span>
                <?php endif; ?>
            </div>

            <!-- Adresse -->
            <div class="mb-4">
                <label for="address" class="block text-gray-700 text-sm font-medium">Adresse</label>
                <input type="text" id="address" name="adresse" value="<?= $_POST['address'] ?? '' ?>" 
                       class="w-full p-3 mt-1 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
               
            </div>

            <!-- Bouton d'envoi -->
            <div class="mb-4 text-center">
                <button type="submit" class="w-full py-3 px-4 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Ajouter le Client
                </button>
            </div>
        </form>
    </div>
</div>
