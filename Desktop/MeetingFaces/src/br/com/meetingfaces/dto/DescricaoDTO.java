package br.com.meetingfaces.dto;

/**
 *
 * @author vitor
 */
public class DescricaoDTO {

    private int id_descricao, id_usuario, id_morador;
    private String comentario, situacao, primeiro_nome_usuario, primeiro_nome_morador;

    public int getId_descricao() {
        return id_descricao;
    }

    public void setId_descricao(int id_descricao) {
        this.id_descricao = id_descricao;
    }

    public int getId_usuario() {
        return id_usuario;
    }

    public void setId_usuario(int id_usuario) {
        this.id_usuario = id_usuario;
    }

    public int getId_morador() {
        return id_morador;
    }

    public void setId_morador(int id_morador) {
        this.id_morador = id_morador;
    }

    public String getComentario() {
        return comentario;
    }

    public void setComentario(String comentario) {
        this.comentario = comentario;
    }

    public String getSituacao() {
        return situacao;
    }

    public void setSituacao(String situacao) {
        this.situacao = situacao;
    }

    public String getPrimeiro_nome_usuario() {
        return primeiro_nome_usuario;
    }

    public void setPrimeiro_nome_usuario(String primeiro_nome_usuario) {
        this.primeiro_nome_usuario = primeiro_nome_usuario;
    }

    public String getPrimeiro_nome_morador() {
        return primeiro_nome_morador;
    }

    public void setPrimeiro_nome_morador(String primeiro_nome_morador) {
        this.primeiro_nome_morador = primeiro_nome_morador;
    }

}
