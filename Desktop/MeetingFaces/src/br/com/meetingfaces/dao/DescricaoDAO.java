package br.com.meetingfaces.dao;

/**
 *
 * @author Vitor
 */
import br.com.meetingfaces.dto.DescricaoDTO;
import java.sql.ResultSet;
import java.sql.Statement;

public class DescricaoDAO {

    DescricaoDTO descricaoDTO = new DescricaoDTO();

    /**
     * Método construtor
     *
     */
    public DescricaoDAO() {
    }

    //Atributo do tipo ResultSet utilizado para realizar consultas
    private ResultSet rs = null;
    //Manipular o banco de dados
    private Statement stmt = null;

    /**
     * Método responsável por selecionar as descrições que necessitam de
     * aprovação
     *
     * @return ResultSet
     */
    public ResultSet descricaoDisp() {
        try {
            //Chama o metodo que esta na classe ConexaoDAO para abrir o banco de dados
            ConexaoDAO.ConectDB();
            //Cria o Statement que responsavel por executar alguma coisa no banco de dados
            stmt = ConexaoDAO.con.createStatement();
            //Comando SQL que sera executado no banco de dados
            String comando = "";

            comando = "SELECT COMENTARIOS.COMENTARIO,COMENTARIOS.ID_DESCRICAO,USUARIOS.PRIMEIRO_NOME AS PRIMEIRO_NOME_USUARIO,\n"
                    + "	MORADORES.PRIMEIRO_NOME AS PRIMEIRO_NOME_MORADOR \n"
                    + "		FROM COMENTARIOS \n"
                    + "				INNER JOIN USUARIOS ON\n"
                    + "				COMENTARIOS.ID_USUARIO=USUARIOS.ID_USUARIO\n"
                    + "					LEFT JOIN MORADORES ON\n"
                    + "						COMENTARIOS.ID_MORADOR=MORADORES.ID_MORADOR\n"
                    + "							WHERE COMENTARIOS.situacao='Em análise';";

            System.out.println(comando);
            rs = stmt.executeQuery(comando);
            return rs;
        } catch (Exception e) {
            System.out.println(e.getMessage());
            return rs;
        }//fecha catch
    }//fecha método

    /*
    * Método responsável por atualizar a situação das descrições
    * @param opcao (para cada tipo de validação)
    * return bool
     */
    public boolean autorizarDesc(DescricaoDTO descricaoDTO, int opcao) {
        try {
            //Chama o metodo que esta na classe ConexaoDAO para abrir o banco de dados
            ConexaoDAO.ConectDB();
            //Cria o Statement que responsavel por executar alguma coisa no banco de dados
            stmt = ConexaoDAO.con.createStatement();
            //Comando SQL que sera executado no banco de dados
            String comando = "";

            switch (opcao) {
                case 1: //Pesquisa por nome
                    comando = "UPDATE COMENTARIOS SET situacao = 'APROVADO' WHERE id_descricao = "
                            + descricaoDTO.getId_descricao() + ";";
                    break;

                case 2: //Pesquisa por id
                    comando = "UPDATE COMENTARIOS SET situacao = 'REPROVADO' WHERE id_descricao = "
                            + descricaoDTO.getId_descricao() + ";";

            }//fecha switch opcao
            //Executa o comando SQL no banco de Dados
            stmt.execute(comando);
            ConexaoDAO.con.commit();
            //Fecha o statement
            System.out.println(comando);
            stmt.close();
            return true;
        } //Caso tenha algum erro no codigo acima é enviado uma mensagem no console com o que esta acontecendo.
        catch (Exception e) {
            System.out.println("Erro DescricaoDAO" + e.getMessage());
            return false;
        } //Independente de dar erro ou não ele vai fechar o banco de dados.
        finally {
            //Chama o metodo da classe ConexaoDAO para fechar o banco de dados
            ConexaoDAO.CloseDB();
        }
    }//fecha método

}//fecha classe
