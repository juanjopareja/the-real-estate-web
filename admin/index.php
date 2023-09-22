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

        <table class="properties">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Imagen</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>1</td>
                    <td>Casa en la playa</td>
                    <td><img src="/images/1111.jpg" class="table-image"></td>
                    <td>1.200.000 €</td>
                    <td>
                        <a href="#" class="red-button-block">Eliminar</a>
                        <a href="#" class="yellow-button-block">Actualizar</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </main>

<?php
    includeTemplate('footer');
?>