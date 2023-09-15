<?php
    // DataBase
    require '../../includes/config/database.php';
    $db = connectDB();

    // Sellers query
    $query_seller = "SELECT * FROM sellers";
    $result_seller = mysqli_query($db, $query_seller);

    // Error Messages
    $errors = [];

    $title = '';
    $price = '';
    $description = '';
    $bedrooms = '';
    $wc = '';
    $parking = '';
    $seller_id = '';
    
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $title = mysqli_real_escape_string($db, $_POST['title']);
        $price = mysqli_real_escape_string($db, $_POST['price']);
        $description = mysqli_real_escape_string($db, $_POST['description']);
        $bedrooms = mysqli_real_escape_string($db, $_POST['bedrooms']);
        $wc = mysqli_real_escape_string($db, $_POST['wc']);
        $parking = mysqli_real_escape_string($db, $_POST['parking']);
        $seller_id = mysqli_real_escape_string($db, $_POST['seller']);
        $created = date('Y/m/d');

        // Asign files to a variable
        $image = $_FILES['image'];


        if(!$title) {
            $errors[] = "Debes añadir un título";
        }

        if(!$price) {
            $errors[] = "Debes añadir un precio";
        }

        if(strlen($description) < 50){
            $errors[] = "La descripción es obligatoria y debe tener al menos 50 caracteres";
        }

        if(!$bedrooms) {
            $errors[] = "El número de habitaciones es obligatorio";
        }

        if(!$wc) {
            $errors[] = "El número de baños es obligatorio";
        }

        if(!$parking) {
            $errors[] = "El número de plazas de garage es obligatorio";
        }

        if(!$seller_id) {
            $errors[] = "Elige un vendedor";
        }

        if(!$image['name'] || $image['error']) {
            $errors[] = "La imagen es obligatoria";
        }

        // Validate image size (100kb max)
        $size = 1000 * 100;

        if($image['size'] > $size) {
            $errors[] = "La imagen supera el tamaño máximo de archivo (100kb)";
        }

        if(empty($errors)) {
            // DB Insert
            $query = "INSERT INTO properties (title, price, description, bedrooms, wc, parking, created, sellers_id)
            VALUES ('$title', '$price', '$description', '$bedrooms', '$wc', '$parking', '$created', '$seller_id')";
    
            $result = mysqli_query($db, $query);
    
            if($result) {
                // Redirect User
                header('Location: ../index.php');
            }
        }

    }   

    require '../../includes/functions.php';
    includeTemplate('header');
?>

    <main class="container section">
        <h1>Crear</h1>

        <a href="../index.php" class="button green-button">Volver</a>

        <?php foreach($errors as $error) { ?>

        <div class="alert error">
            <?php echo $error; ?>
        </div>

        <?php } ?>

        <form class="form" method="POST" action="../properties/create.php" enctype="multipart/form-data">
            <fieldset>
                <legend>Información General</legend>

                <label for="title">Título:</label>
                <input type="text" id="title" name="title" placeholder="Título Propiedad" value="<?php echo $title; ?>">

                <label for="price">Precio:</label>
                <input type="number" id="price" name="price" placeholder="Precio Propiedad" value="<?php echo $price; ?>">

                <label for="image">Imagen:</label>
                <input type="file" id="image" name="image" accept="image/jpeg, image/png">

                <label for="description">Descripción:</label>
                <textarea id="description" name="description"><?php echo $description; ?></textarea>
            </fieldset>

            <fieldset>
                <legend>Información Propiedad</legend>

                <label for="bedrooms">Habitaciones:</label>
                <input type="number" id="bedrooms" name="bedrooms" placeholder="Ej: 3" min="1" max="9" value="<?php echo $bedrooms; ?>">

                <label for="wc">Baños:</label>
                <input type="number" id="wc" name="wc" placeholder="Ej: 2" min="1" max="9" value="<?php echo $wc; ?>">

                <label for="parking">Parking:</label>
                <input type="number" id="parking" name="parking" placeholder="Ej: 1" min="1" max="9" value="<?php echo $parking; ?>">
            </fieldset>

            <fieldset>
                <legend>Vendedor</legend>

                <select name="seller">
                    <option value="">-- Selecciona --</option>
                    <?php while($seller = mysqli_fetch_assoc($result_seller)) {?>
                        <option <?php echo $seller_id === $seller['id'] ? 'selected' : ''; ?> value="<?php echo $seller['id']; ?>"> <?php echo $seller['name'] . " " . $seller['lastname']; ?></option>
                    <?php } ?>
                    
                </select>
            </fieldset>

            <input type="submit" value="Crear Propiedad" class="button green-button">
        </form>
    </main>

<?php
    includeTemplate('footer');
?>