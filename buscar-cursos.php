<?php

//  composer install -> instala as depedencias presentes no composer.lock
//  composer update -> atualiza o composer.lock instalando oque tem no arquivo composer.json
//  composer dump-autoload -> atualiza o autoload presente no composer.json para que o autoloader
// vendor/bin/phan --allow-polyfill-parser
//  tenha acesso ao caminho de uma nova classe por exemplo
require 'vendor/autoload.php';
// require 'src/Buscador.php';

use Schindlerth\BuscadorDeCursos\Buscador;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

$client = new Client(['base_uri' => 'https://www.alura.com.br/']);
$crawler = new Crawler();
$buscador = new Buscador($client, $crawler);
$cursos = $buscador->buscar('/cursos-online-programacao/php');
MensagemInicio::metodoInicio();
foreach ($cursos as $curso) {
    // echo $curso . PHP_EOL;
    exibeMensagem($curso);
}
MensagemFim::metodoFim();
