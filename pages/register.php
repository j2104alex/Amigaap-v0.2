<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootsrap library (local) -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- CSS general -->
    <link rel="stylesheet" href="../css/styles.css">
    <!-- CSS actual page -->
    <link rel="stylesheet" href="../css/register.css">
    <title>Ruta AmigaApp</title>
</head>

<body>
    <!-- Navegation bar -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-orange">
        <div class="container-fluid">
            <a class="navbar-brand" href="../index.html">Ruta AmigaApp</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./register.php">Registro</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./login.php">Ingresar</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <main>
        <article class="principal-container">

            <article class="form-container">
                <section class="mid-container">
                    <article class="logo-container">
                        <img src="../assets/img/logo.png" alt="logo" class="responsive">
                    </article>
                </section>
                <section class="mid-container">
                    <header>
                        <h1 class="principal-title">Registro</h1>
                    </header>
                    <form action="../php/register.php" method="POST" onsubmit="validateRegister(event)">
                        <input class="input" type="text" id="username" name="username" placeholder="Nombre" required/>
                        <input class="input" type="text" id="lastname" name="lastname" placeholder="Apellido" required/>
                        <input class="input" type="text" id="email" name="email" placeholder="Correo" required/>
                        <input class="input" type="password" id="password" name="password" placeholder="Contraseña" required/>
                        <input class="input" type="password" id="confirm-password" name="confirm-password" placeholder="Confirmar Contraseña" required/>
                        <label class="terms-container"><input type="checkbox" id="cbox1" value="checkbox"> Aceptar
                            términos y
                            condiciones</label>
                        <input class="my-btn-primary" type="submit" id="ingresar" name="ingresar" value="Registrar">
                        <?php
                        //Show error message
                        if (isset($_GET['error'])) {
                            echo '<span style="color:red">'.$_GET['error'].'</span>';
                        }
                        ?>
                        <label class="log-in">Si ya tienes cuenta ingresa <a href="./login.php">aquí</a> </label>
                    </form>
                </section>


            </article>

        </article>
        </article>
    </main>
    <!-- JS bootstrap's library (local) -->
    <script src="../js/bootstrap.min.js"></script>
    <!-- Form validation-->
    <script src="../js/validators.js"></script>
    <script src="../js/registerValidators.js"></script>
   

</body>

</html>