package br.com.meetingfaces.view;

/**
 *
 * @author vitor
 */
import br.com.meetingfaces.ctr.DescricaoCTR;
import br.com.meetingfaces.ctr.MoradoresCTR;
import br.com.meetingfaces.dto.DescricaoDTO;
import java.sql.ResultSet;
import javax.swing.table.DefaultTableModel;

public class DescricaoVIEW extends javax.swing.JFrame {

    DescricaoCTR descricaoCTR = new DescricaoCTR();
    DescricaoDTO descricaoDTO = new DescricaoDTO();
    DefaultTableModel modelo_tabela_descricao;
    ResultSet rs;

    /**
     * Creates new form DescricaoVIEW
     */
    public DescricaoVIEW() {
        initComponents();

        modelo_tabela_descricao = (DefaultTableModel) Tabela_Desc.getModel();
        preencheTabela();
    }

    /**
     * This method is called from within the constructor to initialize the form.
     * WARNING: Do NOT modify this code. The content of this method is always
     * regenerated by the Form Editor.
     */
    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        AprovarBtn = new javax.swing.JButton();
        Reprovarbtn = new javax.swing.JButton();
        jScrollPane1 = new javax.swing.JScrollPane();
        Tabela_Desc = new javax.swing.JTable();

        setDefaultCloseOperation(javax.swing.WindowConstants.EXIT_ON_CLOSE);

        AprovarBtn.setText("Aprovar");
        AprovarBtn.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                AprovarBtnActionPerformed(evt);
            }
        });

        Reprovarbtn.setText("Reprovar");
        Reprovarbtn.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                ReprovarbtnActionPerformed(evt);
            }
        });

        Tabela_Desc.setModel(new javax.swing.table.DefaultTableModel(
            new Object [][] {
                {null, null, null, null},
                {null, null, null, null},
                {null, null, null, null},
                {null, null, null, null}
            },
            new String [] {
                "iD da descrição", "Comentário", "Nome do morador", "Nome do usuário"
            }
        ));
        Tabela_Desc.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseClicked(java.awt.event.MouseEvent evt) {
                Tabela_DescMouseClicked(evt);
            }
        });
        jScrollPane1.setViewportView(Tabela_Desc);

        javax.swing.GroupLayout layout = new javax.swing.GroupLayout(getContentPane());
        getContentPane().setLayout(layout);
        layout.setHorizontalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(layout.createSequentialGroup()
                        .addGap(69, 69, 69)
                        .addComponent(AprovarBtn)
                        .addGap(105, 105, 105)
                        .addComponent(Reprovarbtn))
                    .addGroup(layout.createSequentialGroup()
                        .addGap(26, 26, 26)
                        .addComponent(jScrollPane1, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)))
                .addContainerGap(422, Short.MAX_VALUE))
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addGap(27, 27, 27)
                .addComponent(jScrollPane1, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addGap(96, 96, 96)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(AprovarBtn)
                    .addComponent(Reprovarbtn))
                .addContainerGap(171, Short.MAX_VALUE))
        );

        pack();
    }// </editor-fold>//GEN-END:initComponents

    private void Tabela_DescMouseClicked(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_Tabela_DescMouseClicked
        selectDesc(Integer.parseInt(String.valueOf(Tabela_Desc.getValueAt(Tabela_Desc.getSelectedRow(), 0))));
    }//GEN-LAST:event_Tabela_DescMouseClicked

    private void AprovarBtnActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_AprovarBtnActionPerformed
        aprovar();
    }//GEN-LAST:event_AprovarBtnActionPerformed

    private void ReprovarbtnActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_ReprovarbtnActionPerformed
        reprovar();
    }//GEN-LAST:event_ReprovarbtnActionPerformed

    /**
     * @param args the command line arguments
     */
    public static void main(String args[]) {
        /* Set the Nimbus look and feel */
        //<editor-fold defaultstate="collapsed" desc=" Look and feel setting code (optional) ">
        /* If Nimbus (introduced in Java SE 6) is not available, stay with the default look and feel.
         * For details see http://download.oracle.com/javase/tutorial/uiswing/lookandfeel/plaf.html
         */
        try {
            for (javax.swing.UIManager.LookAndFeelInfo info : javax.swing.UIManager.getInstalledLookAndFeels()) {
                if ("Nimbus".equals(info.getName())) {
                    javax.swing.UIManager.setLookAndFeel(info.getClassName());
                    break;
                }
            }
        } catch (ClassNotFoundException ex) {
            java.util.logging.Logger.getLogger(DescricaoVIEW.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (InstantiationException ex) {
            java.util.logging.Logger.getLogger(DescricaoVIEW.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (IllegalAccessException ex) {
            java.util.logging.Logger.getLogger(DescricaoVIEW.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (javax.swing.UnsupportedLookAndFeelException ex) {
            java.util.logging.Logger.getLogger(DescricaoVIEW.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        }
        //</editor-fold>

        /* Create and display the form */
        java.awt.EventQueue.invokeLater(new Runnable() {
            public void run() {
                new DescricaoVIEW().setVisible(true);
            }
        });
    }

    /*
    * Método responsável por preencher a tabela com as informações
     */
    private void preencheTabela() {
        try {
            //Limpa todas as linhas
            modelo_tabela_descricao.setNumRows(0);

            //Enquanto tiver linhas - faça
            rs = descricaoCTR.consultarDesc();
            //1 = é a pesquisa por nome na classe DAO
            while (rs.next()) {
                modelo_tabela_descricao.addRow(new Object[]{
                    rs.getInt("ID_DESCRICAO"),
                    rs.getString("COMENTARIO"),
                    rs.getString("PRIMEIRO_NOME_MORADOR"),
                    rs.getString("PRIMEIRO_NOME_USUARIO")});
            }
        } catch (Exception erTab) {
            System.out.println("Erro SQL: " + erTab);
        }
    }//Fecha método preencheTabela

    private void selectDesc(int ID_DESCRICAO) {
        descricaoDTO.setId_descricao(ID_DESCRICAO);
    }

    private void aprovar() {
        descricaoCTR.alterarDescricao(descricaoDTO, 1);
    }

    private void reprovar() {
        descricaoCTR.alterarDescricao(descricaoDTO, 2);
    }
    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JButton AprovarBtn;
    private javax.swing.JButton Reprovarbtn;
    private javax.swing.JTable Tabela_Desc;
    private javax.swing.JScrollPane jScrollPane1;
    // End of variables declaration//GEN-END:variables
}
