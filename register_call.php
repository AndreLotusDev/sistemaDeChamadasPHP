<?php 
    session_start();

    // Criação do arquivo
    $archive =  fopen('archive.hd', 'a');

    // Tratamento da abertura de chamada
    $title = str_replace('#', '-', $_POST['title']) ;
    $category = str_replace('#', '-', $_POST['category']) ;
    $description = str_replace('#', '-', $_POST['description']) ;

    // Persistencia da chammada
    $full_text = $_SESSION['id'] ."#" . $title . '#' . $category . '#' . $description . PHP_EOL; 
    
    // Escreve no bloco de notas
    fwrite($archive, $full_text);

    // Fecha o arquivo
    fclose($archive);

    // Volta pros chamados
    header("Location: abrir_chamado.php");
?>