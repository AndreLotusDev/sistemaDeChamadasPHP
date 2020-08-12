<?php 
    // Inicia a sessão
    session_start();

    // Boolean que verifica se o usuário é credenciado ou não
    $user_sucess_login = false;

    // O id é nulo enquanto nao saber quem é o usuário
    $user_id = null;
    $type_of_user = null;

    $_SESSION['authenticated'] = 'no';

    // Tipos de perfil

    $admin_or_user = array(1 => "Admin", 2 => "User");

    // Usuarios do sistema e sistema de autentetiação
    $app_user = array(
        array("id" => 1,"email" => "adm@yahoo.com", "password" => "1", 'admin_or_user' => 1),
        array("id" => 2,"email" => "user@yahoo.com", "password" => "1", 'admin_or_user' => 1),
        array("id" => 3,"email" => "jose@yahoo.com", "password" => "1", 'admin_or_user' => 2),
        array("id" => 4,"email" => "maria@yahoo.com", "password" => "1", 'admin_or_user' => 2),

    );

    foreach($app_user as $user)
    {
        if($user['email'] === $_POST['email'] && $user['email'] === $_POST['email'])
        {
            // Garante o acesso de login com as credenciais corretas
            $user_sucess_login = true;
            $user_id = $user['id'];
            $type_of_user = $user['admin_or_user'];
        }
 
    }

    echo "<br/><br/>";
    if($user_sucess_login)
    {
        // Verifica se essa sessão está autenticada
        $_SESSION['authenticated'] = 'yes';
        // Identifica qual usuario esta na seção
        $_SESSION['id'] = $user_id;
        $_SESSION['admin_or_user'] = $type_of_user;
        header("Location: home.php");
        // Debugger
        echo "Usuario logado com sucesso";
        echo "<br/><br/>";
    }
    else
    {
        $_SESSION['authenticated'] = 'no';
        // Location reenvia vc a outra pagina
        header("Location: index.php?login=error");
    }

    echo $_POST['email'];
    echo "<br/>";
    echo $_POST['password'];
?>