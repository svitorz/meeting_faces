package br.com.meetingfaces.ctr;

import br.com.meetingfaces.dao.MoradoresDAO;
import br.com.meetingfaces.dto.AdministradorDTO;
import br.com.meetingfaces.dto.MoradoresDTO;
import java.sql.*;

public class MoradoresCTR {

    MoradoresDAO moradoresDAO = new MoradoresDAO();

    public MoradoresCTR() {
    }

    public String inserirMoradores(MoradoresDTO moradoresDTO, int id_adm) {
        try {
            //Chama o metodo que esta na classe DAO aguardando uma resposta (true ou false)
            if (moradoresDAO.inserirMorador(moradoresDTO, id_adm)) {
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
     * @param moradoresDTO que vem da classe da página (VIEW)
     * @return String contendo a mensagem
     */
    public String alterarMoradores(MoradoresDTO moradoresDTO) {
        try {
            //Chama o metodo que esta na classe DAO aguardando uma resposta (true ou false)
            if (moradoresDAO.alterarMorador(moradoresDTO)) {
                return "Morador Alterado com Sucesso!!!";
            } else {
                return "Morador NÃO Alterado!!!";
            }
        } //Caso tenha algum erro no codigo acima é enviado uma mensagem no console com o que esta acontecendo.
        catch (Exception e) {
            System.out.println(e.getMessage());
            return "Morador NÃO Alterado!!!";
        }
    }//Fecha o método alterarFuncionario

    /**
     * Método utilizado para controlar o acesso ao método excluirFuncionario da
     * classe FuncionarioDAO
     *
     * @param moradoresDTO que vem da classe da página (VIEW)
     * @return String contendo a mensagem
     */
    public String excluirMoradores(MoradoresDTO moradoresDTO) {
        try {
            if (moradoresDAO.excluirMorador(moradoresDTO)) {
                return "Morador Excluido com Sucesso!!!";
            } else {
                return "Morador NÃO Excluido!!!";
            }
        } //Caso tenha algum erro no codigo acima é enviado uma mensagem no console com o que esta acontecendo.
        catch (Exception e) {
            System.out.println(e.getMessage());
            return "Morador NÃO Excluido!!!";
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
    public ResultSet consultarMoradores(MoradoresDTO moradoresDTO, int opcao) {
        //É criado um atributo do tipo ResultSet, pois este método recebe o resultado de uma consulta.
        ResultSet rs = null;

        //O atributo rs recebe a consulta realizada pelo método da classe DAO
        rs = moradoresDAO.consultarMoradores(moradoresDTO, opcao);

        return rs;
    }//Fecha o método consultarFuncionario

}// fecha main
