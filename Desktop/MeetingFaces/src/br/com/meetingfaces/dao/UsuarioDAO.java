/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package br.com.meetingfaces.dao;

import br.com.meetingfaces.dto.UsuarioDTO;
import java.sql.*;
import java.security.*;


public class UsuarioDAO {
    public UsuarioDAO(){    
    }// fecha construtor
    
    private ResultSet rs = null;
    private Statement stmt = null;
    public String md5;
    
    public String criptografaSenha(String md5) {
    try {
            java.security.MessageDigest md = java.security.MessageDigest.getInstance("MD5");
            byte[] array = md.digest(md5.getBytes());
            StringBuffer sb = new StringBuffer();
        for (int i = 0; i < array.length; ++i) {
            sb.append(Integer.toHexString((array[i] & 0xFF) | 0x100).substring(1,3));
        }
            return sb.toString();
        } 
    catch (java.security.NoSuchAlgorithmException e) {
        System.out.print("Erro ao criptografar senha "+e.getMessage());
    }
        return null;
    }
    
    public boolean inserirUsuario(UsuarioDTO usuarioDTO){
        try{
            ConexaoDAO.ConectDB();
            
            stmt = ConexaoDAO.con.createStatement();
            
            //INSERT INTO usuario(nome, email, telefone, senha, ID_PERMISSAO) VALUES (?, ?, ?, ?,?)
            String sql = "INSERT INTO usuario(nome, telefone, email, senha,id_permissao) VALUES ( "
                    + " "+"'"+usuarioDTO.getNome()+"', "
                    +"'"+usuarioDTO.getTelefone()+"', "
                    +"'"+ usuarioDTO.getEmail() +"', "
                    +"'"+ criptografaSenha(md5)  +"', "
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
