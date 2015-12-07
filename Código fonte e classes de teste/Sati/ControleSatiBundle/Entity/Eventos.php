<?php

namespace Sati\ControleSatiBundle\Entity;

/**
 * Eventos
 */
class Eventos
{
    /**
     * @var integer
     */
    private $eventIdeventos;

    /**
     * @var string
     */
    private $nomeEvento;

    /**
     * @var integer
     */
    private $fkPalId;

    /**
     * @var string
     */
    private $dataHora;

    /**
     * @var integer
     */
    private $tipoEvento;

    /**
     * @var float
     */
    private $valor;


    /**
     * Get eventIdeventos
     *
     * @return integer
     */
    public function getEventIdeventos()
    {
        return $this->eventIdeventos;
    }

    /**
     * Set nomeEvento
     *
     * @param string $nomeEvento
     *
     * @return Eventos
     */
    public function setNomeEvento($nomeEvento)
    {
        $this->nomeEvento = $nomeEvento;

        return $this;
    }

    /**
     * Get nomeEvento
     *
     * @return string
     */
    public function getNomeEvento()
    {
        return $this->nomeEvento;
    }

    /**
     * Set fkPalId
     *
     * @param integer $fkPalId
     *
     * @return Eventos
     */
    public function setFkPalId($fkPalId)
    {
        $this->fkPalId = $fkPalId;

        return $this;
    }

    /**
     * Get fkPalId
     *
     * @return integer
     */
    public function getFkPalId()
    {
        return $this->fkPalId;
    }

    /**
     * Set dataHora
     *
     * @param string $dataHora
     *
     * @return Eventos
     */
    public function setDataHora($dataHora)
    {
        $this->dataHora = $dataHora;

        return $this;
    }

    /**
     * Get dataHora
     *
     * @return string
     */
    public function getDataHora()
    {
        return $this->dataHora;
    }

    /**
     * Set tipoEvento
     *
     * @param integer $tipoEvento
     *
     * @return Eventos
     */
    public function setTipoEvento($tipoEvento)
    {
        $this->tipoEvento = $tipoEvento;

        return $this;
    }

    /**
     * Get tipoEvento
     *
     * @return integer
     */
    public function getTipoEvento()
    {
        return $this->tipoEvento;
    }

    /**
     * Set valor
     *
     * @param float $valor
     *
     * @return Eventos
     */
    public function setValor($valor)
    {
        $this->valor = $valor;

        return $this;
    }

    /**
     * Get valor
     *
     * @return float
     */
    public function getValor()
    {
        return $this->valor;
    }
}
