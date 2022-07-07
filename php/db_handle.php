<?php

// Variables de conexión a la base de datos
$db_name = 'amigaapp02';
$db_username = 'root';
$db_password = '';
$db_hostname = '127.0.0.1';
$db_port = '3306';

//Funcion para mirar si la conexion fue exitosa
$connection = mysqli_connect($db_hostname, $db_username, $db_password, $db_name, $db_port);

//Para modificación del alfabeto latino
mysqli_set_charset($connection, "utf8");

/**
 * Funcion para registrar usuarios nuevos en la base de datos
 * 
 */
function register($username, $lastname, $email, $password) {
    global $connection;
    if (user_exists($email)){
        show_alert('El correo ya se encuentra registrado');
        header("Location: http://localhost/Amigaap-v0.2/pages/register.html");
        exit();
    }
    else {
        $query = 'INSERT INTO usuarios (nombre_usuario, apellido_usuario, correo_usuario, password_usuario)
                  VALUES ("'.$username.'","'.$lastname.'", "'.$email.'", "'.$password.'");';
        mysqli_query($connection, $query);
        show_alert(mysqli_insert_id($connection));
        header("Location: http://localhost/Amigaap-v0.2/pages/login.html");
        exit();
    }
}

/**
 * Función para validar si un correo ya se encuentra registrado en la base de datos
 */
function user_exists($email) {
    global $connection;
    $query = 'SELECT correo_usuario FROM usuarios WHERE correo_usuario = "' . $email . '";';
    $result = mysqli_query($connection, $query);
    //mysqli_fetch_assoc sirve para devolver un arreglo con los resultados obtenidos del mysqli
    if (mysqli_fetch_assoc($result)) {
        return true;
    }
    else {
        return false;
    }
}

/**
 * Funcion para mostrar mensajes en un alert
 */
function show_alert($message) {
    echo '<script> alert("' . $message . '");</script>';
}

/**
 * Funcion para loguearse
 */
function login($user_email, $user_password){
    if (user_exists($user_email)){
        validate_password($user_email, $user_password);
    }
}

/**
 * Funcion encargada de validar que la contraseña es la correcta
 */
function validate_password($user_email, $user_password) {
    global $connection;
    $query = 'SELECT * FROM usuarios WHERE correo_usuario = "'. $user_email . '";';
    $result = mysqli_query($connection, $query);
    $user = mysqli_fetch_assoc($result);
    if ($user && $user['password_usuario'] == $user_password) {
        header("Location: http://localhost/Amigaap-v0.2/pages/home.html");
        exit();
    }
    else {
        show_alert('Verificar los datos ingresados, correo o contraseña incorrectos!');
        header("Location: http://localhost/Amigaap-v0.2/pages/login.html");
        exit();
    }
}
