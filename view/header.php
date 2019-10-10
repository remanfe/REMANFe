<header class="main-header">
    <!-- Logo -->
    <a href="../index.php" class="logo">
        <!-- mini logotipo para barra lateral 50x50 pixels -->
        <span class="logo-mini"><b>RMF</b></span>
        <!-- logotipo para estado regular e dispositivos móveis -->
        <!--<span class="logo-lg"><b>REMANFe</b></span>-->
        <img src="../components/images/sigla-branco.png" class="img-responsivo">
    </a>
    <!-- Header Navbar: o estilo pode ser encontrado em header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Menu lateral</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account: o estilo pode ser encontrado em dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown">
                        <span><i class="fa fa-user-o"></i>
                            <?php
                            if ($_SESSION['tipo_usuario'] == 0) {
                                echo $_SESSION['nome_admin'] . "";
                            } else if ($_SESSION['tipo_usuario'] == 1) {
                                echo $_SESSION['nome_cont'] . "";
                            } else if ($_SESSION['tipo_usuario'] == 2) {
                                echo $_SESSION['nome_empresa'] . "";
                            }
                            ?>
                        </span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- Imagem do usuário -->
                        <li class="user-header">
                            <?php
                            if ($_SESSION['tipo_usuario'] == 0) {
                                echo '<img src="../components/dist/img/boss.png" class="img-circle" alt="Imagem de Perfil">';
                            } else if ($_SESSION['tipo_usuario'] == 1) {
                                echo '<img src="../components/dist/img/network.png" class="img-circle" alt="Imagem de Perfil">';
                            } else if ($_SESSION['tipo_usuario'] == 2) {
                                echo '<img src="../components/dist/img/network.png" class="img-circle" alt="Imagem de Perfil">';
                            }
                            ?>
                            <p>
                                <?php
                                if ($_SESSION['tipo_usuario'] == 0) {
                                    echo $_SESSION['nome_admin'] . " - Administrador";
                                } else if ($_SESSION['tipo_usuario'] == 1) {
                                    echo $_SESSION['nome_cont'] . " - Contador";
                                } else if ($_SESSION['tipo_usuario'] == 2) {
                                    echo $_SESSION['nome_empresa'] . " - Empresa";
                                }
                                ?>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat">Dados cadastrais</a>
                            </div>
                            <div class="pull-right">
                                <a href="../controller/logout.php" class="btn btn-default btn-flat">Sair</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <!-- /.header -->
</header>