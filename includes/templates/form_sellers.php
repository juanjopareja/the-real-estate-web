<fieldset>
    <legend>Información General</legend>
    
    <label for="name">Nombre:</label>
    <input type="text" id="name" name="sellers[name]" placeholder="Nombre Vendedor/a" value="<?php echo sanitizer($seller->name); ?>">

    <label for="name">Apellido:</label>
    <input type="text" id="lastname" name="seller[lastname]" placeholder="Apellido Vendedor/a" value="<?php echo sanitizer($seller->lastname); ?>">
</fieldset>

<fieldset>
    <legend>Información Extra</legend>

    <label for="phone">Teléfono:</label>
    <input type="text" id="phone" name="seller[phone]" placeholder="Teléfono Vendedor/a" value="<?php echo sanitizer($seller->phone); ?>">
</fieldset>
    
