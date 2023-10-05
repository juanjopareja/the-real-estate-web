<fieldset>
    <legend>Información General</legend>

    <label for="title">Título:</label>
    <input type="text" id="title" name="title" placeholder="Título Propiedad" value="<?php echo sanitizer($property->title); ?>">

    <label for="price">Precio:</label>
    <input type="number" id="price" name="price" placeholder="Precio Propiedad" value="<?php echo sanitizer($property->price); ?>">

    <label for="image">Imagen:</label>
    <input type="file" id="image" name="image" accept="image/jpeg, image/png">

    <label for="description">Descripción:</label>
    <textarea id="description" name="description"><?php echo sanitizer($property->description); ?></textarea>
</fieldset>

<fieldset>
    <legend>Información Propiedad</legend>

    <label for="bedrooms">Habitaciones:</label>
    <input type="number" id="bedrooms" name="bedrooms" placeholder="Ej: 3" min="1" max="9" value="<?php echo sanitizer($property->bedrooms); ?>">

    <label for="wc">Baños:</label>
    <input type="number" id="wc" name="wc" placeholder="Ej: 2" min="1" max="9" value="<?php echo sanitizer($property->wc); ?>">

    <label for="parking">Parking:</label>
    <input type="number" id="parking" name="parking" placeholder="Ej: 1" min="1" max="9" value="<?php echo sanitizer($property->parking); ?>">
</fieldset>

<fieldset>
    <legend>Vendedor</legend>

    <select name="sellers_id">
        <option value="">-- Selecciona --</option>
        <?php while($seller = mysqli_fetch_assoc($result_seller)) {?>
            <option <?php echo $seller_id === $seller['id'] ? 'selected' : ''; ?> value="<?php echo sanitizer($property->seller); ?>"> <?php echo $seller['name'] . " " . $seller['lastname']; ?></option>
        <?php } ?>
        
    </select>
</fieldset>