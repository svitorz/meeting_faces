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

    public String getNome_completo() {
        return nome_completo;
    }

    public void setNome_completo(String nome_completo) {
        this.nome_completo = nome_completo;
    }

    public String getCidade_natal() {
        return cidade_natal;
    }

    public int getId_morador() {
        return id_morador;
    }

    public int getId_permissao() {
        return id_permissao;
    }

    public void setId_permissao(int id_permissao) {
        this.id_permissao = id_permissao;
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
    private int id_morador,id_permissao,id_usuario;
    private String nome_completo,cidade_natal,cidade_atual,data_nasc,nome_familiar_proximo,grau_parentesco;
}
