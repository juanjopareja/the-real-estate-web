<?php

    require '../../includes/app.php';
    use App\Seller;
    isAuthenticated();

    // Validate id
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id) {
        header('Location: ../../admin');
    }

    // Get seller array
    $seller = Seller::find($id);

    // Error Messages
    $errors = Seller::getErrors();

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
    
        // Assing values
        $args = $_POST['seller'];

        // Sinchronize memory object
        $seller->synchronize($args);

        // Validation
        $errors = $seller->validate();

        if(empty($errors)) {
            $seller->save();
        }
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