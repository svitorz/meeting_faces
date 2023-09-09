package br.com.meetingfaces.dao;

import br.com.meetingfaces.dto.UsuarioDTO;
import java.sql.*;


public class UsuarioDAO {
    //Método construtor da classe
    public UsuarioDAO(){
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
    public int inserirUsuario(UsuarioDTO usuarioDTO){
        String comando = "";
        int id_usuario=0;
        try{
            //Inicia a conexão
            ConexaoDAO.ConectDB();
            
            //Criar um statement
            stmt = ConexaoDAO.con.createStatement();
            //Criando a query
            comando = "INSERT INTO usuario(nome, email,"
                        +"telefone,data_nasc, senha, ID_PERMISSAO) VALUES ("
                        +"'"+usuarioDTO.getNome()+"', "
                        +"'"+usuarioDTO.getEmail()+"', "
                        +"'"+usuarioDTO.getTelefone()+"', "
                        +"'"+usuarioDTO.getData_nasc()+"', " 
                        +"'"+usuarioDTO.getSenha()+"', " 
                        + 1 +")";
            System.out.println(comando);
            stmt.execute(comando.toUpperCase(), Statement.RETURN_GENERATED_KEYS);
            rs = stmt.getGeneratedKeys();
            rs.next();
            id_usuario = rs.getInt(id_usuario);
            ConexaoDAO.con.commit();
            //fecha statement
            stmt.close();
            rs.close();
            return id_usuario;
        }catch(Exception e){
            System.out.println("Erro ao conectar ao banco de dados. "+e.getMessage());
            return id_usuario;
        }finally {
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
                    + "nome = '" + usuarioDTO.getNome() + "', "
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
            System.out.println("Erro UsuarioDAO" +e.getMessage());
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
    public boolean excluirPessoa(UsuarioDTO usuarioDTO) {
        try {
            String comando = "";
            //Chama o metodo que esta na classe ConexaoDAO para abrir o banco de dados
            ConexaoDAO.ConectDB();
            //Cria o Statement que responsavel por executar alguma coisa no banco de dados
            stmt = ConexaoDAO.con.createStatement();
            //Comando SQL que sera executado no banco de dados
            
            comando = "Delete from Pessoa "+
                      "where id_usuario = " + usuarioDTO.getId_usuario();
            
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
    
}// fecha classe
