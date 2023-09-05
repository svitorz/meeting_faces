package br.com.meetingfaces.dto;

public class MoradoresDTO {
    String nome, cidade_atual, cidade_origem, nome_familiar,grau_parentesco;
       int id_morador;

    public String getNome() {
        return nome;
    }

    public void setNome(String nome) {
        this.nome = nome;
    }

    public String getCidade_atual() {
        return cidade_atual;
    }

    public void setCidade_atual(String cidade_atual) {
        this.cidade_atual = cidade_atual;
    }

    public String getCidade_origem() {
        return cidade_origem;
    }

    public void setCidade_origem(String cidade_origem) {
        this.cidade_origem = cidade_origem;
    }

    public String getNome_familiar() {
        return nome_familiar;
    }

    public void setNome_familiar(String nome_familiar) {
        this.nome_familiar = nome_familiar;
    }

    public String getGrau_parentesco() {
        return grau_parentesco;
    }

    public void setGrau_parentesco(String grau_parentesco) {
        this.grau_parentesco = grau_parentesco;
    }

    public int getId_morador() {
        return id_morador;
    }

    public void setId_morador(int id_morador) {
        this.id_morador = id_morador;
    }
}
