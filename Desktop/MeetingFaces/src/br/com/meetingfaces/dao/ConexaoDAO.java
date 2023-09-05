package br.com.meetingfaces.dao;

import java.sql.*;

public class ConexaoDAO {
    public static Connection con = null;
    
    public ConexaoDAO(){
        
    }
    
    public static void ConectDB(){
        try{
            String dsn = "meetingfaces_teste";
            String user = "postgres";
            String senha = "postdba";
            
            //DriverManager.registerDriver(new com.mysql.cj.jdbc.Driver());
            DriverManager.registerDriver(new org.postgresql.Driver());
            
            //String url = "jdbc:mysql://localhost:3306/"+dsn;
            String url = "jdbc:postgresql://localhost:5432/"+dsn;
            
            con = DriverManager.getConnection(url, user, senha);
            
            con.setAutoCommit(false);
            if(con == null){
                System.out.println("Erro ao abrir banco de dados POSTGRE.");
            }
        }
        catch(Exception e){
            System.out.println("Problema ao abrir a base de dados."+e.getMessage());
        }
    } // fecha metodo
    
    public static void CloseDB(){
        try{
            con.close();
        }catch (Exception e){
            System.out.println("Problema ao fechar a base de dados."+e.getMessage());
        }
    }//Fecha método
    
}
