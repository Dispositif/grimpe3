<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Meteo
 *
 * @ORM\Table(name="meteo")
 * @ORM\Entity
 */
class Meteo
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datetime", type="datetime", nullable=false)
     */
    private $datetime;

    /**
     * @var integer
     *
     * @ORM\Column(name="lieu", type="integer", nullable=false)
     */
    private $lieu;

    /**
     * @var string
     *
     * @ORM\Column(name="data", type="string", length=250, nullable=true)
     */
    private $data;

    /**
     * @var string
     *
     * @ORM\Column(name="source", type="string", length=250, nullable=true)
     */
    private $source;

    /**
     * @var integer
     *
     * @ORM\Column(name="mid", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $mid;



    /**
     * Set datetime
     *
     * @param \DateTime $datetime
     *
     * @return Meteo
     */
    public function setDatetime($datetime)
    {
        $this->datetime = $datetime;

        return $this;
    }

    /**
     * Get datetime
     *
     * @return \DateTime
     */
    public function getDatetime()
    {
        return $this->datetime;
    }

    /**
     * Set lieu
     *
     * @param integer $lieu
     *
     * @return Meteo
     */
    public function setLieu($lieu)
    {
        $this->lieu = $lieu;

        return $this;
    }

    /**
     * Get lieu
     *
     * @return integer
     */
    public function getLieu()
    {
        return $this->lieu;
    }

    /**
     * Set data
     *
     * @param string $data
     *
     * @return Meteo
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Get data
     *
     * @return string
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set source
     *
     * @param string $source
     *
     * @return Meteo
     */
    public function setSource($source)
    {
        $this->source = $source;

        return $this;
    }

    /**
     * Get source
     *
     * @return string
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * Get mid
     *
     * @return integer
     */
    public function getMid()
    {
        return $this->mid;
    }
}
