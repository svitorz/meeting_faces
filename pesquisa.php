<?php 
$titulo_pagina = "Pessoas cadastradas";
require_once "header.php";
$person_name = "Example Name";
$person_text = "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nostrum vero culpa laborum. Voluptatem at, odit ullam est iste quisquam quaerat tenetur alias, et quam quo vero, aspernatur quas omnis repellendus!
";
?>
        <div class="m-5">
                <div class="m-5">
                    <div class="row">
                    <?php 
                        for($i=0; $i<=10;$i++){
                            echo "<div class='card col-2 m-1' style='width: 18rem;'>
                            <img src='' class='card-img-top' alt='...'>
                            <div class='card-body'>
                              <h5 class='card-title'>{$person_name}</h5>
                              <p class='card-text'>{$person_text}</p>
                              <a href='contato.php?id=' class='btn btn-primary'>Saiba mais!</a>
                            </div>
                          </div>";
                        }
                    ?>     
                    </div>       
                </div>          
            </div>
    </div>
<?php 
require_once "footer.php";
?>