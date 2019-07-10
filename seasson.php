<?php
if(strlen(session_id()) < 1) {
	session_start();
}
if(! $_SESSION['id']) { ?>
	<script language="javascript" type="text/javascript">
		alert("You need to Login");
		location.replace("login.php");
	</script>
<?php } ?>