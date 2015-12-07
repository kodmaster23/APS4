<?php

namespace Sati\ControleSatiBundle\Entity;

/**
 * Caixa
 */
class Caixa
{
    /**
     * @var integer
     */
    private $idCaixa;

    /**
     * @var integer
     */
    private $tipoMovimentacao;

    /**
     * @var integer
     */
    private $statusMoventacao;

    /**
     * @var \DateTime
     */
    private $data;

    /**
     * @var string
     */
    private $origem;


    /**
     * Get idCaixa
     *
     * @return integer
     */
    public function getIdCaixa()
    {
        return $this->idCaixa;
    }

    /**
     * Set tipoMovimentacao
     *
     * @param integer $tipoMovimentacao
     *
     * @return Caixa
     */
    public function setTipoMovimentacao($tipoMovimentacao)
    {
        $this->tipoMovimentacao = $tipoMovimentacao;

        return $this;
    }

    /**
     * Get tipoMovimentacao
     *
     * @return integer
     */
    public function getTipoMovimentacao()
    {
        return $this->tipoMovimentacao;
    }

    /**
     * Set statusMoventacao
     *
     * @param integer $statusMoventacao
     *
     * @return Caixa
     */
    public function setStatusMoventacao($statusMoventacao)
    {
        $this->statusMoventacao = $statusMoventacao;

        return $this;
    }

    /**
     * Get statusMoventacao
     *
     * @return integer
     */
    public function getStatusMoventacao()
    {
        return $this->statusMoventacao;
    }

    /**
     * Set data
     *
     * @param \DateTime $data
     *
     * @return Caixa
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Get data
     *
     * @return \DateTime
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set origem
     *
     * @param string $origem
     *
     * @return Caixa
     */
    public function setOrigem($origem)
    {
        $this->origem = $origem;

        return $this;
    }

    /**
     * Get origem
     *
     * @return string
     */
    public function getOrigem()
    {
        return $this->origem;
    }
}

