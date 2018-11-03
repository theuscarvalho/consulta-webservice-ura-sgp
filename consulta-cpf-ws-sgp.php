<?php
/***************************************
* Desenvolvido por Matheus Carvalho    *
*     www.matheuscarvalho.com.br       *
****************************************/
// URL do webservice do SGP
$url_data = "http://MEUSGP/ws/ura/consultacliente";
// Inicia a sessão cURL
$ch = curl_init();
// Informa a URL onde será enviada a requisição
curl_setopt( $ch, CURLOPT_URL, $url_data);
// Seta a requisição como sendo do tipo POST
curl_setopt ($ch, CURLOPT_POST, 1);
// Monta os parâmetros da requisição
$fields = array(
    'token' => 'COLOCAR O TOKEN AQUI',
    'app' => 'ura',
    'cpfcnpj' => 'COLOQUE AQUI O CPF DO CLIENTE A SER CONSULTADO'
);
// Seta os parâmetros para session cURL
curl_setopt ($ch, CURLOPT_POSTFIELDS, $fields);
// Se true retorna o conteúdo em forma de string para uma variável
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// Envia a requisição
$result = curl_exec($ch);
// Finaliza a sessão
curl_close($ch);
$json = json_decode($result);
foreach ($json->contratos as $value) {
    $cpf = $value->cpfCnpj;
    $cliente = $value->razaoSocial;
}
echo $cpf;
echo '<br>';
echo $cliente;
?>
