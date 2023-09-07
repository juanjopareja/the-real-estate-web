<?php
    $start = false;
    include './includes/templates/header.php';
?>

    <main class="container section">
        <h1>Contacto</h1>

        <picture>
            <source srcset="build/img/outstanding3.webp" type="image/webp">
            <source srcset="build/img/outstanding3.jpg" type="image/jpeg">
            <img loading="lazy" src="build/img/outstanding3.jpg" alt="imagen de contacto">
        </picture>

        <h2>Completa el formulario de contacto</h2>

        <form class="form">
            <fieldset>
                <legend>Información Personal</legend>

                <label for="name">Nombre:</label>
                <input type="text" placeholder="Tu Nombre" id="name">
                
                <label for="email">E-mail:</label>
                <input type="email" placeholder="Tu Email" id="email">

                <label for="phone">Teléfono:</label>
                <input type="tel" placeholder="Tu teléfono" id="phone">

                <label for="message">Mensaje:</label>
                <textarea name="message" id="message" cols="30" rows="10"></textarea>
            </fieldset>

            <fieldset>
                <legend>Información sobre Propiedad</legend>

                <label for="options">Compra o Vende</label>
                <select name="options" id="options">
                    <option value="" disabled selected>-- Seleccione --</option>
                    <option value="buy">Compra</option>
                    <option value="sale">Vende</option>
                </select>

                <label for="budget">Precio o Presupuesto:</label>
                <input type="number" id="budget">
            </fieldset>

            <fieldset>
                <legend>Contacto</legend>

                <p>Como deseas ser contactado:</p>
                <div class="form-contact">
                    <label for="phone-contact">Teléfono</label>
                    <input name="contact" type="radio" value="phone" id="phone-contact">

                    <label for="email-contact">E-Mail</label>
                    <input name="contact" type="radio" value="email" id="email-contact">
                </div>

                <p>Si elegiste teléfono, selecciona la fecha y la hora</p>
                <label for="date">Fecha:</label>
                <input type="date" id="date">

                <label for="hour">Hora:</label>
                <input type="time" id="hour" min="09:00" max="18:00">
            </fieldset>

            <input type="submit" value="Enviar" class="green-button">
        </form>
    </main>

<?php
    include './includes/templates/footer.php';
?>