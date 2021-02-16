<?php

namespace Alura\Leilao\Model\Service;
use Alura\Leilao\Model\Leilao;

class Avaliador
{
    private $maiorValor = -INF;

    public function avalia(Leilao $leilao): void
    {
        foreach ($leilao->getLances() as $lance) {
            if ($lance->getValor() > $this->maiorValor) {
                $this->maiorValor = $lance->getValor();
            }
        }
    }


    public function getMaiorValor(): float
    {
        return $this->maiorValor;
    }
}