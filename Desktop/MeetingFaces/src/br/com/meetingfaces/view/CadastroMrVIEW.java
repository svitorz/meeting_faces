package br.com.meetingfaces.view;

import br.com.meetingfaces.ctr.MoradoresCTR;
import br.com.meetingfaces.dto.MoradoresDTO;
import br.com.meetingfaces.dto.UsuarioDTO;
import java.sql.ResultSet;
import javax.swing.JOptionPane;

public class CadastroMrVIEW extends javax.swing.JInternalFrame {

    MoradoresDTO moradoresDTO = new MoradoresDTO();
    MoradoresCTR moradoresCTR = new MoradoresCTR();
    UsuarioDTO usuarioDTO = new UsuarioDTO();

    ResultSet rs;
    int gravar_alterar;

    public CadastroMrVIEW() {
        initComponents();
    }

    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        jScrollPane1 = new javax.swing.JScrollPane();
        jTextArea1 = new javax.swing.JTextArea();
        jPanel1 = new javax.swing.JPanel();
        labelNome = new javax.swing.JLabel();
        jLabel2 = new javax.swing.JLabel();
        jLabel3 = new javax.swing.JLabel();
        jLabel4 = new javax.swing.JLabel();
        nomeFamiliarProximo = new javax.swing.JTextField();
        nomeMorador = new javax.swing.JTextField();
        cidadeNatal = new javax.swing.JTextField();
        grauParentesco = new javax.swing.JTextField();
        botaoGravar = new javax.swing.JButton();
        limparMR = new javax.swing.JButton();
        jLabel5 = new javax.swing.JLabel();
        cidadeAtual = new javax.swing.JTextField();
        sobrenomeMorador = new javax.swing.JTextField();
        labelSobrenome = new javax.swing.JLabel();
        labelData_nasc = new javax.swing.JLabel();
        data_nasc = new javax.swing.JTextField();

        jTextArea1.setColumns(20);
        jTextArea1.setRows(5);
        jScrollPane1.setViewportView(jTextArea1);

        jPanel1.setBorder(javax.swing.BorderFactory.createTitledBorder(javax.swing.BorderFactory.createLineBorder(new java.awt.Color(0, 0, 0)), "Cadastro de pessoas em situação de rua ", javax.swing.border.TitledBorder.CENTER, javax.swing.border.TitledBorder.DEFAULT_POSITION, new java.awt.Font("Tahoma", 1, 18))); // NOI18N

        labelNome.setText("Nome:");

        jLabel2.setText("Nome de um familiar próximo");

        jLabel3.setText("Grau de parentesco");

        jLabel4.setText("Cidade origem:");

