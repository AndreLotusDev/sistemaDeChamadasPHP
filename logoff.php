<?php 
    // Destroi a seção atual para fazer logoff
    session_destroy();

    header("Location: index.php")
?>