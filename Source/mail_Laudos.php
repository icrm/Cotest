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
    $qfunc1 = $_POST['qfunc1'];
    $qfunc2 = $_POST['qfunc2'];
    $qfunc3 = $_POST['qfunc3'];
    $qfunc4 = $_POST['qfunc4'];
    $qtott1 = $_POST['qtott1'];
    $qtott2 = $_POST['qtott2'];
    $qtott3 = $_POST['qtott3'];
    $qtott4 = $_POST['qtott4'];
    $quimicoAnexar = $_POST['quimicoAnexar'];
    $agente_fisico = $_POST['agente_fisico'];
    $afoutros = $_POST['afoutros'];
    $ffunc1 = $_POST['ffunc1'];
    $ffunc2 = $_POST['ffunc2'];
    $ffunc3 = $_POST['ffunc3'];
    $ffunc4 = $_POST['ffunc4'];
    $ftott1 = $_POST['ftott1'];
    $ftott2 = $_POST['ftott2'];
    $ftott3 = $_POST['ftott3'];
    $ftott4 = $_POST['ftott4'];
    $fisicoAnexar = $_POST['fisicoAnexar'];
    $periculosidade = $_POST['periculosidade'];
    $pfunc1 = $_POST['pfunc1'];
    $pfunc2 = $_POST['pfunc2'];
    $pfunc3 = $_POST['pfunc3'];
    $pfunc4 = $_POST['pfunc4'];
    $ptott1 = $_POST['ptott1'];
    $ptott2 = $_POST['ptott2'];
    $ptott3 = $_POST['ptott3'];
    $ptott4 = $_POST['ptott4'];
    $pericAnexar = $_POST['pericAnexar'];

    $boundary = 'ACE-' . md5(time()) . '-ECA';

    $headers = "MIME-Version: 1.1 \r\n\r\n";
    $headers .= "X-Mailer: PHP " . phpversion() . "\r\n";
    $headers .= "Content-Type: text/html; charset=iso-8859-1\r\n";
    $headers .= "From: Cotest - Laudos <ibleidorn@gmail.com>\r\n";
    $headers .= "Reply-To: $email\r\n";


    $body = "Nome: $nome<br/>";
    $body .= "Empresa: $empresa<br/>";
    $body .= "E-mail: $email<br/>";
    $body .= "Agente Químico: $agente_quimico<br/>";
    $body .= "Agente Químico Outros: $aqoutros<br/>";
    $body .= "A.Q. Substância 1: $subs1<br/>";
    $body .= "A.Q. Substância 2: $subs2<br/>";
    $body .= "A.Q. Substância 3: $subs3<br/>";
    $body .= "A.Q. Substância 4: $subs4<br/>";
    $body .= "A.Q. Funções 1: $qfunc1<br/>";
    $body .= "A.Q. Funções 2: $qfunc2<br/>";
    $body .= "A.Q. Funções 3: $qfunc3<br/>";
    $body .= "A.Q. Funções 4: $qfunc4<br/>";
    $body .= "A.Q. Trabalhadores 1: $qtott1<br/>";
    $body .= "A.Q. Trabalhadores 2: $qtott2<br/>";
    $body .= "A.Q. Trabalhadores 3: $qtott3<br/>";
    $body .= "A.Q. Trabalhadores 4: $qtott4<br/>";
    $body .= "Agente Físico: $agente_fisico<br/>";
    $body .= "Agente Físico Outros: $afoutros<br/>";
    $body .= "A.F. Funções 1: $ffunc1<br/>";
    $body .= "A.F. Funções 2: $ffunc2<br/>";
    $body .= "A.F. Funções 3: $ffunc3<br/>";
    $body .= "A.F. Funções 4: $ffunc4<br/>";
    $body .= "A.F. Trabalhadores 1: $ftott1<br/>";
    $body .= "A.F. Trabalhadores 2: $ftott2<br/>";
    $body .= "A.F. Trabalhadores 3: $ftott3<br/>";
    $body .= "A.F. Trabalhadores 4: $ftott4<br/>";
    $body .= "Periculosidade: $periculosidade<br/>";
    $body .= "P. Funções 1: $pfunc1<br/>";
    $body .= "P. Funções 2: $pfunc2<br/>";
    $body .= "P. Funções 3: $pfunc3<br/>";
    $body .= "P. Funções 4: $pfunc4<br/>";
    $body .= "P. Trabalhadores 1: $ptott1<br/>";
    $body .= "P. Trabalhadores 2: $ptott2<br/>";
    $body .= "P. Trabalhadores 3: $ptott3<br/>";
    $body .= "P. Trabalhadores 4: $ptott4<br/>";

    # ('from', 'to', 'subject', 'mensagem')
    $attach = new Mail_attach('Cotest <ibleidorn@idit.com.br>', 'ibleidorn@gmail.com', 'Cotest - Laudos', $body);
    $attach->attach($_FILES['attach1']);
    $attach->attach($_FILES['attach2']);
    $attach->attach($_FILES['attach3']);

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