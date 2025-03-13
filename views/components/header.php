<header class="  text-white py-4 shadow-lg sticky top-0">
    <div class="container mx-auto flex justify-between items-center px-6">
        <h1 class="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-blue-400 to-purple-500">Mon Site</h1>
        <nav class="bg-gradient-to-r from-blue-500 to-purple-600 px-8 py-3 rounded-full">
            <ul class="flex space-x-6">
                <li><a href="<?= WEBROOT?>?controller=client" class="hover:text-gray-300">Client</a></li>
                <li><a href="<?= WEBROOT?>?controller=commande&page=allcommande" class="hover:text-gray-300">Dette</a></li>
                
            </ul>
        </nav>
        <div>
        
        <a href="<?= WEBROOT?>?controller=security&page=logout">
          <button class="bg-white text-blue-500 px-4 py-2 rounded-full font-semibold shadow-md hover:bg-gray-100">Se deconnecter</button>
        </a>
        </div>
    </div>
</header>