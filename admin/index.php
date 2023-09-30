<?php
    require '../includes/functions.php';
    $auth = isAuthenticated();

    if(!$auth) {
        header('location: ../index.php');
    }

    // DB
    require '../includes/config/database.php';
    $db = connectDB();
    $query = "SELECT * FROM properties";
    $resultQuery = mysqli_query($db, $query);

    // Show conditional message
    $result = $_GET['result'] ?? null;

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if($id) {
            // Delete file
            $query = "SELECT image FROM properties WHERE id = $id";
            $result = mysqli_query($db, $query);
            $property = mysqli_fetch_assoc($result);
            unlink('../images/' . $property['image']);

            // Delete property
            $query = "DELETE FROM properties WHERE id = $id";
            $result = mysqli_query($db, $query);

            if($result) {
                header('location: ../admin/index.php?result=3');
            }
        }
    }

    // Template include
    includeTemplate('header');
?>

    <main class="container section">
        <h1>Administrador de The Real Estate</h1>
        <?php if( $result == 1 ) { ?>
            <p class="alert success">Anuncio creado correctamente</p>
        <?php } elseif( $result == 2 ) { ?>
            <p class="alert success">Anuncio actualizado correctamente</p>
        <?php } elseif( $result == 3 ) { ?>
            <p class="alert success">Anuncio eliminado correctamente</p>
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
                        <form method="POST" class="w-100">
                            <input type="hidden" name="id" value="<?php echo $property['id']?>">    

                            <input type="submit" class="red-button-block" value="Eliminar">
                        </form>

                        <a href="../admin/properties/update.php?id=<?php echo $property['id']; ?>" class="yellow-button-block">Actualizar</a>
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