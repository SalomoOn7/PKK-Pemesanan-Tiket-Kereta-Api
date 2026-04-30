<?php
$page_title = $page_title ?? "Halaman";
ob_start();
$page_content = $page_content ?? "";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($page_title) ?></title>
  <link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css"
    rel="stylesheet"
/>
  <link href="../src/output.css" rel="stylesheet" />
</head>
<body>
   <?php include 'sidebar.php'; ?>
  <div class="flex-1 ml-64 p-6">
    <?= $page_content ?>
  </div>
</body>
</html>