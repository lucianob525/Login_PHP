<?php
    session_start();

    if(isset($_POST['email']) && empty($_POST['email'])==false){
        $email = addslashes($_POST['email']);
        $senha = md5(addslashes($_POST['senha']));
        
        $dsn = "mysql:dbname=blog; host=localhost";
        $dbuser = "root";
        $dbpass = "";

        try {
            $con = new PDO($dsn, $dbuser,$dbpass);

            $sql = $con->query("SELECT * FROM usuarios WHERE email='$email' AND senha = '$senha'");
            if($sql->rowCount()>0){
                $dado = $sql->fetch();
                $_SESSION['id'] = $dado['id'];

                header("Location: index.php");
            }
            else{
                print_r("ERRO");
            }
        } catch (PDOException $e){
            echo "Falhou: ".$e->getMessage();
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

</head>
<body>
    <div class="container" style="padding-top: 100px;">
        <div class="row">
        <div class="col-sm-6">
        <h2>Login</h2>

        <form method="POST">
            <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" class="form-control" /><br><br>
            </div>

            <div class="form-group">
            <label for="senha">Senha:</label>
            <input type="password" name="senha" class="form-control" /><br><br>
            </div>
           
            <input type="submit" value="Entrar" class="btn btn-primary" />
        </form>
        </div>
        </div>
    </div>
</body>
</html>
