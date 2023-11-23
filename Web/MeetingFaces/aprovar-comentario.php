<?php 
session_start();

require 'logica.php';

//Função responsável por permitir apenas que administradores tenham acesso as comentários
if(!isAdmin()){
    $_SESSION['restrito'] = true;
    redireciona();
    die();
}

echo '<pre>';
print_r($_POST);
echo '</pre>';

//aprovação é o tipo de aprovação, ex: 'aprovado', 'reprovado' ou 'em análise'. 
$aprovacao = filter_input(INPUT_POST, 'aprovacao', FILTER_SANITIZE_NUMBER_INT);
//Id da Comentário
$id = filter_input(INPUT_POST, 'id' ,FILTER_SANITIZE_NUMBER_INT);
//O texto da Comentário

//conexão com o banco
require 'conexao/conexao.php';


//verifica se a aprovação e o id da Comentário estão setados
if(isset($aprovacao)&&isset($id)){
    //verifica se a aprovação é igual a dois
    if($aprovacao==2){
        //caso a condição seja verdadeira, a Comentário recebe o valor 'reprovado' dentro da coluna SITUAÇÃO
        $sql = "UPDATE comentarios SET SITUACAO = 'REPROVADO' WHERE id_descricao = ?;";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
    }elseif($aprovacao==3){
        //Verifica se a aprovação é igual a 3, caso a condição seja verdadeira, 
        // a Comentário recebe o valor 'aprovado' dentro da coluna SITUAÇÃO
        $sql = "UPDATE comentarios SET SITUACAO = 'APROVADO' WHERE id_descricao = ?;";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
    }
    $result = $stmt->rowCount();
    //caso o número de colunas alterado seja maior que 0,
    //é entendido que a alteração foi feita com sucesso
    //Então o usuário é retornado para a página de listagem de comentários
    //e a session de sucesso é verdadeira, para que a mensagem de sucesso seja exibida
    if($result>0){
        $_SESSION['sucesso'] = true;
    }   
}
redireciona('listagem-comentario.php');