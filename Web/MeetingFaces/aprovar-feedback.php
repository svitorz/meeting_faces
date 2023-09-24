<?php 
session_start();

require 'logica.php';

//Função responsável por permitir apenas que administradores tenham acesso aos feedbacks
if(!isAdmin()){
    $_SESSION['restrito'] = true;
    redireciona();
    die();
}
//aprovação é o tipo de aprovação, ex: 'aprovado', 'reprovado' ou 'em análise'. 
$aprovacao = filter_input(INPUT_POST, 'aprovacao', FILTER_SANITIZE_NUMBER_INT);
//Id da descrição
$id = filter_input(INPUT_POST,'id',FILTER_SANITIZE_NUMBER_INT);
//O texto da descrição
$descricao = filter_input(INPUT_POST,'descricao',FILTER_SANITIZE_SPECIAL_CHARS);
/**
 * As informações vem via post e via form pois antes elas eram trocadas de tabela,
 * atualmente apenas é alterado um atributo dentro da mesma tabela, mas o codigo
 * foi mantido por uma questão de segurança.
 */

//conexão com o banco
require 'conexao/conexao.php';


//verifica se a aprovação e o id da descrição estão setados
if(isset($aprovacao)&&isset($id)){
    //verifica se a aprovação é igual a dois
    if($aprovacao==2){
        //caso a condição seja verdadeira, a descrição recebe o valor 'reprovado' dentro da coluna SITUAÇÃO
        $sql = "UPDATE descricao SET SITUACAO = 'REPROVADO' WHERE id_descricao = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
    }elseif($aprovacao==3){
        //Verifica se a aprovação é igual a 3, caso a condição seja verdadeira, 
        // a descrição recebe o valor 'aprovado' dentro da coluna SITUAÇÃO
        $sql = "UPDATE descricao SET SITUACAO = 'APROVADO' WHERE id_descricao = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
    }
    $result = $stmt->rowCount();
    //caso o número de colunas alterado seja maior que 0,
    //é entendido que a alteração foi feita com sucesso
    //Então o usuário é retornado para a página de listagem de feedbacks
    //e a session de sucesso é verdadeira, para que a mensagem de sucesso seja exibida
    if($result>0){
        $_SESSION['sucesso'] = true;
        header('Location: listagem-feedback.php');
        exit();
    }   
}