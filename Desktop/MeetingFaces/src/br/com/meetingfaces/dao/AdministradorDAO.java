package br.com.meetingfaces.dao;

import br.com.meetingfaces.dto.AdministradorDTO;
import br.com.meetingfaces.dto.UsuarioDTO;
import java.sql.*;

public class AdministradorDAO {

    //Método construtor da classe
    public AdministradorDAO() {
    }

    //Classe que faz hash da senha inserida pelo usuario
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
            /*
            Atributos do adm no bd
            ID_ADMINISTRADOR SERIAL,
            PRIMEIRO_NOME VARCHAR(20),
            SEGUNDO_NOME VARCHAR(20),
            EMAIL VARCHAR(100),
            SENHA VARCHAR(255),
            CONSTRAINT PK_ADMINISTRADOR PRIMARY KEY (ID_ADMINISTRADOR),
            CONSTRAINT UNIQUEKEY_ADM_EMAIL UNIQUE (EMAIL)
             */

            //Criar um statement
            stmt = ConexaoDAO.con.createStatement();
            //Criando a query
            comando = "INSERT INTO ADMINISTRADOR(primeiro_nome, segundo_nome, email"
                    + ", senha) VALUES ("
                    + "'" + administradorDTO.getPrimeiro_nome() + "', "
                    + "'" + administradorDTO.getSegundo_nome() + "', "
                    + "'" + administradorDTO.getEmail() + "', "
                    + "'" + administradorDTO.getSenha() + "')";
            System.out.println(comando);
            stmt.execute(comando.toUpperCase(), Statement.RETURN_GENERATED_KEYS);
            rs = stmt.getGeneratedKeys();
            rs.next();
            id_administrador = rs.getInt(id_administrador);
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
    public boolean alterarAdministrador(AdministradorDTO administradorDTO) {
        String comando = "";
        try {
            //Chama o metodo que esta na classe ConexaoDAO para abrir o banco de dados
            ConexaoDAO.ConectDB();
            //Cria o Statement que responsavel por executar alguma coisa no banco de dados
            stmt = ConexaoDAO.con.createStatement();
            //Comando SQL que sera executado no banco de dados
            comando = "Update usuario set "
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

            comando = "Delete from Pessoa "
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
                            + "where nome '%" + administradorDTO.getPrimeiro_nome() + "%' "
                            + "order by primeiro_nome";
                    break;

                case 2: //Pesquisa por id
                    comando = "Select * "
                            + "from ADMINISTRADOR "
                            + "where id_usuario = " + administradorDTO.getId_administrador();

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
    public int logarAdmin(AdministradorDTO administradorDTO) {
        try {
            //Chama o metodo que esta na classe ConexaoDAO para abrir o banco de dados
            ConexaoDAO.ConectDB();
            //Cria o Statement que responsavel por executar alguma coisa no banco de dados
            stmt = ConexaoDAO.con.createStatement();
            //Comando SQL que sera executado no banco de dados
            String comando = "Select nome,id "
                    + "from usuario "
                    + "where email = '" + administradorDTO.getEmail() + "'"
                    + " and senha = '" + administradorDTO.getSenha() + "'";

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

}
