<?php
    require '../includes/app.php';
    isAuthenticated();

    use App\Property;
    use App\Seller;

    // Get properties implement
    $properties = Property::all();
    $seller = Seller::all();

    // Show conditional message
    $result = $_GET['result'] ?? null;

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if($id) {

            $type = $_POST['type'];

            if(validateTypeContent($type)) {
                if($type === 'seller') {
                    $seller = Seller::find($id);
                    $seller->delete(); 

                } else if($type === 'property') {
                    $property = Property::find($id);
                    $property->delete(); 
                }
            }            
        }
    }

    // Template include
    includeTemplate('header');
?>

    <main class="container section">
        <h1>Administrador de The Real Estate</h1>

        <?php
            $message = showMessages(intval($result));
            if($message) { ?>
            <p class="alert success"><?php echo sanitizer($message) ?></p>
        <?php } ?>
            
        <a href="../admin/properties/create.php" class="button green-button">Nueva Propiedad</a>
        <a href="../admin/sellers/create.php" class="button yellow-button">Nuevo/a Vendedor/a</a>

        <h2>Propiedades</h2>

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
                <?php foreach($properties as $property) { ?>
                <tr>
                    <td><?php echo $property->id; ?></td>
                    <td><?php echo $property->title; ?></td>
                    <td><img src="../images/<?php echo $property->image;?>" class="table-image" alt="hola"></td>
                    <td><?php echo $property->price; ?> €</td>
                    <td>
                        <form method="POST" class="w-100">
                            <input type="hidden" name="id" value="<?php echo $property->id?>">    
                            <input type="hidden" name="type" value="property">    

                            <input type="submit" class="red-button-block" value="Eliminar">
                        </form>

                        <a href="../admin/properties/update.php?id=<?php echo $property->id; ?>" class="yellow-button-block">Actualizar</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>

        <h2>Vendedores</h2>

        <table class="properties">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Télefono</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody> <!-- Show results -->
                <?php foreach($seller as $sel) { ?>
                <tr>
                    <td><?php echo $sel->id; ?></td>
                    <td><?php echo $sel->name . " " . $sel->lastname; ?></td>
                    <td><?php echo $sel->phone; ?></td>
                    <td>
                        <form method="POST" class="w-100">
                            <input type="hidden" name="id" value="<?php echo $sel->id?>">    
                            <input type="hidden" name="type" value="seller">

                            <input type="submit" class="red-button-block" value="Eliminar">
                        </form>

                        <a href="../admin/sellers/update.php?id=<?php echo $sel->id; ?>" class="yellow-button-block">Actualizar</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </main>

<?php
    includeTemplate('footer');
?>