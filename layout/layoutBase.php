<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Gestion des Transactions</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Itim&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@4.6.0/fonts/remixicon.min.css">
    <style>
      body {
        font-family: 'Poppins', sans-serif;
      }
      .card-header {
        background: linear-gradient(135deg, #4a90e2, #50c4b7);
        color: white;
      }
    </style>
</head>
  <body class="bg-gray-100">
  <?php require_once ROOT_PATH . "/views/components/header.php"; ?>
  <?= $content ?>
</body>

</html>