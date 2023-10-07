<?php

use App\Property;
use App\Seller;
use Intervention\Image\ImageManagerStatic as Image;

    require '../../includes/app.php';
    isAuthenticated();

    // URL validation per ID
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id) {
        header('Location: ../../admin');
    }

    // Get property data
    $property = Property::find($id);

    // All sellers query
    $sellers = Seller::all();

    // Error Messages
    $errors = Property::getErrors();
    
    if($_SERVER['REQUEST_METHOD'] === 'POST') {

        
        // Attribute asign
        $args = $_POST['property'];
        
        $property->synchronize($args);
        
        // Validation
        $errors = $property->validate();
       
        /** Files Upload */ 
        // Generate Unique Name
        $imageName = md5( uniqid( rand(), ) ) . ".jpg";

        if($_FILES['property']['tmp_name']['image']) {
            $image = Image::make($_FILES['property']['tmp_name']['image'])->fit(800,600);
            $property->setImage($imageName);
        }

        if(empty($errors)) {
            if($_FILES['property']['tmp_name']['image']) {

            // Save image
            $image->save(IMAGES_FOLDER . $imageName);
            }
        }

        $property->save();
    }   

    includeTemplate('header');
?>

    <main class="container section">
        <h1>Actualizar Propiedad</h1>

        <a href="../index.php" class="button green-button">Volver</a>

        <?php foreach($errors as $error) { ?>

        <div class="alert error">
            <?php echo $error; ?>
        </div>

        <?php } ?>

        <form class="form" method="POST" enctype="multipart/form-data">
            <?php include '../../includes/templates/form_properties.php'; ?>

            <input type="submit" value="Actualizar Propiedad" class="button green-button">
        </form>
    </main>

<?php
    includeTemplate('footer');
?>