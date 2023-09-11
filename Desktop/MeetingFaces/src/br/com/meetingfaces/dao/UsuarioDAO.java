package br.com.meetingfaces.dao;

import br.com.meetingfaces.dto.UsuarioDTO;
import java.sql.*;

public class UsuarioDAO {

    //Método construtor da classe
    public UsuarioDAO() {
    }

    //Classe que faz hash da senha inserida pelo usuario
    //Atributo do tipo ResultSet utilizado para realizar consultas
    private ResultSet rs = null;
    //Manipular o banco de dados
    private Statement stmt = null;

    /* Método para inserir usuário
    *
    * @param usuarioDTO que vem da classe PessoaCTR
    * @return Um boolean
     */
    public boolean inserirUsuario(UsuarioDTO usuarioDTO) {
        String comando = "";
        int id_usuario = 0;
        try {
            //Inicia a conexão
            ConexaoDAO.ConectDB();

            //Criar um statement
            stmt = ConexaoDAO.con.createStatement();
            //Criando a query
            comando = "INSERT INTO usuario(primeiro_nome, segundo_nome, email,"
                    + "telefone,data_nasc, senha, ID_PERMISSAO) VALUES ("
                    + "'" + usuarioDTO.getPrimeiro_nome() + "', "
                    + "'" + usuarioDTO.getSegundo_nome() + "', "
                    + "'" + usuarioDTO.getEmail() + "', "
                    + "'" + usuarioDTO.getTelefone() + "', "
                    + "'" + usuarioDTO.getData_nasc() + "', "
                    + "'" + usuarioDTO.getSenha() + "', "
                    + usuarioDTO.getId_permissao() + ")";
            System.out.println(comando);
            stmt.execute(comando.toUpperCase(), Statement.RETURN_GENERATED_KEYS);
            rs = stmt.getGeneratedKeys();
            rs.next();
            id_usuario = rs.getInt(id_usuario);
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
     * @param usuarioDTO que vem da classe PessoaCTR
     * @return Um boolean
     */
    public boolean alterarUsuario(UsuarioDTO usuarioDTO) {
        String comando = "";
        try {
            //Chama o metodo que esta na classe ConexaoDAO para abrir o banco de dados
            ConexaoDAO.ConectDB();
            //Cria o Statement que responsavel por executar alguma coisa no banco de dados
            stmt = ConexaoDAO.con.createStatement();
            //Comando SQL que sera executado no banco de dados
            comando = "Update usuario set "
                    + "primeiro_nome = '" + usuarioDTO.getPrimeiro_nome() + "', "
                    + "segundo_nome = '" + usuarioDTO.getSegundo_nome() + "', "
                    + "email = '" + usuarioDTO.getEmail() + "', "
                    + "telefone = '" + usuarioDTO.getTelefone() + "', "
                    + "data_nasc  = '" + usuarioDTO.getData_nasc() + "', "
                    + "senha = " + usuarioDTO.getSenha() + "'";

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
    public boolean excluirUsuario(UsuarioDTO usuarioDTO) {
        try {
            String comando = "";
            //Chama o metodo que esta na classe ConexaoDAO para abrir o banco de dados
            ConexaoDAO.ConectDB();
            //Cria o Statement que responsavel por executar alguma coisa no banco de dados
            stmt = ConexaoDAO.con.createStatement();
            //Comando SQL que sera executado no banco de dados

            comando = "Delete from Pessoa "
                    + "where id_usuario = " + usuarioDTO.getId_usuario();

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

    public ResultSet consultarUsuario(UsuarioDTO usuarioDTO, int opcao) {
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
                            + "from USUARIO "
                            + "where nome '%" + usuarioDTO.getPrimeiro_nome() + "%' "
                            + "order by primeiro_nome";
                    break;

                case 2: //Pesquisa por id
                    comando = "Select * "
                            + "from USUARIO "
                            + "where id_usuario = " + usuarioDTO.getId_usuario();

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
     * @param usuarioDTO, opcao que vem da classe PessoaCTR
     * @return Um int 1-Logado 2-Não Logado
     */
    public int logarFuncionario(UsuarioDTO usuarioDTO) {
        try {
            //Chama o metodo que esta na classe ConexaoDAO para abrir o banco de dados
            ConexaoDAO.ConectDB();
            //Cria o Statement que responsavel por executar alguma coisa no banco de dados
            stmt = ConexaoDAO.con.createStatement();
            //Comando SQL que sera executado no banco de dados
            String comando = "Select nome,id "
                    + "from usuario "
                    + "where email = '" + usuarioDTO.getEmail() + "'"
                    + " and senha = '" + usuarioDTO.getSenha() + "'";

            //Executa o comando SQL no banco de Dados
            rs = null;
            rs = stmt.executeQuery(comando);
            if (rs.next()) {
                return rs.getInt("id_usuario");
            } else {
                return 0;
            }

        } //Caso tenha algum erro no codigo acima é enviado uma mensagem no console com o que esta acontecendo.
        catch (Exception e) {
            System.out.println(e.getMessage());
            return 0;
        } finally {
            ConexaoDAO.CloseDB();
        }
    }//Fecha o método logarFuncionario

}// fecha classe
