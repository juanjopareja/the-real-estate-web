<?php
    require 'includes/app.php';
    includeTemplate('header');
?>

    <main class="container section">
        <h1>Casas y Apartamentos en venta</h1>

        <?php
            $limit = 6; 
            include 'includes/templates/advertisements.php';
        ?>
    </main>

<?php
    includeTemplate('footer');
?>