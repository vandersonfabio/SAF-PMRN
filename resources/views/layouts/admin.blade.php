<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistema de Administração da Frota | PMRN</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('css/_all-skins.min.css')}}">
    <link rel="apple-touch-icon" href="{{asset('img/apple-touch-icon.png')}}">
    <link rel="shortcut icon" href="{{asset('img/favicon.ico')}}">    

  </head>
  <body class="hold-transition skin-purple sidebar-mini">
    <div class="wrapper">

      <header class="main-header">

        <!-- Logo -->
        <a href="index2.html" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>SAF</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg">SAF - PMRN</span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegação</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <small class="bg-blue">Usuário logado:</small>
                  <span class="hidden-xs">{{ Auth::user()->patente }} {{ Auth::user()->nomeFuncional }} ({{ Auth::user()->matricula }})</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <p>
                      Para uma maior segurança, lembre sempre de sair do sistema ao finalizar suas tarefas. 
                      <small>Utilize o botão abaixo para sair da seção.</small>
                    </p>
                    <a href="{{ route('logout') }}" class="btn btn-default btn-flat">SAIR DO SISTEMA</a>
                  </li>
                  
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    
                    <div class="pull-right">
                      <a href="#" class="btn btn-default btn-flat">Fechar</a>
                    </div>
                  </li>
                </ul>
              </li>
              
            </ul>
          </div>

        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
                    
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header"></li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-laptop"></i>
                <span>Viaturas</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="../modelo"><i class="fa fa-circle-o"></i> Modelos</a></li>
                <li><a href="../proprietario"><i class="fa fa-circle-o"></i> Proprietários</a></li>
                <li><a href="../viatura"><i class="fa fa-circle-o"></i> Viaturas</a></li>
              </ul>
            </li>                     
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-th"></i>
                <span>Setores</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="../../setor"><i class="fa fa-circle-o"></i> Setores</a></li>
                <li><a href="../../policial"><i class="fa fa-circle-o"></i> Responsáveis</a></li>
              </ul>
            </li>      
            
            <li>
              <a href="../../unidade">
                <i class="fa fa-info-circle"></i> <span>Unidades</span>
              </a>
            </li>

            <li>
              <a href="../../relatorio">
                <i class="fa fa-plus-square"></i> <span>Relatórios</span>
                <small class="label pull-right bg-red">PDF</small>
              </a>
            </li>
            <li>
              <a href="" data-target="#modal-about" data-toggle="modal">
                <i class="fa fa-info-circle"></i> <span>Sobre...</span>
                <small class="label pull-right bg-yellow">IT</small>
              </a>
            </li>
                        
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>


       <!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        
        <!-- Main content -->
        <section class="content">
          
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Sistema de Administração da Frota | PMRN</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                      <div class="col-md-12">
                              <!--Conteudo-->
                              @yield('conteudo')
                              <!--Fim Conteudo-->
                           </div>
                        </div>                        
                      </div>
                    </div><!-- /.row -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <!--Fin-Contenido-->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Laravel</b> Versão 5.8.14
        </div>
        <strong>Copyright &copy; 2019-2019 <a href="https://github.com/vandersonfabio" target="_blank">Sd PM Vanderson</a>.</strong> Todos os direitos reservados.
      </footer>

      <div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-about">        
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" 
                    aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title">Sobre o sistema</h4>
                </div>
                <div class="modal-body">
                    <p>O sistema <b>Controle Carga</b> foi desenvolvido através da parceria entre o 6º Batalhão
                    de Polícia Militar e a Universidade Federal do Rio Grande do Norte com o intuito de agilizar
                    os processos que envolvem à administração de itens que compõem a carga desta OPM.</p>
                    <p>A equipe de desenvolvimento prezou pela construção de uma interface simples, eficiente e amigável
                    que pudesse proporcionar uma boa usabilidade independente do grau de familiaridade do usuário
                    com sistemas informatizados.</p>
                    <p>Esperamos que o objetivo tenha sido alcançado.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>                    
                </div>
            </div>
        </div>
    </div>

      
    <!-- jQuery 2.1.4 -->
    <script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('js/app.min.js')}}"></script>
    <!-- Máscaras de input -->
    <script src="jquery.js" type="text/javascript"></script>
    <script src="jquery.maskedinput.js" type="text/javascript"></script> 
    
  </body>
</html>
