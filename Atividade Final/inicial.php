<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela Inicial</title>
    <style>
        body{
            background-color: #ececec;
        }
       #pesquisabox{
        background-color: white;
        display: flex;
        align-items: center;
        width: 100%;
        height: 50px;
        border: none;
        box-shadow: 0px 5px 10px #9aa9bb;
       }
       #pesquisaelem{
        display: flex;
        width: 60%;
        justify-content: space-around;
       }
       button{
        border: none;
        width: 100px;
        height: 30px;
        background-color: #1c1d1f;
        color: white;
        font-weight: bold;
        cursor: pointer;
       }
       input{
        width: 220px;
       }
    </style>
</head>
<body>
    <main>
        <table class='tabela'>
        <form method="GET" action="pesquisa.php" >
            <div id="container">
                <h1 style="font-family: Verdana, Geneva, Tahoma, sans-serif;">Usuário</h1>
                
                
                <div id="pesquisabox">
                    <div id="pesquisaelem">
                        <input name="pesquisa" placeholder="Email" class="input" type="text">
                    <button class="btn-icon-content">Pesquisar</button>
                    </div>
                </div>
            </div>
        </form> 
            <tr>
                <th>Code</th>
                <th>Email</th>
                <th>Senha</th>
                <th>Ações</th>
            </tr>
            <?php
    include_once "conexao.php";
    session_start();
    
    if (isset($_SESSION['resultado'])) {
        $pesquisa = $_SESSION['resultado'];
        if (!empty($pesquisa)) {
            foreach ($pesquisa as $row) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['nome'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['senha'] . "</td>";
                echo "<td>" . $row['telefone'] . "</td>";
                echo "<td><a class='linkF ' href='edit.php?id=" . $row['id'] . "'><button  class='button E'>Edit</button></a> | <a class='linkF ' href='delete.php?id=" . $row['id'] . "'><button class='button D'>Delete</button></a></a></td>";
                echo "</tr>";
            }
        } else {
            echo "Nenhum usuário encontrado.";
        }
    } else {
        $resultado = recuperaALL();
        if (!empty($resultado)) {
            foreach ($resultado as $row) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['nome'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['senha'] . "</td>";
                echo "<td>" . $row['telefone'] . "</td>";
                echo "<td><a class='linkF ' href='edit.php?id=" . $row['id'] . "'><button  class='button E'>Edit</button></a> | <a class='linkF' href='delete.php?id=" . $row['id'] . "'><button class='button D'>Delete</button></a></td>";
                echo "</tr>";
            }
        } else {
            echo "Nenhum usuário encontrado.";
        }
    }
    ?>
        </table> 
    </main>
</body>
</html>