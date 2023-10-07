<fieldset>
    <legend>Información General</legend>

    <label for="title">Título:</label>
    <input type="text" id="title" name="property[title]" placeholder="Título Propiedad" value="<?php echo sanitizer($property->title); ?>">

    <label for="price">Precio:</label>
    <input type="number" id="price" name="property[price]" placeholder="Precio Propiedad" value="<?php echo sanitizer($property->price); ?>">

    <label for="image">Imagen:</label>
    <input type="file" id="image" name="property[image]" accept="image/jpeg, image/png">

    <?php if($property->image) { ?>
        <img src="../../images/<?php echo $property->image ?>" class="small-image">
    <?php } ?>

    <label for="description">Descripción:</label>
    <textarea id="description" name="property[description]"><?php echo sanitizer($property->description); ?></textarea>
</fieldset>

<fieldset>
    <legend>Información Propiedad</legend>

    <label for="bedrooms">Habitaciones:</label>
    <input type="number" id="bedrooms" name="property[bedrooms]" placeholder="Ej: 3" min="1" max="9" value="<?php echo sanitizer($property->bedrooms); ?>">

    <label for="wc">Baños:</label>
    <input type="number" id="wc" name="property[wc]" placeholder="Ej: 2" min="1" max="9" value="<?php echo sanitizer($property->wc); ?>">

    <label for="parking">Parking:</label>
    <input type="number" id="parking" name="property[parking]" placeholder="Ej: 1" min="1" max="9" value="<?php echo sanitizer($property->parking); ?>">
</fieldset>

<fieldset>
    <legend>Vendedor</legend>

    <label for="seller">Vendedor</label>
    <select name="property[sellers_id]" id="seller">
        <option selectedv value="">-- Selecciona --</option>
        <?php foreach($sellers as $seller) { ?>
            <option 
                <?php echo $property->sellers_id === $seller->id ? 'selected' : ''; ?>
                value="<?php echo sanitizer($seller->id); ?>"> <?php echo sanitizer($seller->name) . " " . sanitizer($seller->lastname); ?> </option>
        <?php } ?>
    </select>
</fieldset>