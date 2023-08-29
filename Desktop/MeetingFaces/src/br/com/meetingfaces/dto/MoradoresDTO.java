package br.com.meetingfaces.dto;

public class MoradoresDTO {
    String nome, nome_pais, cidade_origem;
    int id_Morador;

    public String getNome() {
        return nome;
    }

    public void setNome(String nome) {
        this.nome = nome;
    }

    public String getNome_pais() {
        return nome_pais;
    }

    public void setNome_pais(String nome_pais) {
        this.nome_pais = nome_pais;
    }

    public String getCidade_origem() {
        return cidade_origem;
    }

    public void setCidade_origem(String cidade_origem) {
        this.cidade_origem = cidade_origem;
    }

    public int getId_Morador() {
        return id_Morador;
    }

    public void setId_Morador(int id_Morador) {
        this.id_Morador = id_Morador;
    }
}
