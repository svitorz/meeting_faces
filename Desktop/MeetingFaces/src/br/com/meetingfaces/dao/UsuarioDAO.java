/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package br.com.meetingfaces.dao;

import br.com.meetingfaces.dto.UsuarioDTO;
import java.sql.*;
import java.math.BigInteger;
import java.security.MessageDigest;
import java.security.NoSuchAlgorithmException;

public class UsuarioDAO {
    public UsuarioDAO(){    
    }// fecha construtor
    
    private ResultSet rs = null;
    private Statement stmt = null;
    
    public String getHashMd5(UsuarioDTO usuarioDTO) {
        MessageDigest md;
        try {
            md = MessageDigest.getInstance("MD5");
        } catch (NoSuchAlgorithmException e) {
            throw new RuntimeException(e);
        }
        BigInteger hash = new BigInteger(1, md.digest(usuarioDTO.getSenha().getBytes()));
        return hash.toString(16);
    }
    
    public boolean inserirMorador(String getHashMd5,UsuarioDTO usuarioDTO){
        try{
            ConexaoDAO.ConectDB();
            
            stmt = ConexaoDAO.con.createStatement();
            
            //INSERT INTO `morador`
            //(`ID_MORADOR`, `nome`, `cidade_atual`, `cidade_origem`, `nome_familiar`, `grau_parentesco`) 
            //VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]')
            
            String sql = "INSERT INTO usuario(nome, email, senha, telefone, id_permissao) VALUES ("+"'"+usuarioDTO.getNome()+"', "
                    +"'"+usuarioDTO.getEmail()+"', "
                    +"'"+ getHashMd5(usuarioDTO) +"', "
                    +"'"+usuarioDTO.getTelefone()+"', "
                    +"'"+usuarioDTO.getId_permissao()+"')";
            
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
    
}
