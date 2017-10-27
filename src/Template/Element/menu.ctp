    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Menu de Navegacion</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <?= $this->Html->Link('POCAKE', ['controller' => 'Pages', 'action' => 'inicio'], ['Class'=> 'navbar-brand']);?>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
      <?php 
            if (isset($current_user) and $current_user['role'] == 'admin'):     
      ?>
      <ul class="nav navbar-nav">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Usuarios<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><?= $this->Html->Link('Listar Usuarios', ['controller' => 'Users', 'action' => 'index']);?></li>
              <li><?= $this->Html->Link('Crear Usuarios', ['controller' => 'Users', 'action' => 'add']);?></li>
            </ul>
          </li>
        </ul>
        <ul class="nav navbar-nav">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Bookmarks<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">Listar Bookmarks</a></li>
              <li><a href="#">Agregar Bookmarks</a></li>
            </ul>
          </li>
        </ul>
        <ul class="nav navbar-nav">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Reportes <span class="caret"></span></a>
            <ul class="dropdown-menu ">
              <li><a href="#">Todos los Usuarios</a></li>
              <li><a href="#">Todos los Bookmarks</a></li>
              <li role="separator" class="divider"></li>
              <li class="dropdown-header">Otros</li>
              <li><a href="#">None</a></li>
            </ul>
          </li>
        </ul>
        <?php endif ?>
        <ul class="nav navbar-nav navbar-right">
          
        <?php 
            if (!isset($current_user)):     
        ?>
          <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Login</b> <span class="caret"></span></a>
			<ul id="login-dp" class="dropdown-menu">
				<li>
					 <div class="row">
							<div class="col-md-12">
                            <p><center>Ingrese sus Datos</center></p>
                            <?= $this->Form->create('', ['url' => ['controller' => 'users', 'action' => 'login']]) ?>  
										<div class="form-group">
                                            <?= $this->Form->input('email', ['class' => 'form-control','id' => 'exampleInputEmail2', 'placeholder' => 'Correo Electronico', 
                                                'label' => false, 'required', 'autofocus']) ?>
										</div>
										<div class="form-group">
                                            <?= $this->Form->input('clave', ['class' => 'form-control','id' => 'exampleInputPassword2', 'type' => 'password','placeholder' => 'Contraseña', 
                                                'label' => false, 'required']) ?>
                                        <div class="help-block text-right"><a href="">Olvido su Contraseña ?</a></div>
										</div>
										<div class="form-group">
                                            <?= $this->Form->button('Ingresar',['class' => 'btn btn-primary btn-block']) ?>
                                        </div>
                                 <?= $this->Form->end() ?>
							</div>
							<div class="bottom text-center">
                                Eres nuevo?
                                <?= $this->Html->link('Registrate', ['controller' => 'Users', 'action' => 'add']); ?>
							</div>
					 </div>
				</li>
			</ul>
        </li>
            <?php endif;  
            if (isset($current_user)):     
        ?>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Sr. <?= $current_user['nombre'] . ' ' . $current_user['apellido']?><span class="caret"></span></a>
            <ul class="dropdown-menu">
                <li><?= $this->Html->link('Perfil', ['controller' => 'Users', 'action' => 'view', $current_user['id']]) ?></li>
                <li><a href="#">Configuracion</a></li>
                <li role="separator" class="divider"></li>
                <li><?= $this->Html->link('Salir', ['controller' => 'Users', 'action' => 'logout']) ?></li>
            </ul>
          </li>
        <?php endif ?>
                


        </ul>
        
        <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Busqueda">
            <button id="enviar" class="btn " type="submit">Buscar</button>
        </form>
      </div><!--/.nav-collapse -->
    </div>
  </nav>