        nomeFamiliarProximo.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                nomeFamiliarProximoActionPerformed(evt);
            }
        });

        nomeMorador.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                nomeMoradorActionPerformed(evt);
            }
        });

        grauParentesco.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                grauParentescoActionPerformed(evt);
            }
        });

        botaoGravar.setText("Cadastrar");
        botaoGravar.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                botaoGravarActionPerformed(evt);
            }
        });

        limparMR.setText("Limpar");

        jLabel5.setText("Cidade atual");

        cidadeAtual.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                cidadeAtualActionPerformed(evt);
            }
        });

        sobrenomeMorador.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                sobrenomeMoradorActionPerformed(evt);
            }
        });

        labelSobrenome.setText("Sobrenome");

        labelData_nasc.setText("Data de nascimento:");

        data_nasc.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                data_nascActionPerformed(evt);
            }
        });

        javax.swing.GroupLayout jPanel1Layout = new javax.swing.GroupLayout(jPanel1);
        jPanel1.setLayout(jPanel1Layout);
        jPanel1Layout.setHorizontalGroup(
            jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel1Layout.createSequentialGroup()
                .addContainerGap(18, Short.MAX_VALUE)
                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(jPanel1Layout.createSequentialGroup()
                        .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                            .addGroup(jPanel1Layout.createSequentialGroup()
                                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                                    .addComponent(jLabel2)
                                    .addComponent(labelNome))
                                .addGap(18, 18, 18)
                                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                                    .addComponent(nomeMorador, javax.swing.GroupLayout.PREFERRED_SIZE, 241, javax.swing.GroupLayout.PREFERRED_SIZE)
                                    .addComponent(nomeFamiliarProximo, javax.swing.GroupLayout.PREFERRED_SIZE, 243, javax.swing.GroupLayout.PREFERRED_SIZE)))
                            .addGroup(jPanel1Layout.createSequentialGroup()
                                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                                    .addComponent(labelData_nasc)
                                    .addComponent(jLabel4))
                                .addGap(18, 18, 18)
                                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING, false)
                                    .addComponent(cidadeNatal, javax.swing.GroupLayout.DEFAULT_SIZE, 243, Short.MAX_VALUE)
                                    .addComponent(data_nasc))))
                        .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                            .addGroup(jPanel1Layout.createSequentialGroup()
                                .addGap(18, 18, 18)
                                .addComponent(jLabel3))
                            .addGroup(jPanel1Layout.createSequentialGroup()
                                .addGap(58, 58, 58)
                                .addComponent(jLabel5)))
                        .addGap(17, 17, 17))
                    .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, jPanel1Layout.createSequentialGroup()
                        .addComponent(labelSobrenome)
                        .addGap(18, 18, 18)))
                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(grauParentesco, javax.swing.GroupLayout.PREFERRED_SIZE, 241, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(sobrenomeMorador, javax.swing.GroupLayout.PREFERRED_SIZE, 241, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(cidadeAtual, javax.swing.GroupLayout.PREFERRED_SIZE, 241, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addGap(60, 60, 60))
            .addGroup(jPanel1Layout.createSequentialGroup()
                .addGap(303, 303, 303)
                .addComponent(botaoGravar)
                .addGap(106, 106, 106)
                .addComponent(limparMR)
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
        );
        jPanel1Layout.setVerticalGroup(
            jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel1Layout.createSequentialGroup()
                .addGap(26, 26, 26)
                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(nomeMorador, javax.swing.GroupLayout.PREFERRED_SIZE, 45, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(labelNome, javax.swing.GroupLayout.PREFERRED_SIZE, 34, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(sobrenomeMorador, javax.swing.GroupLayout.PREFERRED_SIZE, 45, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(labelSobrenome, javax.swing.GroupLayout.PREFERRED_SIZE, 34, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addGap(46, 46, 46)
                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jLabel2, javax.swing.GroupLayout.PREFERRED_SIZE, 29, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(nomeFamiliarProximo, javax.swing.GroupLayout.PREFERRED_SIZE, 41, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(grauParentesco, javax.swing.GroupLayout.PREFERRED_SIZE, 46, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(jLabel3, javax.swing.GroupLayout.PREFERRED_SIZE, 36, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addGap(63, 63, 63)
                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(cidadeNatal, javax.swing.GroupLayout.PREFERRED_SIZE, 46, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(cidadeAtual, javax.swing.GroupLayout.PREFERRED_SIZE, 46, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(jLabel4, javax.swing.GroupLayout.PREFERRED_SIZE, 42, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(jLabel5, javax.swing.GroupLayout.PREFERRED_SIZE, 42, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(jPanel1Layout.createSequentialGroup()
                        .addGap(55, 55, 55)
                        .addComponent(labelData_nasc))
                    .addGroup(jPanel1Layout.createSequentialGroup()
                        .addGap(37, 37, 37)
                        .addComponent(data_nasc, javax.swing.GroupLayout.PREFERRED_SIZE, 51, javax.swing.GroupLayout.PREFERRED_SIZE)))
                .addGap(79, 79, 79)
                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(botaoGravar)
                    .addComponent(limparMR))
                .addContainerGap(205, Short.MAX_VALUE))
        );

        javax.swing.GroupLayout layout = new javax.swing.GroupLayout(getContentPane());
        getContentPane().setLayout(layout);
        layout.setHorizontalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addContainerGap()
                .addComponent(jPanel1, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addContainerGap(29, Short.MAX_VALUE))
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, layout.createSequentialGroup()
                .addContainerGap()
                .addComponent(jPanel1, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                .addContainerGap())
        );

        pack();
    }// </editor-fold>//GEN-END:initComponents

    private void nomeFamiliarProximoActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_nomeFamiliarProximoActionPerformed
        // TODO add your handling code here:
    }//GEN-LAST:event_nomeFamiliarProximoActionPerformed

    private void nomeMoradorActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_nomeMoradorActionPerformed
        // TODO add your handling code here:
    }//GEN-LAST:event_nomeMoradorActionPerformed

    private void grauParentescoActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_grauParentescoActionPerformed
        // TODO add your handling code here:
    }//GEN-LAST:event_grauParentescoActionPerformed

    private void cidadeAtualActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_cidadeAtualActionPerformed
        // TODO add your handling code here:
    }//GEN-LAST:event_cidadeAtualActionPerformed

    private void sobrenomeMoradorActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_sobrenomeMoradorActionPerformed
        // TODO add your handling code here:
    }//GEN-LAST:event_sobrenomeMoradorActionPerformed

    private void botaoGravarActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_botaoGravarActionPerformed
        gravar();        // TODO add your handling code here:
    }//GEN-LAST:event_botaoGravarActionPerformed

    private void data_nascActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_data_nascActionPerformed
        // TODO add your handling code here:
    }//GEN-LAST:event_data_nascActionPerformed

    private void gravar() {
        try {
            moradoresDTO.setPrimeiro_nome(nomeMorador.getText());
            moradoresDTO.setSegundo_nome(sobrenomeMorador.getName());
            moradoresDTO.setCidade_atual(cidadeAtual.getText());
            moradoresDTO.setCidade_natal(cidadeNatal.getText());
            moradoresDTO.setNome_familiar_proximo(nomeFamiliarProximo.getText());
            moradoresDTO.setGrau_parentesco(grauParentesco.getText());
            moradoresDTO.setData_nasc(data_nasc.getText());

            JOptionPane.showMessageDialog(null,
                    moradoresCTR.inserirMoradores(moradoresDTO, usuarioDTO));
        } catch (Exception e) {
            System.out.println("Erro ao Gravar" + e.getMessage());
        }
    }//Fecha método gravar()
    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JButton botaoGravar;
    private javax.swing.JTextField cidadeAtual;
    private javax.swing.JTextField cidadeNatal;
    private javax.swing.JTextField data_nasc;
    private javax.swing.JTextField grauParentesco;
    private javax.swing.JLabel jLabel2;
    private javax.swing.JLabel jLabel3;
    private javax.swing.JLabel jLabel4;
    private javax.swing.JLabel jLabel5;
    private javax.swing.JPanel jPanel1;
    private javax.swing.JScrollPane jScrollPane1;
    private javax.swing.JTextArea jTextArea1;
    private javax.swing.JLabel labelData_nasc;
    private javax.swing.JLabel labelNome;
    private javax.swing.JLabel labelSobrenome;
    private javax.swing.JButton limparMR;
    private javax.swing.JTextField nomeFamiliarProximo;
    private javax.swing.JTextField nomeMorador;
    private javax.swing.JTextField sobrenomeMorador;
    // End of variables declaration//GEN-END:variables
}
