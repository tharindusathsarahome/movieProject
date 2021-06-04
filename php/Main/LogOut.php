<?php

session_start();

// 2. Unset all the session variables
unset($_SESSION['MEMBER_ID']);
unset($_SESSION['FIRST_NAME']);
unset($_SESSION['LAST_NAME']);

?>
<script type="text/javascript">
alert("Successfully logout!");
window.location = "../../index.php";
</script>