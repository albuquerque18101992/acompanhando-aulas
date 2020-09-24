<?php
//Segurança para não consiguir acessa páginas indo direto na URL .
if (!isset($seguranca)) {
    exit;
}

$result_user_hd = "SELECT id, nome, imagem FROM adms_usuarios WHERE id='" . $_SESSION['id'] . "' LIMIT 1";
$resultado_user_hd = mysqli_query($conn, $result_user_hd);
$row_user_hd = mysqli_fetch_assoc($resultado_user_hd);
$nome = explode(" ", $row_user_hd['nome']);
$prim_nome = $nome[0];


$niv_acesso = "SELECT id, nome FROM adms_niveis_acessos WHERE id='" . $_SESSION['adms_niveis_acesso_id'] . "' LIMIT 1";
$nivel_acesso = mysqli_query($conn, $niv_acesso);
$row_nivel_acesso = mysqli_fetch_assoc($nivel_acesso);
?>



<nav class="navbar navbar-expand navbar-dark bg-success">
    <a class="sidebar-toggle text-light mr-3"><span class="navbar-toggler-icon"></span></a>
    <!--<a class="navbar-brand" href="#">INTS</a>-->
    <img src="<?php echo pg; ?>/assets/imagens/logo_login/ints-logo-barra.png">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle menu-header" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">
                    <?php
                    if (!empty($row_user_hd['imagem'])) {
                        echo " <img class = 'rounded-circle' src = '" . pg . "/assets/imagens/usuario/" . $row_user_hd['id'] . "/" . $row_user_hd['imagem'] . "' width = '20' height = '20'>";
                    } else {
                        echo " <img class = 'rounded-circle' src = '" . pg . "/assets/imagens/usuario/icone_usuario.png' width = '20' height = '20'>";
                    }
                    ?>
                    &nbsp <span class="d-none d-sm-inline"><?php echo $prim_nome; ?></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" id="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#"> <i class="fas fa-user"></i> Perfil</a>
                    <a class="dropdown-item" href="<?php echo pg; ?> /acesso/sair"> <i class="fa fa-power-off"></i> Sair</a> 
                    <a class="dropdown-item"><i class="fa fa-unlock-alt" aria-hidden="true"></i> <?php echo $row_nivel_acesso['nome']; ?></a>
                </div>
            </li>
        </ul>
    </div>
</nav>