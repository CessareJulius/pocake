<?php

echo $this->Form->input("nombre");
echo $this->Form->input("apellido");
echo $this->Form->input("email", ['label' => 'Correo Electronico']);
echo $this->Form->input("clave", ['label' => 'Contraseña', 'type' => 'password', 'value' => '', 'required']);
echo $this->Form->input("active", ['type' => 'checkbox']);

?>