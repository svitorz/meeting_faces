package br.com.meetingfaces.dao;

import br.com.meetingfaces.dto.AdministradorDTO;
import br.com.meetingfaces.dto.MoradoresDTO;
import java.sql.ResultSet;
import java.sql.Statement;
import br.com.meetingfaces.dto.AdministradorDTO;

public class MoradoresDAO {

    public MoradoresDAO() {
    }

    //Atributo do tipo ResultSet utilizado para realizar consultas
    private ResultSet rs = null;
    //Manipular o banco de dados
    private Statement stmt = null;

    /* Método para inserir morador
     *
     * @param mroadorDTO,administradorDTO que vem da classe moradorDTO
     * @return Um boolean
     */
    public boolean inserirMorador(MoradoresDTO moradoresDTO, AdministradorDTO administradorDTO) {
        String comando = "";
        int id_morador = 0;
        try {
            //Inicia a conexão
            ConexaoDAO.ConectDB();
            //Criar um statement
            stmt = ConexaoDAO.con.createStatement();
            //Criando a query
            comando = "INSERT INTO MORADORES(primeiro_nome, segundo_nome, cidade_atual,"
                    + "cidade_natal,data_nasc, nome_familiar_proximo, grau_parentesco, id_administrador) VALUES ("
                    + "'" + moradoresDTO.getPrimeiro_nome() + "', "
                    + "'" + moradoresDTO.getSegundo_nome() + "', "
                    + "'" + moradoresDTO.getCidade_atual() + "', "
                    + "'" + moradoresDTO.getCidade_natal() + "', "
                    + " " + moradoresDTO.getData_nasc() + " , "
                    + "'" + moradoresDTO.getNome_familiar_proximo() + "', "
                    + "'" + moradoresDTO.getGrau_parentesco() + "',"
                    + administradorDTO.getId_login()
                    + ");";

            System.out.println(comando);
            stmt.execute(comando, Statement.RETURN_GENERATED_KEYS);
            rs = stmt.getGeneratedKeys();
            rs.next();
            ConexaoDAO.con.commit();
            //fecha statement
            stmt.close();
            rs.close();
            return true;
        } catch (Exception e) {
            System.out.println("Erro ao conectar ao banco de dados. " + e.getMessage());
            return false;
        } finally {
            //Chama o metodo da classe ConexaoDAO para fechar o banco de dados
            ConexaoDAO.CloseDB();
        }// fecha try,catch,finally
    }//fecha método

    /**
     * Método utilizado para alterar um objeto PessoaDTO no banco de dados
     *
     * @param moradoresDTO que vem da classe PessoaCTR
     * @return Um boolean
     */
    public boolean alterarMorador(MoradoresDTO moradoresDTO) {
        String comando = "";
        try {
            //Chama o metodo que esta na classe ConexaoDAO para abrir o banco de dados
            ConexaoDAO.ConectDB();
            //Cria o Statement que responsavel por executar alguma coisa no banco de dados
            stmt = ConexaoDAO.con.createStatement();
            //Comando SQL que sera executado no banco de dados
            comando = "Update MORADORES set "
                    + "primeiro_nome = '" + moradoresDTO.getPrimeiro_nome() + "', "
                    + "segundo_nome = '" + moradoresDTO.getSegundo_nome() + "', "
                    + "cidade_natal = '" + moradoresDTO.getCidade_natal() + "', "
                    + "cidade_atual = '" + moradoresDTO.getCidade_atual() + "', "
                    + "data_nasc  = " + moradoresDTO.getData_nasc() + ", "
                    + "nome_familiar_proximo = '" + moradoresDTO.getNome_familiar_proximo() + "', "
                    + "grau_parentesco = '" + moradoresDTO.getGrau_parentesco() + "' "
                    + "WHERE ID_MORADOR = " + moradoresDTO.getId_morador() + ";";

            System.out.println(comando);
            stmt.execute(comando);
            ConexaoDAO.con.commit();
            //Fecha o statement
            stmt.close();
            return true;
        } //Caso tenha algum erro no codigo acima é enviado uma mensagem no console com o que esta acontecendo.
        catch (Exception e) {
            System.out.println("Erro MoradorDAO" + e.getMessage());
            return false;
        } //Independente de dar erro ou não ele vai fechar o banco de dados.
        finally {
            //Chama o metodo da classe ConexaoDAO para fechar o banco de dados
            ConexaoDAO.CloseDB();
        }
    }//Fecha o método alterarMorador

    /**
     * Método utilizado para excluir um objeto PessoaDTO no banco de dados
     *
     * @param moradoresDTO que vem da classe PessoaCTR
     * @return Um boolean
     */
    public boolean excluirMorador(MoradoresDTO moradoresDTO) {
        try {
            String comando = "";
            //Chama o metodo que esta na classe ConexaoDAO para abrir o banco de dados
            ConexaoDAO.ConectDB();
            //Cria o Statement que responsavel por executar alguma coisa no banco de dados
            stmt = ConexaoDAO.con.createStatement();
            //Comando SQL que sera executado no banco de dados

            comando = "Delete from MORADORES "
                    + "where id_morador = " + moradoresDTO.getId_morador();

            stmt.execute(comando);
            ConexaoDAO.con.commit();
            //Fecha o statement
            stmt.close();
            return true;
        } //Caso tenha algum erro no codigo acima é enviado uma mensagem no console com o que esta acontecendo.
        catch (Exception e) {
            System.out.println(e.getMessage());
            return false;
        } //Independente de dar erro ou não ele vai fechar o banco de dados.
        finally {
            //Chama o metodo da classe ConexaoDAO para fechar o banco de dados
            ConexaoDAO.CloseDB();
        }
    }//Fecha o método excluirUsuario

    /**
     * Método utilizado para consultar um objeto FuncionarioDTO no banco de
     * dados
     *
     * @param moradoresDTO que vem da classe FuncionarioCTR
     * @param opcao que vem da classe FuncionarioCTR
     * @return Um ResultSet com os dados do funcionario
     */
    public ResultSet consultarMoradores(MoradoresDTO moradoresDTO, int opcao) {
        try {
            //Chama o metodo que esta na classe ConexaoDAO para abrir o banco de dados
            ConexaoDAO.ConectDB();
            //Cria o Statement que responsavel por executar alguma coisa no banco de dados
            stmt = ConexaoDAO.con.createStatement();
            //Comando SQL que sera executado no banco de dados
            String comando = "";

            switch (opcao) {
                case 1: //Pesquisa por nome
                    comando = "Select primeiro_nome,id_morador "
                            + "from MORADORES "
                            + " WHERE primeiro_nome ILIKE '%" + moradoresDTO.getPrimeiro_nome() + "%' "
                            + "order by primeiro_nome";
                    break;

                case 2: //Pesquisa por id
                    comando = "SELECT TO_CHAR(data_nasc, 'dd/mm/yyyy') AS data_nasc, id_morador, primeiro_nome,segundo_nome,cidade_atual, cidade_natal, nome_familiar_proximo, grau_parentesco FROM moradores WHERE id_morador = " + moradoresDTO.getId_morador() + ";";

            }//fecha switch opcao
            //Executa o comando SQL no banco de Dados
            System.out.println(comando);
            rs = stmt.executeQuery(comando);

            return rs;

        } //Caso tenha algum erro no codigo acima é enviado uma mensagem no console com o que esta acontecendo.
        catch (Exception e) {
            System.out.println(e.getMessage());
            return rs;
        }
    }//Fecha o método consultarFuncionario

}
