<?php
session_start();
require_once 'php/main.php';

//$conexion = new DB;
$MiConexion = conexion();
//$sql = "SELECT * FROM usuario WHERE usuario_id=? AND token_password=?";

try {
    $stmt = $MiConexion->prepare("SELECT * FROM usuario WHERE usuario_id=? AND token_password=?");
    $userid = $_GET['id'];
    $token_User = $_GET['token'];
    
    $stmt->bindParam(1,$userid);
    $stmt->bindParam(2,$token_User);

    $stmt->execute();

    $data = $stmt->fetchAll(PDO::FETCH_OBJ);

} catch (\Throwable $th) {
    echo $th->getMessage();
}finally{
    $Miconexion->closeDataBase();
}

if($data AND $data[0]->expired_session<time()){
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Cambiar Contraseña</title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center aling-items-center vh-100">
            <div class="card">
                <div class="card-header bg bg-primary">
                    <p class="h4 text-white">Reset</p>
                </div>

                <form action="index.php" method="POST">
                    <div class="card-body">

                        <?php
                        if (isset($_SESSION['error'])) :
                        ?>
                            <div class="alert alert-danger">
                                <?php echo $_SESSION['error']; ?>
                            </div>
                        <?php unset($_SESSION['error']);
                        endif; ?>

                        <div class="form-group">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password_confirm" class="form-label">Confirmar Password</label>
                            <input type="password_confirm" name="password_confirm" id="password_confirm" class="form-control">
                        </div>

                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary" name="save">Guardar</button>
                        <button type="reset" class="btn btn-danger">Cancelar</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>

</html>
<?php 
}else{
    header("location:cambiar_password.php"); 
}
 ?>