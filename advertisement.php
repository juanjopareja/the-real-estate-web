<?php
    $start = false;
    include './includes/templates/header.php';
?>

    <main class="container section center-content">
        <h1>Casa en Venta frente al bosque</h1>

        <picture>
            <source srcset="build/img/outstanding.webp" type="image/webp">
            <source srcset="build/img/outstanding.jpg" type="image/jpeg">
            <img loading="lazy" src="build/img/outstanding.jpg" alt="imagen destacada">
        </picture>

        <div class="property-summary">
            <p class="price">3.000.000 €</p>

            <ul class="icons-especifications icons-align">
                <li>
                    <img class="icon" loading="lazy" src="build/img/icon_wc.svg" alt="icono wc">
                    <p>3</p>
                </li>

                <li>
                    <img class="icon" loading="lazy" src="build/img/icon_parking.svg" alt="icono parking">
                    <p>3</p>
                </li>

                <li>
                    <img class="icon" loading="lazy" src="build/img/icon_bedroom.svg" alt="icono dormitorio">
                    <p>4</p>
                </li>
            </ul>

            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit accusantium accusamus, hic delectus, ex veniam dolorem et distinctio beatae eaque iure consequuntur laudantium quia? Nihil quod ea voluptatibus facilis laudantium.
            Et beatae veniam ipsum laborum libero. In ab quis cum, rerum impedit sunt voluptates praesentium voluptatem et neque ut ea sapiente deleniti voluptatibus quod ullam facilis quas recusandae. Quidem, expedita.
            Cumque eius adipisci nulla quisquam eum iure quod blanditiis impedit. Velit aliquam ad enim aut incidunt nisi adipisci qui autem blanditiis beatae a sequi soluta, tempora doloremque iure, aspernatur dignissimos.
            Quos soluta hic, doloremque voluptas recusandae ea aut ipsam blanditiis! Exercitationem facere quidem nostrum numquam labore soluta laudantium possimus non, voluptatum ipsum temporibus odit neque itaque veniam vero eius quasi!</p>
        </div>
    </main>

    <footer class="footer section">
        <div class="container footer-content">
            <nav class="navigation">
                <a href="about.html">Nosotros</a>
                <a href="advertisements.html">Anuncios</a>
                <a href="blog.html">Blog</a>
                <a href="contact.html">Contacto</a>
            </nav>
        </div>

        <p class="copyright">Todos los derechos reservados 2023 &copy;</p>
    </footer>

    <script src="build/js/bundle.min.js"></script>
</body>
</html>