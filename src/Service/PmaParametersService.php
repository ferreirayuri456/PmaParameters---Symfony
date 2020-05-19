<?php


namespace App\Service;

use App\Entity\PmaParameters;
use FlorianWolters\Component\Core\StringUtils;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class PmaParametersService implements PmaParametersServiceInterface
{

    public function criarParameter(string $json): PmaParameters
    {
        $dadosJson = json_decode($json);

        $pma = new PmaParameters();
        $pma->setDescriptionCode($dadosJson->description_code);
        $pma->setValue($dadosJson->value);
        $pma->setActionPma($dadosJson->action_pma);
        $pma->setLivpnr($dadosJson->livpnr);
        $pma->setReasonCode($dadosJson->reason_code);
        $pma->setPartner($dadosJson->partner);

        $this->validateParameter($pma);

        return $pma;

    }

    const UPDATE = "Update";
    const CANCEL = "Cancel";
    const SUBMIT_ORDER = "Submit_Order";

    public function validateParameter(PmaParameters $parameters)
    {
        if ((!StringUtils::equalsIgnoreCase($parameters->getActionPma(), self::UPDATE))
            &&(StringUtils::isNotEmpty($parameters->getValue()))) {
            throw new BadRequestHttpException("Quando o campo Action PMA for diferente a UPDATE o
            campo VALUE deverá ficar vazio");
        }
        if ((StringUtils::equalsIgnoreCase($parameters->getActionPma(), self::CANCEL))
            &&(StringUtils::isNotEmpty($parameters->getValue()))) {
            throw new BadRequestHttpException("Quando o campo ACTION PMA for igual a  CANCEL
            o campo VALUE deverá ficar vazio");
        }
        if ((StringUtils::equalsIgnoreCase($parameters->getActionPma(), self::SUBMIT_ORDER))
            &&(StringUtils::isNotEmpty($parameters->getValue()))) {
            throw new BadRequestHttpException("Quando o campo ACTION PMA for igual a SUBMIT_ORDER o
            campo VALUE deverá ficar vazio");
        }

    }
}