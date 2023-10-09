<?php 
    use App\Property;

    if($_SERVER['SCRIPT_NAME'] === '/advertisements.php') {
        $properties = Property::all(); 
    } else {
        $properties = Property::get(3); 
    }
?>

<div class="container-advertisements">
    <?php foreach($properties as $property) { ?>

    <div class="advertisement">
        <img loading="lazy" src="images/<?php echo $property->image; ?>" alt="imagen anuncio">
        
        <div class="advertisement-content">
            <h3><?php echo $property->title; ?></h3>
            <p><?php echo $property->description; ?></p>
            <p class="price"><?php echo $property->price; ?> €</p>

            <ul class="icons-especifications">
                <li>
                    <img class="icon" loading="lazy" src="build/img/icon_wc.svg" alt="icono wc">
                    <p><?php echo $property->wc; ?></p>
                </li>

                <li>
                    <img class="icon" loading="lazy" src="build/img/icon_parking.svg" alt="icono parking">
                    <p><?php echo $property->parking; ?></p>
                </li>

                <li>
                    <img class="icon" loading="lazy" src="build/img/icon_bedroom.svg" alt="icono dormitorio">
                    <p><?php echo $property->bedrooms; ?></p>
                </li>
            </ul>

            <a href="advertisement.php?id=<?php echo $property->id; ?>" class="yellow-button-block">Ver Propiedad</a>
        </div><!-- .advertisements-content-->
    </div><!-- .advertisements -->

    <?php } ?>
</div><!-- .container-advertisements-->
