<?php
    require '../../includes/functions.php';
    includeTemplate('header');
?>

    <main class="container section">
        <h1>Crear</h1>

        <a href="../index.php" class="button green-button">Volver</a>

        <form class="form">
            <fieldset>
                <legend>Información General</legend>

                <label for="title">Título:</label>
                <input type="text" id="title" placeholder="Título Propiedad">

                <label for="price">Precio:</label>
                <input type="number" id="price" placeholder="Precio Propiedad">

                <label for="image">Imagen:</label>
                <input type="file" id="image" accept="image/jpeg, image/png">

                <label for="description">Descripción:</label>
                <textarea id="description"></textarea>
            </fieldset>

            <fieldset>
                <legend>Información Propiedad</legend>

                <label for="bedrooms">Habitaciones:</label>
                <input type="number" id="bedrooms" placeholder="Ej: 3" min="1" max="9">

                <label for="bathrooms">Baños:</label>
                <input type="number" id="bathrooms" placeholder="Ej: 2" min="1" max="9">

                <label for="parking">Parking:</label>
                <input type="number" id="parking" placeholder="Ej: 1" min="1" max="9">
            </fieldset>

            <fieldset>
                <legend>Vendedor</legend>

                <select>
                    <option value="1">Juanjo</option>
                    <option value="2">Sara</option>
                </select>
            </fieldset>

            <input type="submit" value="Crear Propiedad" class="button green-button">
        </form>
    </main>

<?php
    includeTemplate('footer');
?>