<?php
$titulo_pagina = "Insira os dados da pessoas procurada";
require_once "header.php";
?>
            <div class="m-5">
                <div class="m-5 fs-5 p-3">
                    <div class="border">
                    <form action="pesquisa.php" method="post">
                        <div class="input-group input-group-lg p-1">
                            <input type="text" placeholder="Primeiro nome:" name="pnome" id="pnome" class="form-control">
                        </div>
                        <div class="input-group input-group-lg p-1">
                            <input type="text" placeholder="Nome Familiar:" name="nome_familiar" id="nome_familiar" class="form-control">
                            <input type="text" placeholder="Sobrenome:" name="sobrenome" id="sobrenome" class="form-control">
                        </div>
                        <div class="input-group input-group-lg p-1">
                            <input type="text" maxlength="9" onfocusout="buscarCEP()" onkeyup="handleZipCode(event)" class="form-control" placeholder="CEP" name="endereco_cep" id="endereco_cep"/>
                            <input type="text" placeholder="Cidade:" name="endereco_cidade" id="endereco_cidade" class="form-control">
                            <input type="text" placeholder="Estado:" name="endereco_estado" id="endereco_estado" class="form-control">
                        </div>
                        <div class="input-group input-group-lg p-3">
                            <button type="submit" class="btn btn-success">Enviar</button>
                            <button type="reset" class="btn btn-danger text-light">Limpar</button>
                        </div>
                    </form>
                </div>
                </div>          
            </div>
        </div>
    </div>
</div>
<script>
    
     const handleZipCode = (event) => {
       let input = event.target
       input.value = zipCodeMask(input.value)
     }

     const zipCodeMask = (value) => {
       if (!value) return ""
       value = value.replace(/\D/g,'')
       value = value.replace(/(\d{5})(\d)/,'$1-$2')
       return value
     }
      const buscarCEP = (event) => {
        let input = event.target
       input.value = getCEP(input.value)
      }
      const getCEP = (value) => {
        let cep = document.getElementById("endereco_cep").value;
        let url = "https://brasilapi.com.br/api/cep/v1/" + cep;

        fetch(url).then(function (dados) {
          dados.json().then(function (endereco) {endereco_
        document.getElementById("endereco_cidade").value = endereco.city;
        document.getElementById("endereco_estado").value = endereco.state;
      }
</script>
<?php
require_once "footer.php";
?>
