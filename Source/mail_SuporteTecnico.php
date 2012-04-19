<?

if ($_POST) {
    require('class/Mail_attach.php');


    $nome = $_POST['nome'];
    $empresa = $_POST['empresa'];
    $email = $_POST['email'];
    $fone = $_POST['fone'];
    $acompObraServ = ($_POST['acompObraServ'] == '' ) ? 'Nao' : 'Sim';
    $acompOutros = $_POST['acompOutros'];
    $acompAnexar = $_POST['acompAnexar'];
    $inspVistoria = ($_POST['inspVistoria'] == '' ) ? 'Nao' : 'Sim';
    $inspOutros = $_POST['inspOutros'];
    $inspAnexar = $_POST['inspAnexar'];
    $segCheck = ($_POST['segCheck'] == '' ) ? 'Nao' : 'Sim';
    $segOutros = $_POST['segOutros'];
    $segAnexar = $_POST['segAnexar'];
    $meioAmbCheck = ($_POST['meioAmbCheck'] == '' ) ? 'Nao' : 'Sim';
    $meioOutros = $_POST['meioOutros'];
    $meioAnexar = $_POST['meioAnexar'];
    $licenca_ambiental = $_POST['licenca_ambiental'];
    $laOutros = $_POST['laOutros'];
    $laAnexar = $_POST['laAnexar'];

    $boundary = 'ACE-' . md5(time()) . '-ECA';

    $headers = "MIME-Version: 1.1 \r\n\r\n";
    $headers .= "X-Mailer: PHP " . phpversion() . "\r\n";
    $headers .= "Content-Type: text/html; charset=iso-8859-1\r\n";
    $headers .= "From: Cotest - Suporte Técnico <ibleidorn@gmail.com>\r\n";
    $headers .= "Reply-To: $email\r\n";


    $body = "Nome: $nome<br/>";
    $body .= "Empresa: $empresa<br/>";
    $body .= "E-mail: $email<br/>";
    $body .= "Telefone: $fone<br/>";
    $body .= "Acompanhamento (Obra / Serviço): $acompObraServ<br/>";
    $body .= "Acompanhamento Descreva: $acompOutros<br/>";
    $body .= "Inspeção / Vistoria: $inspVistoria<br/>";
    $body .= "Inspeção / Vistoria Descreva: $inspOutros<br/>";
    $body .= "Segurança: $segCheck<br/>";
    $body .= "Segurança Descreva: $segOutros<br/>";
    $body .= "Meio Ambiente: $meioAmbCheck<br/>";
    $body .= "Meio Ambiente Descreva: $meioOutros<br/>";
    $body .= "Licença Ambiental: $licenca_ambiental<br/>";
    $body .= "Licença Ambiental Descreva: $laOutros<br/>";

    # ('from', 'to', 'subject', 'mensagem')
    $attach = new Mail_attach('Cotest <ibleidorn@idit.com.br>', 'ibleidorn@gmail.com', 'Cotest - Suporte Técnico', $body);
    $attach->attach($_FILES['attach1']);
    $attach->attach($_FILES['attach2']);
    $attach->attach($_FILES['attach3']);
    $attach->attach($_FILES['attach4']);
    $attach->attach($_FILES['attach5']);

    if ($attach->sendMail()) {
        echo 'E-mail enviado com sucesso!';
    } else {
        echo 'Erro ao anexar arquivo ou enviar e-mail.';
    }
}
/*
  header( 'Location: http://www.link2u.com.br/contato.html?sm=ok' );
 */
?>