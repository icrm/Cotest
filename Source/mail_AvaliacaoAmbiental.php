<?

if ($_POST) {
    require('class/Mail_attach.php');

    $nome = $_POST['nome'];
    $empresa = $_POST['empresa'];
    $email = $_POST['email'];
    $fone = $_POST['fone'];
    $aarp = $_POST['aarp'];
    $subs1 = $_POST['subs1'];
    $aarpAnexar = $_POST['aarpAnexar'];
    $aaff = $_POST['aaff'];
    $tottchamines = $_POST['tottchamines'];
    $totaffmp = $_POST['totaffmp'];
    $totaffsox = $_POST['totaffsox'];
    $totaffnox = $_POST['totaffnox'];
    $totaffvoc = $_POST['totaffvoc'];
    $totaffsvo = $_POST['totaffsvo'];
    $totaffch4 = $_POST['totaffch4'];
    $totaffcoc = $_POST['totaffcoc'];
    $totaffdfu = $_POST['totaffdfu'];
    $totaffamo = $_POST['totaffamo'];
    $totaffout = $_POST['totaffout'];
    $fisicoAnexar = $_POST['fisicoAnexar'];
    $aagd = $_POST['aagd'];
    $totagm = $_POST['totagm'];
    $aadpAnexar = $_POST['aadpAnexar'];

    $boundary = 'ACE-' . md5(time()) . '-ECA';

    $headers = "MIME-Version: 1.1 \r\n\r\n";
    $headers .= "X-Mailer: PHP " . phpversion() . "\r\n";
    $headers .= "Content-Type: text/html; charset=iso-8859-1\r\n";
    $headers .= "From: Cotest - Avaliação Ambiental <ibleidorn@gmail.com>\r\n";
    $headers .= "Reply-To: $email\r\n";


    $body = "Nome: $nome<br/>";
    $body .= "Empresa: $empresa<br/>";
    $body .= "E-mail: $email<br/>";
    $body .= "Telefone: $fone<br/>";
    $body .= "Ruído Perimetral Desenhos / Plantas (Disponíveis): $aarp<br/>";
    $body .= "Área Total (m2): $subs1<br/>";
    $body .= "Fontes Fixas Desenhos / Plantas (Disponíveis): $aaff<br/>";
    $body .= "Total de Chaminés: $tottchamines<br/>";
    $body .= "Total Amostras MP: $totaffmp<br/>";
    $body .= "Total Amostras SOX: $totaffsox<br/>";
    $body .= "Total Amostras NOX: $totaffnox<br/>";
    $body .= "Total Amostras VOC: $totaffvoc<br/>";
    $body .= "Total Amostras SVO: $totaffsvo<br/>";
    $body .= "Total Amostras CH4: $totaffch4<br/>";
    $body .= "Total Amostras Compostos Organo Clorados: $totaffcoc<br/>";
    $body .= "Total Amostras Dioxina / Furano: $totaffdfu<br/>";
    $body .= "Total Amostras Amônia: $totaffamo<br/>";
    $body .= "Total Amostras Outros: $totaffout<br/>";
    $body .= "Grandes Demolições Desenhos / Plantas (Disponíveis): $aagd<br/>";
    $body .= "Total Amostras MP: $totagm<br/>";

    # ('from', 'to', 'subject', 'mensagem')
    $attach = new Mail_attach('Cotest <ibleidorn@idit.com.br>', 'ibleidorn@gmail.com', 'Cotest - Avaliação Ambiental', $body);
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