package br.com.meetingfaces.ctr;

import br.com.meetingfaces.dao.AdministradorDAO;
import br.com.meetingfaces.dto.AdministradorDTO;
import java.sql.ResultSet;

public class AdministradorCTR {

    AdministradorDAO administradorDAO = new AdministradorDAO();
    AdministradorDTO administradorDTO = new AdministradorDTO();

    public String inserirAdmin(AdministradorDAO administradorDAO) {
        try {
            //Chama o metodo que esta na classe DAO aguardando uma resposta (true ou false)
            if ((boolean) administradorDAO.inserirAdministrador(administradorDTO)) {
                return "Admin Cadastrado com Sucesso!!!";
            } else {
                return "Admin NÃO Cadastrado!!!";
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
    public String alterarAdmin(AdministradorDTO administradorDTO) {
        try {
            //Chama o metodo que esta na classe DAO aguardando uma resposta (true ou false)
            if (administradorDAO.alterarAdministrador(administradorDTO)) {
                return "Admin Alterado com Sucesso!!!";
            } else {
                return "Admin NÃO Alterado!!!";
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
    public String excluirAdmin(AdministradorDTO administradorDTO) {
        try {
            if (administradorDAO.excluirAdministrador(administradorDTO)) {
                return "Administrador Excluido com Sucesso!!!";
            } else {
                return "Administrador NÃO Excluido!!!";
            }
        } //Caso tenha algum erro no codigo acima é enviado uma mensagem no console com o que esta acontecendo.
        catch (Exception e) {
            System.out.println(e.getMessage());
            return "Administrador NÃO Excluido!!!";
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
    public ResultSet consultarAdmin(AdministradorDTO administradorDTO, int opcao) {
        //É criado um atributo do tipo ResultSet, pois este método recebe o resultado de uma consulta.
        ResultSet rs = null;

        //O atributo rs recebe a consulta realizada pelo método da classe DAO
        // rs = usuarioDAO.;
        return rs;
    }//Fecha o método consultarFuncionario

    public int logarAdministrador(AdministradorDTO administradorDTO) {

        return administradorDAO.logarAdmin(administradorDTO);

    }//Fecha o método logarFuncionario
}
