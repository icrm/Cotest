<?

    $nome         = $_POST['nome'];
    $email        = $_POST['email'];
    $telefone     = $_POST['fone'];
    $empresa      = $_POST['empresa'];
    $mensagem     = $_POST['mensagem'];

    $boundary = 'ACE-' . md5(time()) . '-ECA';

    $headers  = "MIME-Version: 1.1 \r\n\r\n";
    $headers .= "X-Mailer: PHP " . phpversion() . "\r\n";
    $headers .= "Content-Type: text/html; charset=iso-8859-1\r\n";
    $headers .= "From: Link2u - Coworking <contato@link2u.com.br>\r\n";
    $headers .= "Reply-To: $email\r\n";
    

    $body  = "Nome: $nome<br/>";
    $body .= "E-mail: $email<br/>";
    $body .= "Telefone: $telefone<br/>";
    $body .= "Empresa: $empresa<br/>";
    $body .= "Mensagem: $mensagem<br/>";
    
    mail('contato@link2u.com.br', 'Link2u - Coworking | Contato através do site', $body, $headers);

    header( 'Location: http://www.link2u.com.br/contato.html?sm=ok' );
    
?>