<?php
    require '../../includes/app.php';

    use App\Property;
    use Intervention\Image\ImageManagerStatic as Image;

    // User authentication
    isAuthenticated();

    // DataBase
    $db = connectDB();

    // Sellers query
    $query_seller = "SELECT * FROM sellers";
    $result_seller = mysqli_query($db, $query_seller);

    // Error Messages
    $errors = Property::getErrors();

    $title = '';
    $price = '';
    $description = '';
    $bedrooms = '';
    $wc = '';
    $parking = '';
    $seller_id = '';
    
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        /** Create new instance **/ 
        $property = new Property($_POST);

        /** Files Upload */ 
        // Generate Unique Name
        $imageName = md5( uniqid( rand(), ) ) . ".jpg";

        // Set image
        // Resize image Intervention
        if($_FILES['image']['tmp_name']) {
            $image = Image::make($_FILES['image']['tmp_name'])->fit(800,600);
            $property->setImage($imageName);
        }

        // Validation
        $errors = $property->validate();

        if(empty($errors)) { 
            // Create Folder
            if(!is_dir(IMAGES_FOLDER)) {
                mkdir(IMAGES_FOLDER);
            }

            // Save image into server
            $image->save(IMAGES_FOLDER . $imageName);

            // Save into DB
            $result = $property->save();
            
            // Error message
            if($result) {
                // Redirect User
                header('Location: ../index.php?result=1');
            }
        }

    }   

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

                <select name="sellers_id">
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