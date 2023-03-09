<?php require '../../inc/core.php'; ?>

<?php $x_sql = mysql_query("SELECT * FROM messages WHERE user_to='$user[id]' AND visibility='1' AND `date` BETWEEN DATE_SUB(NOW() , INTERVAL 15 SECOND) AND NOW();"); while($x = mysql_fetch_assoc($x_sql)){ ?>
<audio id="myVideo">
<source src="assets/media/alert.mp3" type="audio/mpeg">
Your browser does not support the audio element.
</audio>
<script>
var btnNotificacion = document.getElementById("buttonN"),  
    btnPermiso = document.getElementById("buttonP")
    titulo = "Mensaje de <?php echo getAdmin($x['user_from']); ?> | <?php echo substr($x['date'], 11, 5); ?>",
    opciones = {
        icon: "<?php echo $config['site']; ?>/assets/images/favicon.png",
        body: "<?php echo $x['message']; ?>"
    };
var n = new Notification(titulo, opciones);
//alert("Mensaje emitido por <?php echo getAdmin($x['user_from']); ?> hoy a las <?php echo substr($x['date'], 11, 5); ?>: \n<?php echo $x['message']; ?>");
</script>
<script>
var vid = document.getElementById("myVideo");
vid.autoplay = true;
vid.load();
</script>
<?php } ?>
<!--button id="buttonP">Dar Permisos</button>  
<button id="buttonN">Lanzar notificación</button-->
<script>
btnNotificacion = buttonP
btnPermiso = buttonN
function permiso() {  
        Notification.requestPermission();
};
//
function mostrarNotificacion() {  
    if(Notification) {
        if (Notification.permission == "granted") {
            alert('xd');
        }

        else if(Notification.permission == "default") {
            alert("Primero da los permisos de notificación");
        }

        else {
            alert("Bloqueaste los permisos de notificación");
        }
    }
};

btnPermiso.addEventListener("click", permiso);  
btnNotificacion.addEventListener("click", mostrarNotificacion);
</script>