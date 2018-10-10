<!doctype html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="robots" content="index,follow">
        <link rel="stylesheet" href="<?php echo BASE_URL;?>assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL;?>assets/css/style.css">
        <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
        <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
        <title><?php echo $this->config['sitename'];?></title>
        <?php if($viewName == 'postRead'):?>
        <meta property="og:url" content="<?php echo BASE_URL.$viewData['post']['id'].'/'.$viewData['post']['uri'];?>">
        <meta property="og:type" content="website">
        <meta property="og:title" content="<?php echo $viewData['post']['title'];?>">
        <meta property="og:image" content="<?php echo BASE_URL;?>assets/images/tf.jpg">
        <?php else:?>
        <meta property="og:url" content="<?php echo BASE_URL;?>">
        <meta property="og:type" content="website">
        <meta property="og:title" content="<?php echo $this->config['sitename'];?>">
        <meta property="og:image" content="<?php echo BASE_URL;?>assets/images/tf.jpg">
        <meta property="og:description" content="<?php echo strip_tags($this->config['description']);?>">
        <?php endif;?>
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({
                google_ad_client: "ca-pub-6901978130342871",
                enable_page_level_ads: true
            });
        </script>
    </head>
    <body>
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="<?php echo BASE_URL;?>"><i class="fa fa-fw fa-code"></i> <?php echo $this->config['author'];?></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo BASE_URL;?>" data-toggle="tooltip" data-placement="bottom" title="Início"><i class="fa fa-fw fa-home"></i> <span class="d-inline d-sm-none"> Home</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://www.linkedin.com/in/furlanthiago/" target="_blank" title="Linkedin" data-toggle="tooltip" data-placement="bottom" title="Linkedin"><i class="fab fa-fw fa-linkedin"></i><span class="d-inline d-sm-none"> Linkedin</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://www.facebook.com/thiago.furlan" target="_blank" title="Facebook" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fab fa-fw fa-facebook"></i><span class="d-inline d-sm-none"> Facebook</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://github.com/thiagofurlan" target="_blank" title="GitHub" data-toggle="tooltip" data-placement="bottom" title="GitHub"><i class="fab fa-fw fa-github"></i><span class="d-inline d-sm-none"> Github</span></a>
                        </li>
                        <!--<li class="nav-item">
                            <a class="nav-link" href="https://play.google.com/store/apps/developer?id=Thiago+Furlan" target="_blank" title="Google Play" data-toggle="tooltip" data-placement="bottom" title="Google Play"><i class="fab fa-fw fa-google-play"></i><span class="d-inline d-sm-none"> Google Play</span></a>
                        </li>-->
                        <?php if(isset($_SESSION['id'])):?>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="<?php echo BASE_URL;?>configuracoes" data-toggle="tooltip" data-placement="bottom" title="Configurações"><i class="fa fa-fw fa-cog"></i><span class="d-inline d-sm-none"> Configurações</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="<?php echo BASE_URL;?>posts/" data-toggle="tooltip" data-placement="bottom" title="Postagens"><i class="fa fa-fw fa-newspaper"></i><span class="d-inline d-sm-none"> Postagens</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo BASE_URL;?>conta/sair" title="Sair" data-toggle="tooltip" data-placement="bottom" title="Sair"><i class="fa fa-fw fa-sign-out-alt"></i><span class="d-inline d-sm-none"> Sair</span></a>
                        </li>
                        <?php else:?>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-toggle="modal" data-target="#login" title="Login"><i class="fa fa-fw fa-sign-in-alt"></i><span class="d-inline d-sm-none"> Entrar</span></a>
                        </li>
                        <?php endif;?>
                    </ul>
                </div>
            </div>
        </nav>
        <?php $this->loadViewInTemplate($viewName, $viewData); ?>
        <div class="mb-5"></div>
        <script src="<?php echo BASE_URL;?>assets/js/jquery-3.2.1.min.js"></script>
        <script src="<?php echo BASE_URL;?>assets/js/popper.min.js"></script>
        <script src="<?php echo BASE_URL;?>assets/js/bootstrap.min.js"></script>
        <script src="<?php echo BASE_URL;?>vendor/ckeditor/ckeditor.js"></script>
        <script type="text/javascript">$(function(){$('[data-toggle="tooltip"]').tooltip()})</script>
        <!-- Modal Login -->
        <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="login">Acesso</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="<?php echo BASE_URL;?>">
                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <input class="form-control" type="email" id="email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="senha">Senha</label>
                                <input class="form-control" type="password" id="password" name="password" required>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-secondary btn-block">Entrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>