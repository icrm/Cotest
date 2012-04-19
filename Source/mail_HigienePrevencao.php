<?

if ($_POST) {
    require('class/Mail_attach.php');

    $nome = $_POST['nome'];
    $empresa = $_POST['empresa'];
    $email = $_POST['email'];
    $fone = $_POST['fone'];
    $hig_prevencao = $_POST['hig_prevencao'];
    $higPrevOutros = $_POST['higPrevOutros'];
    $ptott = $_POST['ptott'];
    $higPrevAnexar = $_POST['higPrevAnexar'];

    $boundary = 'ACE-' . md5(time()) . '-ECA';

    $headers = "MIME-Version: 1.1 \r\n\r\n";
    $headers .= "X-Mailer: PHP " . phpversion() . "\r\n";
    $headers .= "Content-Type: text/html; charset=iso-8859-1\r\n";
    $headers .= "From: Cotest - Higiene / Prevenção <ibleidorn@gmail.com>\r\n";
    $headers .= "Reply-To: $email\r\n";


    $body = "Nome: $nome<br/>";
    $body .= "Empresa: $empresa<br/>";
    $body .= "E-mail: $email<br/>";
    $body .= "Telefone: $fone<br/>";
    $body .= "Higiene e Prevenção: $hig_prevencao<br/>";
    $body .= "Higiene e Prevenção Outros: $higPrevOutros<br/>";
    $body .= "H.P. Trabalhadores: $ptott<br/>";

    # ('from', 'to', 'subject', 'mensagem')
    $attach = new Mail_attach('Cotest <ibleidorn@idit.com.br>', 'ibleidorn@gmail.com', 'Cotest - Higiene / Prevenção', $body);
    $attach->attach($_FILES['attach1']);

    if ($attach->sendMail()) {
        echo 'E-mail enviado com sucesso!';
    } else {
        echo 'Erro ao anexar arquivo ou enviar e-mail.';
    }
}
/*
  header( 'Location: http://www.cotest.com.br/contato.html?sm=ok' );
 */
?>