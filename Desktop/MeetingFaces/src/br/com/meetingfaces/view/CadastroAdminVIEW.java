package br.com.meetingfaces.view;

import br.com.meetingfaces.ctr.AdministradorCTR;
import br.com.meetingfaces.dto.AdministradorDTO;
import javax.swing.JFormattedTextField;
import javax.swing.JOptionPane;
import javax.swing.text.MaskFormatter;

/**
 *
 * @author vitor
 */
public class CadastroAdminVIEW extends javax.swing.JFrame {

    AdministradorDTO administradorDTO = new AdministradorDTO();
    AdministradorCTR administradorCTR = new AdministradorCTR();

    //    private JTextField data_nasc =  new JFormattedTextField(new JFormattedTextField("##/##/####"));
    public CadastroAdminVIEW() {
        initComponents();
    }

    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        buttonGroup1 = new javax.swing.ButtonGroup();
        buttonGroup2 = new javax.swing.ButtonGroup();
        buttonGroup3 = new javax.swing.ButtonGroup();
        buttonGroup4 = new javax.swing.ButtonGroup();
        buttonGroup5 = new javax.swing.ButtonGroup();
        buttonGroup6 = new javax.swing.ButtonGroup();
        buttonGroup7 = new javax.swing.ButtonGroup();
        buttonGroup8 = new javax.swing.ButtonGroup();
        jLabel1 = new javax.swing.JLabel();
        senha = new javax.swing.JPasswordField();
        primeiro_nome = new javax.swing.JTextField();
        segundo_nome = new javax.swing.JTextField();
        jLabel2 = new javax.swing.JLabel();
        jLabel3 = new javax.swing.JLabel();
        email = new javax.swing.JTextField();
        telefone = new javax.swing.JTextField();
        jLabel4 = new javax.swing.JLabel();
        data_nasc = new javax.swing.JTextField();
        jLabel5 = new javax.swing.JLabel();
        jLabel6 = new javax.swing.JLabel();
        jLabel7 = new javax.swing.JLabel();
        submit = new javax.swing.JButton();
        jLabel8 = new javax.swing.JLabel();
        pesquisarBtn = new javax.swing.JButton();
        pesquisarInput = new javax.swing.JTextField();
        jScrollPane1 = new javax.swing.JScrollPane();
        jTable1 = new javax.swing.JTable();

        setDefaultCloseOperation(javax.swing.WindowConstants.EXIT_ON_CLOSE);
        getContentPane().setLayout(new org.netbeans.lib.awtextra.AbsoluteLayout());

        jLabel1.setText("Primeiro nome");
        getContentPane().add(jLabel1, new org.netbeans.lib.awtextra.AbsoluteConstraints(20, 40, -1, 20));
        getContentPane().add(senha, new org.netbeans.lib.awtextra.AbsoluteConstraints(430, 180, 200, 60));

