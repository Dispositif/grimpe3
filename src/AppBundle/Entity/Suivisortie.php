<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Suivisortie
 *
 * @ORM\Table(name="suivisortie", indexes={@ORM\Index(name="suivi_sortie_fk0", columns={"sssortie"}), @ORM\Index(name="suivi_sortie_fk1", columns={"ssmembre"})})
 * @ORM\Entity
 */
class Suivisortie
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ssdate", type="datetime", nullable=false)
     */
    private $ssdate;

    /**
     * @var integer
     *
     * @ORM\Column(name="mode", type="integer", nullable=false)
     */
    private $mode;

    /**
     * @var integer
     *
     * @ORM\Column(name="ssid", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ssid;

    /**
     * @var \AppBundle\Entity\Sortie
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Sortie")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sssortie", referencedColumnName="idsortie")
     * })
     */
    private $sssortie;

    /**
     * @var \AppBundle\Entity\Membre
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Membre")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ssmembre", referencedColumnName="idmembre")
     * })
     */
    private $ssmembre;



    /**
     * Set ssdate
     *
     * @param \DateTime $ssdate
     *
     * @return Suivisortie
     */
    public function setSsdate($ssdate)
    {
        $this->ssdate = $ssdate;

        return $this;
    }

    /**
     * Get ssdate
     *
     * @return \DateTime
     */
    public function getSsdate()
    {
        return $this->ssdate;
    }

    /**
     * Set mode
     *
     * @param integer $mode
     *
     * @return Suivisortie
     */
    public function setMode($mode)
    {
        $this->mode = $mode;

        return $this;
    }

    /**
     * Get mode
     *
     * @return integer
     */
    public function getMode()
    {
        return $this->mode;
    }

    /**
     * Get ssid
     *
     * @return integer
     */
    public function getSsid()
    {
        return $this->ssid;
    }

    /**
     * Set sssortie
     *
     * @param \AppBundle\Entity\Sortie $sssortie
     *
     * @return Suivisortie
     */
    public function setSssortie(\AppBundle\Entity\Sortie $sssortie = null)
    {
        $this->sssortie = $sssortie;

        return $this;
    }

    /**
     * Get sssortie
     *
     * @return \AppBundle\Entity\Sortie
     */
    public function getSssortie()
    {
        return $this->sssortie;
    }

    /**
     * Set ssmembre
     *
     * @param \AppBundle\Entity\Membre $ssmembre
     *
     * @return Suivisortie
     */
    public function setSsmembre(\AppBundle\Entity\Membre $ssmembre = null)
    {
        $this->ssmembre = $ssmembre;

        return $this;
    }

    /**
     * Get ssmembre
     *
     * @return \AppBundle\Entity\Membre
     */
    public function getSsmembre()
    {
        return $this->ssmembre;
    }
}
