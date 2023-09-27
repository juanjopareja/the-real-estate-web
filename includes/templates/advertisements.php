<?php 
    // DB connection import
    require 'includes/config/database.php';
    $db = connectDB();

    // Query
    $query = "SELECT * FROM properties LIMIT $limit";
    
    // Get results
    $result = mysqli_query($db, $query);
?>

<div class="container-advertisements">
    <?php while($property = mysqli_fetch_assoc($result)) { ?>

    <div class="advertisement">
        <img loading="lazy" src="images/<?php echo $property['image']; ?>" alt="imagen anuncio">
        
        <div class="advertisement-content">
            <h3><?php echo $property['title']; ?></h3>
            <p><?php echo $property['description']; ?></p>
            <p class="price"><?php echo $property['price']; ?> €</p>

            <ul class="icons-especifications">
                <li>
                    <img class="icon" loading="lazy" src="build/img/icon_wc.svg" alt="icono wc">
                    <p><?php echo $property['wc']; ?></p>
                </li>

                <li>
                    <img class="icon" loading="lazy" src="build/img/icon_parking.svg" alt="icono parking">
                    <p><?php echo $property['parking']; ?></p>
                </li>

                <li>
                    <img class="icon" loading="lazy" src="build/img/icon_bedroom.svg" alt="icono dormitorio">
                    <p><?php echo $property['bedrooms']; ?></p>
                </li>
            </ul>

            <a href="advertisement.php?id=<?php echo $property['id']; ?>" class="yellow-button-block">Ver Propiedad</a>
        </div><!-- .advertisements-content-->
    </div><!-- .advertisements -->

    <?php } ?>
</div><!-- .container-advertisements-->

<?php 
    // Close connection
    mysqli_close($db);
?>