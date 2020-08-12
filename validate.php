<?php 
  session_start();
  // Redireciona o usuário caso nao tenha logado para a página de login
  if($_SESSION['authenticated'] != 'yes' && $_SESSION['authenticated'] == 'no')
  {
    header("Location: index.php?login=error2");
  }
?>