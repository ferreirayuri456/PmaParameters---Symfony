<?php


namespace App\Service;


use App\Entity\PmaParameters;

interface PmaParametersServiceInterface
{
    public function criarParameter(string $json) : PmaParameters;
}