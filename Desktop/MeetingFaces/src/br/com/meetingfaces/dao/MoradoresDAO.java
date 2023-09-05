package br.com.meetingfaces.dao;

import br.com.meetingfaces.dto.MoradoresDTO;
import java.sql.*;

public class MoradoresDAO {
    
    public MoradoresDAO(){    
    }// fecha construtor
    
    private ResultSet rs = null;
    private Statement stmt = null;
    
    public boolean inserirMorador(MoradoresDTO moradoresDTO){
        try{
            ConexaoDAO.ConectDB();
            
            stmt = ConexaoDAO.con.createStatement();
            
            //INSERT INTO `morador`
            //(`ID_MORADOR`, `nome`, `cidade_atual`, `cidade_origem`, `nome_familiar`, `grau_parentesco`) 
            //VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]')
            
            String sql = "INSERT INTO morador(nome, cidade_atual, cidade_origem, nome_familiar, grau_parentesco) VALUES ("+"'"+moradoresDTO.getNome()+"', "
                    +"'"+moradoresDTO.getCidade_atual()+"', "
                    +"'"+moradoresDTO.getCidade_origem()+"', "
                    +"'"+moradoresDTO.getNome_familiar()+"', "
                    +"'"+moradoresDTO.getGrau_parentesco()+"')";
            
            stmt.execute(sql.toUpperCase());
            
            ConexaoDAO.con.commit();
            
            stmt.close();
            
            return true;
        }
        catch (Exception e){
            System.out.println("Erro ao inserir dados "+e.getMessage());
            return false;
        }
        finally {
            ConexaoDAO.CloseDB();
        }
    }//fecha metodo inserir
    
}//FECHA CLASSE
