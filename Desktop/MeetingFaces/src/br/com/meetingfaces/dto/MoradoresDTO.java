package br.com.meetingfaces.dto;

public class MoradoresDTO {

    public String getNome_familiar_proximo() {
        return nome_familiar_proximo;
    }

    public void setNome_familiar_proximo(String nome_familiar_proximo) {
        this.nome_familiar_proximo = nome_familiar_proximo;
    }

    public String getCidade_atual() {
        return cidade_atual;
    }

    public int getId_usuario() {
        return id_usuario;
    }

    public void setId_usuario(int id_usuario) {
        this.id_usuario = id_usuario;
    }

    public String getCidade_natal() {
        return cidade_natal;
    }

    public int getId_morador() {
        return id_morador;
    }

    public void setId_morador(int id_morador) {
        this.id_morador = id_morador;
    }

    public void setCidade_natal(String cidade_natal) {
        this.cidade_natal = cidade_natal;
    }

    public String getGrau_parentesco() {
        return grau_parentesco;
    }

    public void setGrau_parentesco(String grau_parentesco) {
        this.grau_parentesco = grau_parentesco;
    }

    public String getData_nasc() {
        return data_nasc;
    }

    public void setData_nasc(String data_nasc) {
        this.data_nasc = data_nasc;
    }

    public void setCidade_atual(String cidade_atual) {
        this.cidade_atual = cidade_atual;
    }
    private int id_morador, id_usuario;
    private String primeiro_nome, segundo_nome, cidade_natal, cidade_atual, data_nasc, nome_familiar_proximo, grau_parentesco;

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
}
