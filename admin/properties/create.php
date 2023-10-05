<?php
    require '../../includes/app.php';

    use App\Property;
    use Intervention\Image\ImageManagerStatic as Image;

    // User authentication
    isAuthenticated();

    // DataBase
    $db = connectDB();

    $property = new Property;

    // Sellers query
    $query_seller = "SELECT * FROM sellers";
    $result_seller = mysqli_query($db, $query_seller);

    // Error Messages
    $errors = Property::getErrors();
    
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
            <?php include '../../includes/templates/form_properties.php'; ?>

            <input type="submit" value="Crear Propiedad" class="button green-button">
        </form>
    </main>

<?php
    includeTemplate('footer');
?>