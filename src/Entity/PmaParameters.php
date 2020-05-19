<?php

namespace App\Entity;

use App\Repository\PmaParametersRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PmaParametersRepository::class)
 */
class PmaParameters
{
    /**
     * @var
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer", nullable=false)
     */
    private $id;
    /**
     * @ORM\Column(type="string", length=5, nullable=false)
     */
    private $partner;
    /**
     * @ORM\Column(type="string", length=150, nullable=false)
     */
    private $reason_code;
    /**
     * @ORM\Column(type="string", length=150, nullable=false)
     */
    private $description_code;
    /**
     * @ORM\Column(type="string", length=30, nullable=false)
     */
    private $action_pma;
    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $livpnr;
    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $value;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getPartner()
    {
        return $this->partner;
    }

    /**
     * @param mixed $partner
     */
    public function setPartner($partner): void
    {
        $this->partner = $partner;
    }

    /**
     * @return mixed
     */
    public function getReasonCode()
    {
        return $this->reason_code;
    }

    /**
     * @param mixed $reason_code
     */
    public function setReasonCode($reason_code): void
    {
        $this->reason_code = $reason_code;
    }

    /**
     * @return mixed
     */
    public function getDescriptionCode()
    {
        return $this->description_code;
    }

    /**
     * @param mixed $description_code
     */
    public function setDescriptionCode($description_code): void
    {
        $this->description_code = $description_code;
    }

    /**
     * @return mixed
     */
    public function getActionPma()
    {
        return $this->action_pma;
    }

    /**
     * @param mixed $action_pma
     */
    public function setActionPma($action_pma): void
    {
        $this->action_pma = $action_pma;
    }

    /**
     * @return mixed
     */
    public function getLivpnr()
    {
        return $this->livpnr;
    }

    /**
     * @param mixed $livpnr
     */
    public function setLivpnr($livpnr): void
    {
        $this->livpnr = $livpnr;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     */
    public function setValue($value): void
    {
        $this->value = $value;
    }

    
}
