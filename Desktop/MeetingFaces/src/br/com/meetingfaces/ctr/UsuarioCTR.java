package br.com.meetingfaces.ctr;

import br.com.meetingfaces.dao.ConexaoDAO;
import br.com.meetingfaces.dto.MoradoresDTO;
import br.com.meetingfaces.dto.UsuarioDTO;
import br.com.meetingfaces.dao.UsuarioDAO;
import java.sql.ResultSet;

public class UsuarioCTR {

    UsuarioDAO usuarioDAO = new UsuarioDAO();
    UsuarioDTO usuarioDTO = new UsuarioDTO();

    public String inserirUsuario(UsuarioDTO usuarioDTO) {
        try {
            //Chama o metodo que esta na classe DAO aguardando uma resposta (true ou false)
            if ((boolean) usuarioDAO.inserirUsuario(usuarioDTO)) {
                return "Morador Cadastrado com Sucesso!!!";
            } else {
                return "Morador NÃO Cadastrado!!!";
            }
        } //Caso tenha algum erro no codigo acima é enviado uma mensagem no console com o que esta acontecendo.
        catch (Exception e) {
            System.out.println(e.getMessage());
            return "Morador NÃO Cadastrado!!!";
        }
    }//Fecha o método inserirFuncionario

    /**
     * Método utilizado para controlar o acesso ao método alterarFuncionario da
     * classe FuncionarioDAO
     *
     * @param funcionarioDTO que vem da classe da página (VIEW)
     * @return String contendo a mensagem
     */
    public String alterarMoradores(UsuarioDTO usuarioDTO) {
        try {
            //Chama o metodo que esta na classe DAO aguardando uma resposta (true ou false)
            if (usuarioDAO.alterarUsuario(usuarioDTO)) {
                return "Usuario Alterado com Sucesso!!!";
            } else {
                return "Usuario NÃO Alterado!!!";
            }
        } //Caso tenha algum erro no codigo acima é enviado uma mensagem no console com o que esta acontecendo.
        catch (Exception e) {
            System.out.println(e.getMessage());
            return "Usuario NÃO Alterado!!!";
        }
    }//Fecha o método alterarFuncionario

    /**
     * Método utilizado para controlar o acesso ao método excluirFuncionario da
     * classe FuncionarioDAO
     *
     * @param moradoresDTO que vem da classe da página (VIEW)
     * @return String contendo a mensagem
     */
    public String excluirUsuario(UsuarioDTO usuarioDTO) {
        try {
            if (usuarioDAO.excluirUsuario(usuarioDTO)) {
                return "Usuario Excluido com Sucesso!!!";
            } else {
                return "Usuario NÃO Excluido!!!";
            }
        } //Caso tenha algum erro no codigo acima é enviado uma mensagem no console com o que esta acontecendo.
        catch (Exception e) {
            System.out.println(e.getMessage());
            return "Usuario NÃO Excluido!!!";
        }
    }//Fecha o método excluirFuncionario

    /**
     * Método utilizado para controlar o acesso ao método consultarFuncionario
     * da classe FuncionarioDAO
     *
     * @param moradoresDTO, opcao que vem da classe da página (VIEW)
     * @param opcao que vem da classe da página (VIEW)
     * @return ResultSet com os dados do funcionario
     */
    public ResultSet consultarUsuario(MoradoresDTO moradoresDTO, int opcao) {
        //É criado um atributo do tipo ResultSet, pois este método recebe o resultado de uma consulta.
        ResultSet rs = null;

        //O atributo rs recebe a consulta realizada pelo método da classe DAO
        // rs = usuarioDAO.;
        return rs;
    }//Fecha o método consultarFuncionario

}
