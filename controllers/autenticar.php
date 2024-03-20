<?php session_start();

include('db.php');

$email = $_POST['email'];
$password = sha1($_POST['password']);


$sql = "SELECT nombre, email, rol FROM usuarios WHERE email = '$email' AND password = '$password'";


$result = $connect->query($sql);

if ($result->num_rows > 0) {

    $fila = $result->fetch_assoc();

    $_SESSION['nombre'] = $fila['nombre'];
    $_SESSION['email'] = $fila['email'];
    $_SESSION['rol'] = $fila['rol'];

    header('Location:../index.php');

} else { ?>
    <p>Credenciales incorrectas</p>
    <meta http-equiv="refresh" content="3;url=../login.html">
<?php 
}
?>