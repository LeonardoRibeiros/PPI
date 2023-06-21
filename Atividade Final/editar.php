<?php 

include('conexao.php');


if(isset($_POST['nome']) || isset($_POST['email']) || isset($_POST['senha']) || isset($_POST['telefone']) || isset($_POST['id'])){
    
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $telefone = $_POST['telefone'];

    if(strlen($nome) == 0 && strlen($email) == 0 && strlen($senha) == 0 && strlen($telefone) == 0){
    }else if(strlen($nome) == 0){
        echo "<script>alert('ERRO! O campo Nome esta vazio.');</script>";
    } else if(strlen($email) == 0){
        echo "<script>alert('ERRO! O campo Email esta vazio.');</script>";
    } else if(strlen($senha) == 0){
        echo "<script>alert('ERRO! O campo Senha esta vazio.');</script>";
    } else if(strlen($telefone) == 0){
        echo "<script>alert('ERRO! O campo Telefone esta vazio.');</script>";
    }else{
          editarUsuario($id,$nome,$email,$senha,$telefone);
          header('Location: inicial.php');
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
    <style>
        body{
            background-color: #ececec;
            height: 90vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
       #bttn{
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
            height: 350px;
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
            height: 30px;
            box-shadow: 0px 5px 15px #4c5c6e;
            border: none;
        }
        #botao{
            height: 15vh;
            display: flex;
            align-items: end;
            justify-content: right;
        }
    </style>
</head>
<body>
<?php

$id = $_POST['id'];
echo($id);
$usuario = recuperaUsuario($id);
var_dump($usuario);
if ($usuario) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $telefone = $_POST['telefone'];
}
?>



    <div id="container">
        <div id="cabecalho">
            <h1 style="font-family: Verdana, Geneva, Tahoma, sans-serif; color: white;">Editar</h1>
        </div>
        <br>
        <form action="" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div id="campos">
                <input type="text" name="nome" placeholder="Nome Completo..." value='<?php echo $nome; ?>' required=""/> 
                <br>
                <input type="text" name="email" placeholder="Email..." value='<?php echo $email; ?>' required=""/> 
                <br>
                <input type="password" name="senha" placeholder="Senha..." value='<?php echo $senha; ?>' required=""/> 
                <br>
                <input type="text" name="telefone" placeholder="Telefone..." value='<?php echo $telefone; ?>' required=""/> 
            </div>
            <div id="botao">
                <input id="bttn" type='submit' value='Confirmar' class='btn'> 
            </div>
        </form>
    </div>
</body>
</html>