        primeiro_nome.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                primeiro_nomeActionPerformed(evt);
            }
        });
        getContentPane().add(primeiro_nome, new org.netbeans.lib.awtextra.AbsoluteConstraints(120, 10, 200, 60));

        segundo_nome.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                segundo_nomeActionPerformed(evt);
            }
        });
        getContentPane().add(segundo_nome, new org.netbeans.lib.awtextra.AbsoluteConstraints(430, 10, 200, 60));

        jLabel2.setText("Segundo nome");
        getContentPane().add(jLabel2, new org.netbeans.lib.awtextra.AbsoluteConstraints(330, 40, -1, 20));

        jLabel3.setText("Email");
        getContentPane().add(jLabel3, new org.netbeans.lib.awtextra.AbsoluteConstraints(60, 200, -1, 20));

        email.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                emailActionPerformed(evt);
            }
        });
        getContentPane().add(email, new org.netbeans.lib.awtextra.AbsoluteConstraints(120, 180, 200, 60));

        telefone.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                telefoneActionPerformed(evt);
            }
        });
        getContentPane().add(telefone, new org.netbeans.lib.awtextra.AbsoluteConstraints(430, 90, 200, 60));

        jLabel4.setText("Telefone");
        getContentPane().add(jLabel4, new org.netbeans.lib.awtextra.AbsoluteConstraints(340, 110, -1, 20));

        data_nasc.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                data_nascActionPerformed(evt);
            }
        });
        getContentPane().add(data_nasc, new org.netbeans.lib.awtextra.AbsoluteConstraints(120, 90, 200, 60));

        jLabel5.setText("Data de nascimento");
        getContentPane().add(jLabel5, new org.netbeans.lib.awtextra.AbsoluteConstraints(0, 110, -1, 20));

        jLabel6.setText("Telefone");
        getContentPane().add(jLabel6, new org.netbeans.lib.awtextra.AbsoluteConstraints(492, 474, -1, 0));

        jLabel7.setText("Senha");
        getContentPane().add(jLabel7, new org.netbeans.lib.awtextra.AbsoluteConstraints(360, 190, -1, 20));

        submit.setText("Gravar");
        submit.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                submitActionPerformed(evt);
            }
        });
        getContentPane().add(submit, new org.netbeans.lib.awtextra.AbsoluteConstraints(720, 170, 124, 70));

        jLabel8.setText("Consultar usuários");
        getContentPane().add(jLabel8, new org.netbeans.lib.awtextra.AbsoluteConstraints(50, 300, 130, 70));

        pesquisarBtn.setText("Pesquisar");
        getContentPane().add(pesquisarBtn, new org.netbeans.lib.awtextra.AbsoluteConstraints(430, 310, -1, 40));
        getContentPane().add(pesquisarInput, new org.netbeans.lib.awtextra.AbsoluteConstraints(160, 310, 260, 40));

        jTable1.setModel(new javax.swing.table.DefaultTableModel(
            new Object [][] {

            },
            new String [] {
                "ID", "Nome"
            }
        ));
        jScrollPane1.setViewportView(jTable1);

        getContentPane().add(jScrollPane1, new org.netbeans.lib.awtextra.AbsoluteConstraints(30, 390, 510, 280));

        pack();
    }// </editor-fold>//GEN-END:initComponents

    private void primeiro_nomeActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_primeiro_nomeActionPerformed
        // TODO add your handling code here:
    }//GEN-LAST:event_primeiro_nomeActionPerformed

    private void segundo_nomeActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_segundo_nomeActionPerformed
        // TODO add your handling code here:
    }//GEN-LAST:event_segundo_nomeActionPerformed

    private void emailActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_emailActionPerformed
        // TODO add your handling code here:
    }//GEN-LAST:event_emailActionPerformed

    private void telefoneActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_telefoneActionPerformed
        // TODO add your handling code here:
    }//GEN-LAST:event_telefoneActionPerformed

    private void data_nascActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_data_nascActionPerformed

    }//GEN-LAST:event_data_nascActionPerformed

    private void submitActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_submitActionPerformed
        gravar(administradorDTO);        // TODO add your handling code here:
    }//GEN-LAST:event_submitActionPerformed

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
            java.util.logging.Logger.getLogger(CadastroAdminVIEW.class
                    .getName()).log(java.util.logging.Level.SEVERE, null, ex);

        } catch (InstantiationException ex) {
            java.util.logging.Logger.getLogger(CadastroAdminVIEW.class
                    .getName()).log(java.util.logging.Level.SEVERE, null, ex);

        } catch (IllegalAccessException ex) {
            java.util.logging.Logger.getLogger(CadastroAdminVIEW.class
                    .getName()).log(java.util.logging.Level.SEVERE, null, ex);

        } catch (javax.swing.UnsupportedLookAndFeelException ex) {
            java.util.logging.Logger.getLogger(CadastroAdminVIEW.class
                    .getName()).log(java.util.logging.Level.SEVERE, null, ex);
        }
        //</editor-fold>

        /* Create and display the form */
        java.awt.EventQueue.invokeLater(new Runnable() {
            public void run() {
                new CadastroAdminVIEW().setVisible(true);
            }
        });
    }

    private void gravar(AdministradorDAO administradorDAO) {
        try {
            administradorDTO.setPrimeiro_nome(primeiro_nome.getText());
            administradorDTO.setSegundo_nome(segundo_nome.getText());
            administradorDTO.setEmail(email.getText());
            administradorDTO.setTelefone(telefone.getText());
            administradorDTO.setData_nasc(data_nasc.getText());
            administradorDTO.setSenha(senha.getPassword());

            JOptionPane.showMessageDialog(null,
                    administradorCTR.inserirAdmin(administradorDAO));
        } catch (Exception e) {
            System.out.println("Erro ao Gravar" + e.getMessage());
        }
    }//Fecha método gravar()

    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.ButtonGroup buttonGroup1;
    private javax.swing.ButtonGroup buttonGroup2;
    private javax.swing.ButtonGroup buttonGroup3;
    private javax.swing.ButtonGroup buttonGroup4;
    private javax.swing.ButtonGroup buttonGroup5;
    private javax.swing.ButtonGroup buttonGroup6;
    private javax.swing.ButtonGroup buttonGroup7;
    private javax.swing.ButtonGroup buttonGroup8;
    private javax.swing.JTextField data_nasc;
    private javax.swing.JTextField email;
    private javax.swing.JLabel jLabel1;
    private javax.swing.JLabel jLabel2;
    private javax.swing.JLabel jLabel3;
    private javax.swing.JLabel jLabel4;
    private javax.swing.JLabel jLabel5;
    private javax.swing.JLabel jLabel6;
    private javax.swing.JLabel jLabel7;
    private javax.swing.JLabel jLabel8;
    private javax.swing.JScrollPane jScrollPane1;
    private javax.swing.JTable jTable1;
    private javax.swing.JButton pesquisarBtn;
    private javax.swing.JTextField pesquisarInput;
    private javax.swing.JTextField primeiro_nome;
    private javax.swing.JTextField segundo_nome;
    private javax.swing.JPasswordField senha;
    private javax.swing.JButton submit;
    private javax.swing.JTextField telefone;
    // End of variables declaration//GEN-END:variables
}
