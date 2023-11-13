</main>
<?php
$mensagem = '';
    if(isset($_GET['status'])){
        switch($_GET['status']){
            case 'success':
                $mensagem = "<div class='alert alert-success'> Ação executada com sucesso</div>";

            break;

            case 'error':
                $mensagem = "<div class='alert alert-danger'> Ação não executada</div>";
            break;
        }
    }


    //gets
    unset($_GET['status']);
    unset($_GET['pagina']);
    $gets = http_build_query($_GET);

    //paginacao
    $paginacao = '';
    $paginas = $obPagination->getPages();

    foreach($paginas as $key=>$pagina){
        if($pagina['atual']){
            $class = "btn-primary";
        }
        else{
            $class = "btn-light";
        }

        $paginacao .= '<a href="?pagina='.$pagina['pagina'].'&'.$gets.'"><button type="button" class="btn '.$class.'"> '.$pagina['pagina'].' </button></a>';
    }

    ?>
<main class="d-flex justify-content-center">
      <!--Principal-->
      <div
        class="principal bg-white shadow d-flex flex-column align-items-center"
      ><br>
      <?= $mensagem ?>
      <div class="linha1 d-flex flex-row align-items-center justify-content-between w-100 pr-5 pl-5">
        <h1 class="mt-5 mb-5">Usuários</h1>
          <form class="d-flex flex-row" method='get'>
            <input class="form-control" type="text" name='busca' placeholder="Pesquisar" value='<?=$busca?>'>
            <button
                class="btn mb-2 text-white d-flex align-items-center justify-content-center"
                style="background-color: #aa0000; border: hidden"
              ><svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="m21 21l-4.343-4.343m0 0A8 8 0 1 0 5.343 5.343a8 8 0 0 0 11.314 11.314Z"/></svg></button>
          </form>
      
      </div>
        <!--Linha 1 de pets-->
        
        <div class="cards w-100 d-flex flex-row justify-content-start pt-3 flex-wrap">
        <?php
        
        foreach($usuarioListar as $usuariosa){
        
        ?>

          <a class="text-body m-5" href="usuario.php?id=<?=$usuariosa->Cod_Funcionario?>">
            <div class="card rounded-3 bg-white d-flex flex-column align-items-center shadowzinho" style="width: 20rem; height: 28rem">
              <div style="width: 20rem; height: 20rem">
                <img style="object-fit: cover;" class="rounded-2 shadowzinho" src="files/<?=$usuariosa->Img_Funcionario?>" alt=""/>
              </div>
              <div class="nome w-100 d-flex align-items-center justify-content-center border-bottom border-dark bd-highlight bg-white"  style="height: 4rem">
                <svg class="w-100" xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48">
                  <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="4">
                    <circle cx="24" cy="11" r="7" />
                    <path d="M4 41c0-8.837 8.059-16 18-16m9 17l10-10l-4-4l-10 10v4h4Z"/>
                  </g>
                </svg>
                <h3 class="d-flex align-items-center justify-content-center w-100 flex-grow-1"> <?=$usuariosa->Nome_Funcionario?> </h3>
                <div class="w-100"></div>
              </div>
              <div class="sexo w-100 d-flex align-items-center justify-content-center bd-highlight bg-white rounded-4" style="height: 4rem">
                <svg class="w-100" xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 36 36">
                  <g id="clarityEmployeeLine0" fill="currentColor"><path d="M16.43 16.69a7 7 0 1 1 7-7a7 7 0 0 1-7 7Zm0-11.92a5 5 0 1 0 5 5a5 5 0 0 0-5-5ZM22 17.9a25.41 25.41 0 0 0-16.12 1.67a4.06 4.06 0 0 0-2.31 3.68v5.95a1 1 0 1 0 2 0v-5.95a2 2 0 0 1 1.16-1.86a22.91 22.91 0 0 1 9.7-2.11a23.58 23.58 0 0 1 5.57.66Zm.14 9.51h6.14v1.4h-6.14z"/>
                    <path d="M33.17 21.47H28v2h4.17v8.37H18v-8.37h6.3v.42a1 1 0 0 0 2 0V20a1 1 0 0 0-2 0v1.47H17a1 1 0 0 0-1 1v10.37a1 1 0 0 0 1 1h16.17a1 1 0 0 0 1-1V22.47a1 1 0 0 0-1-1Z"/>
                  </g>
                </svg>
                <h3 class="d-flex align-items-center justify-content-center w-100 flex-grow-1"> <?=$usuariosa->Atribuicao_Funcionario?></h3>
                <div class="w-100"></div>
            </div></div>
        </a>

<?php } ?>

        </div>
        <section>
        <?=$paginacao?>
    </section>
        </div>
      </div>
    </main>