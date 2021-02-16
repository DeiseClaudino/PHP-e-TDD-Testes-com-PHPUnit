<?php

namespace Alura\Leilao\Tests\Service;

use PHPUnit\Framework\TestCase;
use Alura\Leilao\Model\Service\Avaliador; 
use Alura\Leilao\Model\{Leilao, Usuario, Lance};

class AvaliadorTest extends TestCase
{
    public function testUm()
    {
        // Arrange - Given / Preparamos o cenário do teste
        $leilao = new Leilao('Fiat 147 0km');

        $maria = new Usuario('Maria');
        $joao = new Usuario('Joao');

        $leilao->recebeLance(new Lance($joao, 2000));
        $leilao->recebeLance(new Lance($maria, 2500));

        $leiloeiro = new Avaliador();

        // Act - When / Executamos o código a ser testado
        $leiloeiro->avalia($leilao);

        $maiorValor = $leiloeiro->getMaiorValor();

        // Assert - Then / Verificamos se a saída é a esperada
        $this->assertEquals(2500, $maiorValor);
    }

    public function testAvaliadorDeveEncontrarOMaiorValorDeLancesEmOrdemDecrescente()
{
    // Arrange - Given / Preparamos o cenário do teste
    $leilao = new Leilao('Fiat 147 0km');

    $maria = new Usuario('Maria');
    $joao = new Usuario('Joao');

    $leilao->recebeLance(new Lance($maria, 2500));
    $leilao->recebeLance(new Lance($joao, 2000));


    $leiloeiro = new Avaliador();

    // Act - When / Executamos o código a ser testado
    $leiloeiro->avalia($leilao);

    $maiorValor = $leiloeiro->getMaiorValor();

    // Assert - Then / Verificamos se a saída é a esperada
    self::assertEquals(2500, $maiorValor);

}
}