<?php

function conectaBD(){
    $usuario = 'root';
    $senha = 'aluno';
    $database = 'banco';
    $host = 'localhost';

    $con=new PDO("mysql:host=$host;dbname=$database","$usuario","$senha");

    return $con;

}

function editarUsuario($id,$nome,$email,$senha,$telefone){
    try {
    $con = conectaBD();
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE Usuario SET nome=?, email=?, senha=?, telefone=? WHERE id=?";
    $stm = $con->prepare($sql);
    $stm->bindParam(1, $nome);
    $stm->bindParam(2, $email);
    $stm->bindParam(3, $senha);
    $stm->bindParam(4, $telefone);
    $stm->bindParam(5, $id);
    $stm->execute();
} catch (PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}
}

function insereUsuario($nome,$email,$senha,$telefone){
    try{
    $con=conectaBD();
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql="INSERT INTO Usuario(nome,email,senha,telefone) VALUES (?,?,?,?)";
    $stm=$con->prepare($sql);
    $stm->bindParam(1, $nome);
    $stm->bindParam(2, $email);
    $stm->bindParam(3, $senha);
    $stm->bindParam(4, $telefone);
    $stm->execute();
    } catch(PDOException $e){
        echo 'ERRO: '.$e->getMessage();
    }
    return $con->lastInsertId();
}

function recuperaUsuario($id) {
    $con = conectaBD();
    $sql = "SELECT * FROM Usuario WHERE id = ?";
    $stm = $con->prepare($sql);
    $stm->bindParam(1, $id);
    
    try {
        $stm->execute();
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        if ($result && count($result) > 0) {
            return $result[0];
        } else {
            return null; 
        }
    } catch (PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
        return null;
    }
}

function recuperaAll(){
    $con=conectaBD();
    $sql="SELECT * FROM Usuario";
    $stm=$con->prepare($sql);

    $stm->execute();
    $result=$stm->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function verificaLoginSenha($email, $senha) {
    $con=conectaBD();
   
    $sql = "SELECT * FROM Usuario WHERE email = ? AND senha = ?";
    $stm= $con->prepare($sql);
    $stm->bindParam(1,$email);
    $stm->bindParam(2,$senha);
    $stm->execute();
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
    
   
    if (count($result) > 0) {
        header('Location: inicial.php');
    } else {
        echo "<script>alert('Credenciais incorretas ou inexistentes!');</script>";
    }
}

function deletarUsuario($id){
    $con=conectaBD();
    $sql="DELETE FROM Usuario WHERE id=?";
    try {
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stm=$con->prepare($sql);
        $stm->bindParam(1,$id);
        $stm->execute();
    } catch (PDOException $e) {
        echo 'ERRO:' .$e->getMessage();
    }
}

?>