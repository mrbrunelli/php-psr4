<?php

declare(strict_types=1);

require_once '../vendor/autoload.php';

use Alfa\Conta;
use Alfa\Util\Date;

$minhaConta = new Conta();
$minhaConta->saldo = 500.00;
$minhaConta->titular = 'João';

$minhaContaDosSonhos = new Conta();
$minhaContaDosSonhos->saldo = 1_000_000_000.00;
$minhaContaDosSonhos->titular = 'José';

$minhaContaDosSonhos->tranferir($minhaConta, 500_000.00);

dump($minhaConta);
dump($minhaContaDosSonhos);
dump(Conta::$movimentacoes);