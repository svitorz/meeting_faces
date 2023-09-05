/*
CLASSE PARA TESTES
 */
package br.com.meetingfaces.view;

import br.com.meetingfaces.ctr.UsuarioCTR;
import br.com.meetingfaces.dto.UsuarioDTO;
import javax.swing.JOptionPane;
/**
 *
 * @author vitor
 */
public class UsuarioVIEW {
    public static void main (String args[]){
        try{
            UsuarioDTO usuarioDTO = new UsuarioDTO();
            UsuarioCTR usuarioCTR = new UsuarioCTR();
            
            usuarioDTO.setNome(JOptionPane.showInputDialog("Insira seu nome: "));
            usuarioDTO.setEmail(JOptionPane.showInputDialog("Insira seu email: "));
            usuarioDTO.setTelefone(JOptionPane.showInputDialog("Insira seu telefone: "));
            usuarioDTO.setSenha(JOptionPane.showInputDialog("Insira sua senha: "));
            
            JOptionPane.showMessageDialog(null, usuarioCTR.returnUsuario(usuarioDTO));
        }catch(Exception e){      
            System.out.println("Erro ao receber dados "+e.getMessage());
        }//fecha try 
    }// fecha main
}// fecha classe
