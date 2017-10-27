<?= $this->Flash->render() ?>
<script>
    function prueba_notificacion() {
if (Notification) {
if (Notification.permission !== "granted") {
Notification.requestPermission()
}
var title = "Xitrus"
var extra = {
icon: "http://xitrus.es/imgs/logo_claro.png",
body: "que lo que"
}
var noti = new Notification( title, extra)
noti.onclick = {
// Al hacer click
}
noti.onclose = {
// Al cerrar
}
setTimeout( function() { noti.close() }, 10000)
}
}

</script>

<h1>Bienvenido Sr. <?= $current_user['nombre'] . ' ' . $current_user['apellido']?></h1>

           

<div class="XITRUS_noti">
	<input type="button" value="Notificación" onclick="prueba_notificacion()">
</div>
