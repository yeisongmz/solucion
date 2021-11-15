<?php
// Initialize the session.
// If you are using session_name("something"), don't forget it now!
session_start();

// Unset all of the session variables.
$_SESSION = array();

// If it's desired to kill the session, also delete the session cookie.
// Note: This will destroy the session, and not just the session data!
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Finally, destroy the session.
session_destroy();
//window.location 
//,'_self',false
//top.window.close();
//javascript:q=(document.location.href);void(open('http://example.com/submit.php?url='+escape(q),'_self','resizable,location,menubar,toolbar,scrollbars,status'));">
//echo "<script type='text/javascript'>window.parent.document.getElementById('leftFrame').close; window.parent.document.getElementById('mainFrame').close;window.location='logeo.php'; <script>";
//header("Location: logeo.php"); 
//exit();
?>
<script type="text/javascript">


//ventana=window.self; 
//ventana.opener=window.self; 
//ventana.close(); 
//window.close();
//window.parent.location.href ='logeo.php';
//window.navigate('logeo.php');
self.location='logeo.php';
//window.open('logeo.php');

</script>