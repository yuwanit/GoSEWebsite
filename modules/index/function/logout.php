<?php

if(empty($_SESSION['admin_id']))
{
    header('Location: '.PATH);
}

$_TEMFILE = 'main2';

unset($_SESSION['admin_id']);

$_SCP = '<script>
				alert("คุณได้ออกจากระบบเรียบร้อยแล้ว");
				window.location = "'.PATH.'";
			</script>';

?>