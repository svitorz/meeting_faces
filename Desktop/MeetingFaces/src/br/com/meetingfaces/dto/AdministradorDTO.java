package br.com.meetingfaces.dto;

public class AdministradorDTO {

    private int id_administrador;
    private String primeiro_nome, segundo_nome, email, senha;

    public String getSenha() {
        return senha;
    }

    public void setSenha(String senha) {
        this.senha = senha;
    }

    public String getPrimeiro_nome() {
        return primeiro_nome;
    }

    public void setPrimeiro_nome(String primeiro_nome) {
        this.primeiro_nome = primeiro_nome;
    }

    public String getSegundo_nome() {
        return segundo_nome;
    }

    public void setSegundo_nome(String segundo_nome) {
        this.segundo_nome = segundo_nome;
    }

    public int getId_administrador() {
        return id_administrador;
    }

    public void setId_administrador(int id_administrador) {
        this.id_administrador = id_administrador;
    }

    public String getEmail() {
        return email;
    }

    public void setEmail(String email) {
        this.email = email;
    }
}
