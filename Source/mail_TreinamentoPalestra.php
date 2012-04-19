<?

if ($_POST) {
    require('class/Mail_attach.php');


    $nome = $_POST['nome'];
    $empresa = $_POST['empresa'];
    $email = $_POST['email'];
    $fone = $_POST['fone'];
    $treinamento = $_POST['treinamento'];
    $toutros = $_POST['toutros'];
    $tcarga_horaria = $_POST['tcarga_horaria'];
    $ttotal_participantes = $_POST['tcarga_horaria'];
    $tdata = $_POST['tdata'];
    $tperiodo = $_POST['tperiodo'];
    $tanexar = $_POST['tanexar'];
    $seguranca_trabalho = $_POST['seguranca_trabalho'];
    $psoutros = $_POST['psoutros'];
    $meio_ambiente = $_POST['meio_ambiente'];
    $pmoutros = $_POST['pmoutros'];
    $ptotal_participantes = $_POST['ptotal_participantes'];
    $pdata = $_POST['pdata'];
    $pperiodo = $_POST['pperiodo'];
    $panexar = $_POST['panexar'];

    $boundary = 'ACE-' . md5(time()) . '-ECA';

    $headers = "MIME-Version: 1.1 \r\n";
    $headers .= "X-Mailer: PHP " . phpversion() . "\r\n";
    $headers .= "From: Cotest <ibleidorn@idit.com.br>\r\n";
    $headers .= "Content-Type: text/html; charset=iso-8859-1; boundary=\"$boundary\"\r\n";

    $body .= "Nome: $nome <br/>";
    $body .= "Empresa: $empresa<br/>";
    $body .= "E-mail: $email<br/>";
    $body .= "Telefone: $fone<br/>";
    $body .= "Treinamento: $treinamento<br/>";
    $body .= "Treinamento Outros: $toutros<br/>";
    $body .= "Treinamento Carga Horária: $tcarga_horaria<br/>";
    $body .= "Treinamento Participantes: $ttotal_participantes<br/>";
    $body .= "Treinamento Data: $tdata<br/>";
    $body .= "Treinamento Período: $tperiodo<br/>";
    $body .= "Palestra Segurança do Trabalho: $seguranca_trabalho<br/>";
    $body .= "Segurança do Trabalho Outros: $psoutros<br/>";
    $body .= "Palestra Meio Ambiente: $meio_ambiente<br/>";
    $body .= "Meio Ambiente Outros: $pmoutros<br/>";
    $body .= "Palestra Participantes: $ptotal_participantes<br/>";
    $body .= "Treinamento Data: $pdata<br/>";
    $body .= "Treinamento Período: $pperiodo<br/>";

    # ('from', 'to', 'subject', 'mensagem')
    $attach = new Mail_attach('Cotest <ibleidorn@idit.com.br>', 'ibleidorn@gmail.com', 'Cotest | Treinamentos / Palestras', $body);
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