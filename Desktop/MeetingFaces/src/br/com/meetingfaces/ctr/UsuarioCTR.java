/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package br.com.meetingfaces.ctr;

import br.com.meetingfaces.dto.UsuarioDTO;

public class UsuarioCTR {
    public String returnUsuario(UsuarioDTO usuarioDTO){
        return "O cadastro foi realizado com sucesso!"+
                "\n O nome cadastrado foi "+ usuarioDTO.getNome();
    }
}
