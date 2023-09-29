<?php
    require 'includes/config/database.php';
    $db = connectDB();

    // User authentication
    $error = [];
                
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = mysqli_real_escape_string($db, filter_var( $_POST['email'], FILTER_VALIDATE_EMAIL ));
        $password = mysqli_real_escape_string($db, $_POST['password']);

        if(!$email) {
            $error[] = "El email es obligatorio o no es válido";
        }

        if(!$password) {
            $error[] = "El password es obligatorio";
        }
    }

    // Header include
    require 'includes/functions.php';
    includeTemplate('header');
?>

    <main class="container section center-content">
        <h1>Iniciar Sesión</h1>

        <?php 
            foreach($error as $e) { ?>
                <div class="alert error">
                    <?php echo $e; ?>
                </div>
        <?php } ?>

        <form method="POST" class="form" novalidate>
        <fieldset>
                <legend>Email y Password</legend>
                
                <label for="email">E-mail:</label>
                <input type="email" name="email" placeholder="Tu Email" id="email" required>

                <label for="password">Password:</label>
                <input type="password" name="password" placeholder="Tu password" id="password" required>
            </fieldset>

            <input type="submit" value="Iniciar Sesión" class="button green-button">
        </form>
    </main>

<?php
    includeTemplate('footer');
?>