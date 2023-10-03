<?php
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id) {
        header('Location: index.php');
    }

    // Import Functions
    require 'includes/app.php';

    // DB connection import
    $db = connectDB();

    // Query
    $query = "SELECT * FROM properties WHERE id = $id";
    
    // Get results
    $result = mysqli_query($db, $query);

    if(!$result -> num_rows) {
        header('Location: index.php');
    }

    $property = mysqli_fetch_assoc($result);

    includeTemplate('header');
?>

    <main class="container section center-content">
        <h1><?php echo $property['title'] ?></h1>
       
        <img loading="lazy" src="images/<?php echo $property['image'] ?>" alt="imagen destacada">

        <div class="property-summary">
            <p class="price"><?php echo $property['price'] ?> €</p>

            <ul class="icons-especifications icons-align">
                <li>
                    <img class="icon" loading="lazy" src="build/img/icon_wc.svg" alt="icono wc">
                    <p><?php echo $property['wc'] ?></p>
                </li>

                <li>
                    <img class="icon" loading="lazy" src="build/img/icon_parking.svg" alt="icono parking">
                    <p><?php echo $property['parking'] ?></p>
                </li>

                <li>
                    <img class="icon" loading="lazy" src="build/img/icon_bedroom.svg" alt="icono dormitorio">
                    <p><?php echo $property['bedrooms'] ?></p>
                </li>
            </ul>

            <p><?php echo $property['description'] ?></p>
        </div>
    </main>

<?php
    // Close connection
    mysqli_close($db);

    includeTemplate('footer');
?>