<?php  
 
session_start();
session_destroy();  
session_regenerate_id();


?>
<script type="text/javascript" src="js/FaceBook.js"></script>



<?php
header( 'Location: ../index.php' ) ; 
?>  




