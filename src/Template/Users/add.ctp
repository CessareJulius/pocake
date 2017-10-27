<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="page-header">
            <h2>Crear Usuario</h2>
        </div>
        <?= $this->Form->create($user) ?>
        <fieldset>
            <?php

                echo $this->Form->input("nombre");
                echo $this->Form->input("apellido");
                echo $this->Form->input("email", ['label' => 'Correo Electronico']);
                echo $this->Form->input("clave", ['label' => 'Contraseña', 'type' => 'password', 'value' => '', 'required']);
            ?>
        </fieldset>
        <?php
            echo $this->Form->button("Crear Usuario", ['Class' => 'btn btn-success']);
            echo $this->Form->end();
        ?>
    </div>
</div>
