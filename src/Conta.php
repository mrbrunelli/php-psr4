<?php

declare(strict_types=1);

namespace Alfa;

class Conta
{
  public int $numero;
  public float $saldo;
  public string $titular;
  public static array $movimentacoes = [];

  public function sacar(float $valor): bool
  {
    if ($this->saldo < $valor) {
      return false;
    }

    $this->saldo -= $valor;
    self::$movimentacoes[] = sprintf("[%s] Saque %s", $this->titular, $valor);

    return true;
  }

  public function depositar(float $valor): void
  {
    $this->saldo += $valor;
    self::$movimentacoes[] = sprintf("[%s] Deposito %s", $this->titular, $valor);

  }

  public function tranferir(Conta $contaDestino, float $valor): bool
  {
    $retirou = $this->sacar($valor);
    if ($retirou) {
      $contaDestino->depositar($valor);
    }

    return $retirou;
  }
}
