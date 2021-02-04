<?php

use Alura\Leilao\Model\Leilao;
use Alura\Leilao\Model\Service\Avaliador;
use Alura\Leilao\Model\Usuario;

require 'vendor/autoload.php';

$leilao = new Leilao('Fiat 147 0km');


$maria = new Usuario('Maria');
$joao = new Usuario('Joao');

$leilao->recebeLance(new \Alura\Leilao\Model\Lance($joao, 2000));
$leilao->recebeLance(new \Alura\Leilao\Model\Lance($maria, 2500));

$leiloeiro = new Avaliador();
$leiloeiro->avalia($leilao);
$maiorValor = $leiloeiro->getMaiorValor();

echo $maiorValor;