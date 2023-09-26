package br.com.meetingfaces.dao;

import br.com.meetingfaces.dto.AdministradorDTO;
import java.sql.*;

public class AdministradorDAO {

    //Método construtor da classe
    public AdministradorDAO() {
    }

    //Atributo do tipo ResultSet utilizado para realizar consultas
    private ResultSet rs = null;
    //Manipular o banco de dados
    private Statement stmt = null;

    /* Método para inserir administrador do sistema
    *
    * @param administradorDTO que vem da classe administradorCTR
    * @return Um boolean
     */
    public boolean inserirAdministrador(AdministradorDTO administradorDTO) {
        String comando = "";
        int id_administrador = 0;
        try {
            //Inicia a conexão
            ConexaoDAO.ConectDB();

            //Criar um statement
            stmt = ConexaoDAO.con.createStatement();
            //Criando a query
            comando = "INSERT INTO administrador(primeiro_nome, segundo_nome, email"
                    + ", senha) VALUES("
                    + "'" + administradorDTO.getPrimeiro_nome() + "', "
                    + "'" + administradorDTO.getSegundo_nome() + "', "
                    + "'" + administradorDTO.getEmail() + "', "
                    + "'" + administradorDTO.getSenha() + "'"
                    + ");";
            System.out.println(comando);
            stmt.execute(comando.toUpperCase());
            ConexaoDAO.con.commit();
            //fecha statement
            stmt.close();
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
     * @param usuarioDTO que vem da classe PessoaCTR
     * @return Um boolean
     */
    public boolean alterarAdministrador(AdministradorDTO administradorDTO) {
        String comando = "";
        try {
            //Chama o metodo que esta na classe ConexaoDAO para abrir o banco de dados
            ConexaoDAO.ConectDB();
            //Cria o Statement que responsavel por executar alguma coisa no banco de dados
            stmt = ConexaoDAO.con.createStatement();
            //Comando SQL que sera executado no banco de dados
            comando = "Update administrador set "
                    + "primeiro_nome = '" + administradorDTO.getPrimeiro_nome() + "', "
                    + "segundo_nome = '" + administradorDTO.getSegundo_nome() + "', "
                    + "email = '" + administradorDTO.getEmail() + "', "
                    + "senha = " + administradorDTO.getSenha() + "'";

            stmt.execute(comando.toUpperCase());
            ConexaoDAO.con.commit();
            //Fecha o statement
            stmt.close();
            return true;
        } //Caso tenha algum erro no codigo acima é enviado uma mensagem no console com o que esta acontecendo.
        catch (Exception e) {
            System.out.println("Erro UsuarioDAO" + e.getMessage());
            return false;
        } //Independente de dar erro ou não ele vai fechar o banco de dados.
        finally {
            //Chama o metodo da classe ConexaoDAO para fechar o banco de dados
            ConexaoDAO.CloseDB();
        }
    }//Fecha o método alterarUsuario

    /**
     * Método utilizado para excluir um objeto PessoaDTO no banco de dados
     *
     * @param pessoaDTO que vem da classe PessoaCTR
     * @return Um boolean
     */
    public boolean excluirAdministrador(AdministradorDTO administradorDTO) {
        try {
            String comando = "";
            //Chama o metodo que esta na classe ConexaoDAO para abrir o banco de dados
            ConexaoDAO.ConectDB();
            //Cria o Statement que responsavel por executar alguma coisa no banco de dados
            stmt = ConexaoDAO.con.createStatement();
            //Comando SQL que sera executado no banco de dados

            comando = "Delete from administrador "
                    + "where id_administrador = " + administradorDTO.getId_administrador();

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

    public ResultSet consultarAdministrador(AdministradorDTO administradorDTO, int opcao) {
        try {
            //Chama o metodo que esta na classe ConexaoDAO para abrir o banco de dados
            ConexaoDAO.ConectDB();
            //Cria o Statement que responsavel por executar alguma coisa no banco de dados
            stmt = ConexaoDAO.con.createStatement();
            //Comando SQL que sera executado no banco de dados
            String comando = "";

            switch (opcao) {
                case 1: //Pesquisa por nome
                    comando = "Select * "
                            + "from ADMINISTRADOR "
                            + "where primeiro_nome '%" + administradorDTO.getPrimeiro_nome() + "%' "
                            + "order by primeiro_nome";
                    break;

                case 2: //Pesquisa por id
                    comando = "Select * "
                            + "from ADMINISTRADOR "
                            + "where id_administrador = " + administradorDTO.getId_administrador();

            }//fecha switch opcao
            //Executa o comando SQL no banco de Dados
            rs = stmt.executeQuery(comando.toUpperCase());

            return rs;

        } //Caso tenha algum erro no codigo acima é enviado uma mensagem no console com o que esta acontecendo.
        catch (Exception e) {
            System.out.println(e.getMessage());
            return rs;
        }
    }//Fecha o método consultarFuncionario

    /**
     * Método utilizado para logar um objeto FuncionarioDTO no sistema
     *
     * @param administradorDTO, opcao que vem da classe PessoaCTR
     * @return Um int 1-Logado 2-Não Logado
     */
    public int logarAdmin(AdministradorDTO administradorDTO) {
        try {
            //Chama o metodo que esta na classe ConexaoDAO para abrir o banco de dados
            ConexaoDAO.ConectDB();
            //Cria o Statement que responsavel por executar alguma coisa no banco de dados
            stmt = ConexaoDAO.con.createStatement();
            //Comando SQL que sera executado no banco de dados
            String comando = "Select id_administrador "
                    + "from administrador "
                    + "where email = '" + administradorDTO.getEmail() + "'"
                    + " and senha = '" + administradorDTO.getSenha() + "'";
            System.out.println(comando);
            //Executa o comando SQL no banco de Dados
            rs = null;
            rs = stmt.executeQuery(comando);
            rs.next();
//            System.out.println(administradorDTO.getId_administrador());
            return rs.getInt("id_administrador");
        } //Caso tenha algum erro no codigo acima é enviado uma mensagem no console com o que esta acontecendo.
        catch (Exception e) {
            System.out.println(e.getMessage());
            return 0;
        } finally {
            ConexaoDAO.CloseDB();
        }
    }//Fecha o método logarFuncionario

}
