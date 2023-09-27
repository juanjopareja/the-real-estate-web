<?php
    require 'includes/functions.php';
    includeTemplate('header', $start = true);
?>

    <main class="container section">
        <h1>Más sobre Nosotros</h1>

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
    </main>

    <section class="section container">
        <h2>Casas y Apartamentos en Venta</h2>

        <?php
            $limit = 3; 
            include 'includes/templates/advertisements.php';
        ?>

        <div class="right-align">
            <a href="advertisements.html" class="green-button">Ver Todas</a>
        </div>
    </section>

    <section class="contact-image">
        <h2>Encuentra la casa de tus sueños</h2>
        <p>Completa el formulario y un asesor se pondrá en contacto contigo al instante</p>
        <a href="contact.html" class="yellow-button">Contáctanos</a>
    </section>

    <div class="container section lower-section">
        <section class="blog">
            <h3>Nuestro Blog</h3>

            <article class="blog-entry">
                <div class="image">
                    <picture>
                        <source srcset="build/img/blog1.webp" type="image/webp">
                        <source srcset="build/img/blog1.jpg" type="image/jpeg">
                        <img src="build/img/blog1.jpg" alt="texto entrada blog">
                    </picture>
                </div>

                <div class="text-entry">
                    <a href="entry.html">
                        <h4>Terraza en el tejado de tu casa</h4>
                        <p>Escrito el: <span>20/10/2023</span> por: <span>Admin</span></p>
                        <p>Consejos para construir una terraza en el tejado de tu casa con materiales ahorrando dinero</p>
                    </a>
                </div>
            </article>

            <article class="blog-entry">
                <div class="image">
                    <picture>
                        <source srcset="build/img/blog2.webp" type="image/webp">
                        <source srcset="build/img/blog2.jpg" type="image/jpeg">
                        <img src="build/img/blog2.jpg" alt="texto entrada blog">
                    </picture>
                </div>

                <div class="text-entry">
                    <a href="entry.html">
                        <h4>Guía para la decoración de tu hogar</h4>
                        <p>Escrito el: <span>20/10/2023</span> por: <span>Admin</span></p>
                        <p>Maximiza el espacio en tu hogar con esta guia, aprende a combinar muebles y colores para darle vida a tu espacio</p>
                    </a>
                </div>
            </article>
        </section>

        <section class="comments">
            <h3>Opiniones</h3>

            <div class="comment">
                <blockquote>
                    Personal muy amable y de trato agradable, muy buena atención. La casa que me ofrecieron cumple con todas mis expectativas.
                </blockquote>

                <p> - Juanjo Pareja</p>
            </div>
        </section>
    </div>

<?php
    includeTemplate('footer');
?>
