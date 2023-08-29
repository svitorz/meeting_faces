package br.com.meetingfaces.dto;

public class AdministradorDTO extends CadastradoresDTO{
    int id_Adm;
    public int getId_Adm(){
        return id_Adm;
    }
    public void setId_Adm(int id_Adm){
        this.id_Adm = id_Adm;
    }
}
