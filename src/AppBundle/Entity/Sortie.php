<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sortie programmées pour un site d'escalade.
 *
 * @ORM\Table(name="sortie", indexes={@ORM\Index(name="sortie_fk0", columns={"ssite"}), @ORM\Index(name="sortie_fk1", columns={"organisateur"})})
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SortieRepository")
 */
class Sortie
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=false, options={"default": 0} )
     */
    protected $date;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datecreated", type="datetime", nullable=false, options={"default": 0})
     */
    protected $datecreated;

    /**
     * @var string
     *
     * @ORM\Column(name="annonce", type="text", length=16777215, nullable=true)
     */
    protected $annonce;

    /**
     * @var string
     *
     * @ORM\Column(name="niveaumin", type="string", length=10, nullable=true)
     */
    protected $niveaumin;

    /**
     * @var string
     *
     * @ORM\Column(name="niveaumax", type="string", length=10, nullable=true)
     */
    protected $niveaumax;

    /**
     * @var int
     *
     * @ORM\Column(name="idsortie", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $idsortie;

    /**
     * @var \AppBundle\Entity\Site
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Site")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ssite", referencedColumnName="siteid")
     * })
     */
    protected $ssite;

    /**
     * @var \AppBundle\Entity\Membre
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Membre")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="organisateur", referencedColumnName="id")
     * })
     */
    protected $organisateur;

    /**
     * Set date.
     *
     * @param \DateTime $date
     *
     * @return Sortie
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date.
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set datecreated.
     *
     * @param \DateTime $datecreated
     *
     * @return Sortie
     */
    public function setDatecreated($datecreated)
    {
        $this->datecreated = $datecreated;

        return $this;
    }

    /**
     * Get datecreated.
     *
     * @return \DateTime
     */
    public function getDatecreated()
    {
        return $this->datecreated;
    }

    /**
     * Set annonce.
     *
     * @param string $annonce
     *
     * @return Sortie
     */
    public function setAnnonce($annonce)
    {
        $this->annonce = $annonce;

        return $this;
    }

    /**
     * Get annonce.
     *
     * @return string
     */
    public function getAnnonce()
    {
        return $this->annonce;
    }

    /**
     * Set niveaumin.
     *
     * @param string $niveaumin
     *
     * @return Sortie
     */
    public function setNiveaumin($niveaumin)
    {
        $this->niveaumin = $niveaumin;

        return $this;
    }

    /**
     * Get niveaumin.
     *
     * @return string
     */
    public function getNiveaumin()
    {
        return $this->niveaumin;
    }

    /**
     * Set niveaumax.
     *
     * @param string $niveaumax
     *
     * @return Sortie
     */
    public function setNiveaumax($niveaumax)
    {
        $this->niveaumax = $niveaumax;

        return $this;
    }

    /**
     * Get niveaumax.
     *
     * @return string
     */
    public function getNiveaumax()
    {
        return $this->niveaumax;
    }

    /**
     * Get idsortie.
     *
     * @return int
     */
    public function getIdsortie()
    {
        return $this->idsortie;
    }

    /**
     * Set ssite.
     *
     * @param \AppBundle\Entity\Site $ssite
     *
     * @return Sortie
     */
    public function setSsite(\AppBundle\Entity\Site $ssite = null)
    {
        $this->ssite = $ssite;

        return $this;
    }

    /**
     * Get ssite.
     *
     * @return \AppBundle\Entity\Site
     */
    public function getSsite()
    {
        return $this->ssite;
    }

    /**
     * Set organisateur.
     *
     * @param \AppBundle\Entity\Membre $organisateur
     *
     * @return Sortie
     */
    public function setOrganisateur(\AppBundle\Entity\Membre $organisateur = null)
    {
        $this->organisateur = $organisateur;

        return $this;
    }

    /**
     * Get organisateur.
     *
     * @return \AppBundle\Entity\Membre
     */
    public function getOrganisateur()
    {
        return $this->organisateur;
    }
}
