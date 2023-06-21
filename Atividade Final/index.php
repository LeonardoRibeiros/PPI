<?php
 include('conexao.php');

if(isset($_POST['email']) || isset($_POST['senha'])){
    
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if(strlen($email) == 0 && strlen($senha) == 0){
    }else if(strlen($email) == 0){
        echo "<script>alert('ERRO! O campo Email esta vazio.');</script>";
    } else if(strlen($senha) == 0){
        echo "<script>alert('ERRO! O campo Senha esta vazio.');</script>";
    }else{
          verificaLoginSenha($email, $senha);
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body{
            background-color: #ececec;
            height: 90vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
       button{
        border: none;
        width: 150px;
        height: 40px;
        background-color: #1c1d1f;
        color: white;
        font-weight: bold;
        cursor: pointer;
        border-radius: 6px;
       }
       #container{
            background-color: white;
            padding: 25px;
            width: 400px;
            height: 300px;
            border: none;
            box-shadow: 0px 10px 20px #4c5c6e;
            border-radius: 15px;
       }
       #cabecalho{
        display: flex;
        justify-content: center;
        align-items: center;
        height: 50px;
        background-color: #1c1d1f;
        border-radius: 15px;
       }
       #campos{
            
            display: flex;
            flex-direction: column;
            flex-wrap: wrap;
        }
        input{
            border-radius: 6px;
            height: 40px;
            box-shadow: 0px 5px 15px #4c5c6e;
            border: none;
        }
        #botao{
            height: 10vh;
            display: flex;
            align-items: end;
            justify-content: space-around;
        }
    </style>
</head>
<body>
    <div id="container">
        <div id="cabecalho">
            <h1 style="font-family: Verdana, Geneva, Tahoma, sans-serif; color: white;">LOG IN</h1>
        </div>
        <br>
        <form action="" method="POST">
            <div id="campos">
                <BR></BR>
                <input type="text" name="email" placeholder="Email..." > 
                <br>
                <input type="password" name="senha" placeholder="Senha..." > 
                <br>
            
            </div>
            <div id="botao">
                <a id="sign" href="cadastro.php" style="font-family: Verdana, Geneva, Tahoma, sans-serif;">Registrar-se</a>
                <button type="submit">Cadastrar</button>
            </div>
        </form>
    </div>
</body>
</html>