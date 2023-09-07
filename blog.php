<?php
    $start = false;
    include './includes/templates/header.php';
?>

    <main class="container section center-content">
        <h1>Nuestro Blog</h1>

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

        <article class="blog-entry">
            <div class="image">
                <picture>
                    <source srcset="build/img/blog3.webp" type="image/webp">
                    <source srcset="build/img/blog3.jpg" type="image/jpeg">
                    <img src="build/img/blog3.jpg" alt="texto entrada blog">
                </picture>
            </div>

            <div class="text-entry">
                <a href="entry.html">
                    <h4>Diseño y decoración de interiores</h4>
                    <p>Escrito el: <span>18/10/2023</span> por: <span>Admin</span></p>
                    <p>Tips y consejos para diseñar el espacio interior de una estancia y amueblarlo a tu gusto</p>
                </a>
            </div>
        </article>

        <article class="blog-entry">
            <div class="image">
                <picture>
                    <source srcset="build/img/blog4.webp" type="image/webp">
                    <source srcset="build/img/blog4.jpg" type="image/jpeg">
                    <img src="build/img/blog4.jpg" alt="texto entrada blog">
                </picture>
            </div>

            <div class="text-entry">
                <a href="entry.html">
                    <h4>Iluminación en interiores</h4>
                    <p>Escrito el: <span>15/10/2023</span> por: <span>Admin</span></p>
                    <p>Aprende a iluminar correctamente una estancia y crea una ambientación luminosa acorde a tu tipología</p>
                </a>
            </div>
        </article>
    </main>

<?php
    include './includes/templates/footer.php';
?>