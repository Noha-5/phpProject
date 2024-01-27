<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $viewProps['pageTitle'] ?></title>
    <link rel="stylesheet" href="/assets/css/main.css" />
</head>
<body>
    <main class="container">
        
        <?php
            include_once $viewProps['viewName'] . '.view.php';
        ?>

        <hr>
        
        <footer>
            Developed by Noha Hamed
        </footer>
    </main>
</body>
</html>
