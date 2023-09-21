<?php
    $result = $_GET['result'] ?? null;
    require '../includes/functions.php';
    includeTemplate('header');
?>

    <main class="container section">
        <h1>Administrador de The Real Estate</h1>
        <?php if( $result == 1 ) { ?>
            <p class="alert success">Anuncio creado correctamente</p>
        <?php } ?>

        <a href="../admin/properties/create.php" class="button green-button">Nueva Propiedad</a>
    </main>

<?php
    includeTemplate('footer');
?>