<?

if ($_POST) {
    require('class/Mail_attach.php');

    $nome = $_POST['nome'];
    $empresa = $_POST['empresa'];
    $email = $_POST['email'];
    $fone = $_POST['fone'];
    $aarp = $_POST['aarp'];
    $area_total_ar = $_POST['area_total_ar'];
    $dist_pop_ar = $_POST['dist_pop_ar'];
    $prod_infl_ar = $_POST['prod_infl_ar'];
    $prod_tox_ar = $_POST['prod_tox_ar'];
    $arAnexar = $_POST['arAnexar'];

    $boundary = 'ACE-' . md5(time()) . '-ECA';

    $headers = "MIME-Version: 1.1 \r\n\r\n";
    $headers .= "X-Mailer: PHP " . phpversion() . "\r\n";
    $headers .= "Content-Type: text/html; charset=iso-8859-1\r\n";
    $headers .= "From: Cotest - Análise de Riscos <ibleidorn@gmail.com>\r\n";
    $headers .= "Reply-To: $email\r\n";


    $body = "Nome: $nome<br/>";
    $body .= "Empresa: $empresa<br/>";
    $body .= "E-mail: $email<br/>";
    $body .= "Telefone: $fone<br/>";
    $body .= "Análise de Riscos Desenhos / Plantas (Disponíveis): $aarp<br/>";
    $body .= "Área Total (m2): $area_total_ar<br/>";
    $body .= "Distância População (externa): $dist_pop_ar<br/>";
    $body .= "Produto Inflamável (principal): $prod_infl_ar<br/>";
    $body .= "Produto Tóxico (principal): $prod_tox_ar<br/>";

    # ('from', 'to', 'subject', 'mensagem')
    $attach = new Mail_attach('Cotest <ibleidorn@idit.com.br>', 'ibleidorn@gmail.com', 'Cotest - Análise de Riscos', $body);
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