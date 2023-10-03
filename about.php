<?php
    require 'includes/app.php';
    includeTemplate('header');
?>

    <main class="container section">
        <h1>Sobre Nosotros</h1>

        <div class="about-content">
            <div class="image">
                <picture>
                    <source srcset="build/img/about.webp" type="image/webp">
                    <source srcset="build/img/about.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/about.jpg" alt="imagen sobre nosotros">
                </picture>
            </div>

            <div class="about-text">
                <blockquote>
                    25 Años de experiencia
                </blockquote>

                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Suscipit reiciendis doloremque quia? Aliquid, veritatis odio aperiam consequatur possimus quae similique laboriosam animi cum quaerat sequi soluta libero, reprehenderit omnis mollitia!
                Harum eveniet, ex debitis, sequi voluptas sunt rerum numquam pariatur, repellendus iure perferendis. Exercitationem, et numquam pariatur reprehenderit aliquam a unde nostrum adipisci</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore labore enim, dicta non cumque odit provident ratione autem, aliquid, beatae eaque? Deserunt dicta consequatur, consequuntur velit pariatur ipsam quis nobis!</p>
            </div>
        </div>
    </main>

    <section class="container section">
        <h1>Más Sobre Nosotros</h1>

        <div class="icons-about">
            <div class="icon">
                <img src="build/img/icon1.svg" alt="icono seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis in doloribus sint dolor deleniti consequuntur</p>
            </div>

            <div class="icon">
                <img src="build/img/icon2.svg" alt="icono precio" loading="lazy">
                <h3>Precio</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis in doloribus sint dolor deleniti consequuntur</p>
            </div>

            <div class="icon">
                <img src="build/img/icon3.svg" alt="icono tiempo" loading="lazy">
                <h3>Tiempo</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis in doloribus sint dolor deleniti consequuntur</p>
            </div>
        </div>
    </section>

<?php
    includeTemplate('footer');
?>