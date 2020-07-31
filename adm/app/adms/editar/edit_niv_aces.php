<?php
//Segurança para não consiguir acessa páginas indo direto na URL .
if (!isset($seguranca)) {
    exit;
}
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if($id){
	if($_SESSION['adms_niveis_acesso_id'] == 1){
		$result_nivac_ed = "SELECT * FROM adms_niveis_acessos WHERE id=$id LIMIT 1";
	} else {
		$result_nivac_ed = "SELECT * FROM adms_niveis_acessos WHERE ordem > '".$_SESSION['ordem']."' AND LIMIT 1";
	}

	$resultado_nivac_ed = mysqli_query($conn, $result_nivac_ed);
	$row_niac_ed = mysqli_fetch_assoc($resultado_nivac_ed);
	if(($resultado_nivac_ed)AND($resultado_nivac_ed->num_rows !=0)){
include_once 'app/adms/include/head.php';
?>
<body>
    <?php
    include_once 'app/adms/include/header.php';
    ?>
    <div class="d-flex">
        <?php
        include_once 'app/adms/include/menu.php';
        ?>
        <div class="content p-1">
            <div class="list-group-item">
                <div class="d-flex">
                    <div class="mr-auto p-2">
                        <h2 class ="display-4 titulo"> Editar Nível de Acesso </h2>
                    </div>
                    <div class="p-2">
                        <?php
                        $btn_list = carregar_btn('listar/list_niv_aces', $conn);
                        if ($btn_list) {
                            echo "<a href='" . pg . "/listar/list_niv_aces' class='btn btn-outline-info btn-sm'>Listar</a> ";
                        }
                        ?>
                    </div>
                </div><hr>
                <?php
                if (isset($_SESSION['msg_de_erro'])) {
                    echo $_SESSION['msg_de_erro'];
                    unset($_SESSION['msg_de_erro']);
                }
                ?>

                <form method="POST" action="<?php echo pg; ?>/processa/proc_edit_niv_aces">
				<input type="hidden" name="id" value="<?php if(isset($row_niac_ed['id'])){echo $row_niac_ed['id'];}?>">
                    <div class="form-group">
                        <label for="inputAddress"> <span class="text-danger">*</span> Nome</label>
                        <input name="nome" type="text" class="form-control" placeholder="Nome do nível de acesso" value="<?php
							if(isset($row_niac_ed['nome'])){echo $row_niac_ed['nome'];}
						?>">
                    </div>
                    <p>
                        <span class="text-danger">* </span>Campo Obrigatório
                    </p>
                    <input name="SendEditNivAc" type="submit" class="btn btn-warning" value="Salvar">
                </form>
            </div>
        </div>
        <?php
        include_once 'app/adms/include/rodape_lib.php';
        ?>
    </div>
</div>
</body>
	<?php
	}else {
	$_SESSION['msg_de_erro'] = "<div class='alert alert-danger'>Nível de acesso não encontrado!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
    $url_destino = pg . '/listar/list_niv_aces';
    header("Location: $url_destino");
	}
 }else {
	 $_SESSION['msg_de_erro'] = "<div class='alert alert-danger'>Nível de acesso não encontrado!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
    $url_destino = pg . '/listar/list_niv_aces';
    header("Location: $url_destino");
 }

 