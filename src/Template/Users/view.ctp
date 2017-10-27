<?php
    if($user->role == 'admin'){
        $tipo = 'Administrador';
    }else{
        $tipo = 'Usuario';
    }
?>

<div class="well">
    <h3>Detalles de la Cuenta <?= $tipo.': '. $user->nombre . ' ' . $user->apellido ?> 
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <?php
            echo $this->HTML->Link("Editar Datos", ['action'=> 'edit', $user->id]);
    ?>
    </h4>
    <dl>
        <dt>Nombre</dt>
        <dd>
            <?= $user->nombre ?> 
        </dd>
        <br>

        <dt>Apellido</dt>
        <dd>
            <?= $user->apellido ?>
        </dd>
        <br>

        <dt>Correo Electronico</dt>
        <dd>
            <?= $user->email ?> 
        </dd>
        <br>

        <dt>Habilitado</dt>
        <dd>
            <?= $user->active ? 'SI' : 'NO' ?> 
        </dd>
        <br>

        <dt>Creado</dt>
        <dd>
            <?= $user->created->nice() ?> 
        </dd>
        <br>

        <dt>Modificado</dt>
        <dd>
            <?= $user->modified->nice() ?> 
        </dd>
        <br>
    </dl>

</div>