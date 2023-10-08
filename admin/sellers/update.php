<?php

    require '../../includes/app.php';
    use App\Seller;

    isAuthenticated();

    $seller = new Seller;

    // Error Messages
    $errors = Seller::getErrors();

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    }

    includeTemplate('header');

?>

<main class="container section">
    <h1>Actualizar Vendedores</h1>

    <a href="../index.php" class="button green-button">Volver</a>

    <?php foreach($errors as $error) { ?>

    <div class="alert error">
        <?php echo $error; ?>
    </div>

    <?php } ?>

    <form class="form" method="POST" action="../sellers/update.php">
        <?php include '../../includes/templates/form_sellers.php'; ?>

        <input type="submit" value="Guardar Cambios" class="button green-button">
    </form>
</main>

<?php
    includeTemplate('footer');
?>