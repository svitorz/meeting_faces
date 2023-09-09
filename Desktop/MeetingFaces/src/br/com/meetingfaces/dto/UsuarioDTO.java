package br.com.meetingfaces.dto;

public class UsuarioDTO {
    /*
    int: id_usuario(PK)
    String: nome
    String: telefone
    date: data_nasc
    String: email
    String:senha
    int: id_permissao (fk)
    */
    
    private String nome,telefone,data_nasc,email,senha;

    public String getNome() {
        return nome;
    }

    public void setNome(String nome) {
        this.nome = nome;
    }

    public String getTelefone() {
        return telefone;
    }

    public void setTelefone(String telefone) {
        this.telefone = telefone;
    }

    public String getData_nasc() {
        return data_nasc;
    }

    public void setData_nasc(String data_nasc) {
        this.data_nasc = data_nasc;
    }

    public String getEmail() {
        return email;
    }

    public void setEmail(String email) {
        this.email = email;
    }

    public String getSenha() {
        return senha;
    }

    public void setSenha(String senha) {
        this.senha = senha;
    }

    public int getId_usuario() {
        return id_usuario;
    }

    public void setId_usuario(int id_usuario) {
        this.id_usuario = id_usuario;
    }

    public int getId_permissao() {
        return id_permissao;
    }

    public void setId_permissao(int id_permissao) {
        this.id_permissao = 1;
    }
    private int id_usuario,id_permissao;
}
