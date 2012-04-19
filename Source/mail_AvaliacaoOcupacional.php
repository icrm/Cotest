<?

if ($_POST) {
    require('class/Mail_attach.php');

    $nome = $_POST['nome'];
    $empresa = $_POST['empresa'];
    $email = $_POST['email'];
    $fone = $_POST['fone'];
    $agente_quimico = $_POST['agente_quimico'];
    $aqoutros = $_POST['aqoutros'];
    $subs1 = $_POST['subs1'];
    $subs2 = $_POST['subs2'];
    $subs3 = $_POST['subs3'];
    $subs4 = $_POST['subs4'];
    $qtota1 = $_POST['qtota1'];
    $qtota2 = $_POST['qtota2'];
    $qtota3 = $_POST['qtota3'];
    $qtota4 = $_POST['qtota4'];
    $quimicoAnexar = $_POST['quimicoAnexar'];
    $agente_fisico = $_POST['agente_fisico'];
    $afoutros = $_POST['afoutros'];
    $ftota1 = $_POST['ftota1'];
    $ftota2 = $_POST['ftota2'];
    $ftota3 = $_POST['ftota3'];
    $ftota4 = $_POST['ftota4'];
    $fisicoAnexar = $_POST['fisicoAnexar'];

    $boundary = 'ACE-' . md5(time()) . '-ECA';

    $headers = "MIME-Version: 1.1 \r\n\r\n";
    $headers .= "X-Mailer: PHP " . phpversion() . "\r\n";
    $headers .= "Content-Type: text/html; charset=iso-8859-1\r\n";
    $headers .= "From: Cotest - Avaliação Ocupacional <ibleidorn@gmail.com>\r\n";
    $headers .= "Reply-To: $email\r\n";


    $body = "Nome: $nome<br/>";
    $body .= "Empresa: $empresa<br/>";
    $body .= "E-mail: $email<br/>";
    $body .= "Telefone: $fone<br/>";
    $body .= "Agente Químico: $agente_quimico<br/>";
    $body .= "Agente Químico Outros: $aqoutros<br/>";
    $body .= "A.Q. Substância 1: $subs1<br/>";
    $body .= "A.Q. Substância 2: $subs2<br/>";
    $body .= "A.Q. Substância 3: $subs3<br/>";
    $body .= "A.Q. Substância 4: $subs4<br/>";
    $body .= "A.Q. Total Amostras 1: $qtota1<br/>";
    $body .= "A.Q. Total Amostras 2: $qtota2<br/>";
    $body .= "A.Q. Total Amostras 3: $qtota3<br/>";
    $body .= "A.Q. Total Amostras 4: $qtota4<br/>";
    $body .= "Agente Físico: $agente_fisico<br/>";
    $body .= "Agente Físico Outros: $afoutros<br/>";
    $body .= "A.F. Total Amostras 1: $ftota1<br/>";
    $body .= "A.F. Total Amostras 2: $ftota2<br/>";
    $body .= "A.F. Total Amostras 3: $ftota3<br/>";
    $body .= "A.F. Total Amostras 4: $ftota4<br/>";

    # ('from', 'to', 'subject', 'mensagem')
    $attach = new Mail_attach('Cotest <ibleidorn@idit.com.br>', 'ibleidorn@gmail.com', 'Cotest - Avaliação Ocupacional', $body);
    $attach->attach($_FILES['attach1']);
    $attach->attach($_FILES['attach2']);

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