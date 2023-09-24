<?php
    // DB
    require '../includes/config/database.php';
    $db = connectDB();
    $query = "SELECT * FROM properties";
    $resultQuery = mysqli_query($db, $query);

    // Show conditional message
    $result = $_GET['result'] ?? null;

    // Template include
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

            <tbody> <!-- Show results -->
                <?php while( $property = mysqli_fetch_assoc($resultQuery)) { ?>
                <tr>
                    <td><?php echo $property['id']; ?></td>
                    <td><?php echo $property['title']; ?></td>
                    <td><img src="../images/<?php echo $property['image'];?>" class="table-image" alt="hola"></td>
                    <td><?php echo $property['price']; ?> €</td>
                    <td>
                        <a href="#" class="red-button-block">Eliminar</a>
                        <a href="../admin/properties/update.php?=<?php echo $property['id']; ?>" class="yellow-button-block">Actualizar</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </main>

<?php
    // Close connection
    mysqli_close($db);

    includeTemplate('footer');
?>