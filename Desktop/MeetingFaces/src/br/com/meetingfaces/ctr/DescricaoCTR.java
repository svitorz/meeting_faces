package br.com.meetingfaces.ctr;

/**
 *
 * @author vitor
 */
import br.com.meetingfaces.dao.DescricaoDAO;
import br.com.meetingfaces.dto.DescricaoDTO;
import br.com.meetingfaces.dto.MoradoresDTO;
import java.sql.*;

public class DescricaoCTR {

    DescricaoDAO descricaoDAO = new DescricaoDAO();

    public DescricaoCTR() {
    }

    public String alterarDescricao(DescricaoDTO descricaoDTO, int opcao) {
        try {
            //Chama o metodo que esta na classe DAO aguardando uma resposta (true ou false)
            if (descricaoDAO.autorizarDesc(descricaoDTO, opcao)) {
                if (opcao == 1) {
                    return "Descrição aprovada com sucesso";
                } else {
                    return "Descrição reprovada com sucesso";
                }
            } else {
                return "Descrição NÃO Alterado!!!";
            }
        } //Caso tenha algum erro no codigo acima é enviado uma mensagem no console com o que esta acontecendo.
        catch (Exception e) {
            System.out.println(e.getMessage());
            return "Descrição NÃO Alterado!!!";
        }
    }//Fecha o método alterarFuncionario

    public ResultSet consultarDesc() {
        //É criado um atributo do tipo ResultSet, pois este método recebe o resultado de uma consulta.
        ResultSet rs = null;

        //O atributo rs recebe a consulta realizada pelo método da classe DAO
        rs = descricaoDAO.descricaoDisp();

        return rs;
    }//Fecha o método consultarFuncionario

}
