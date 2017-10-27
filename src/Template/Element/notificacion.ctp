<script>
    function prueba_notificacion() {
if (Notification) {
if (Notification.permission !== "granted") {
Notification.requestPermission()
}
var title = "Xitrus"
var extra = {
icon: "http://xitrus.es/imgs/logo_claro.png",
body: "<?= $message ?>"
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

prueba_notificacion();
</script> 

