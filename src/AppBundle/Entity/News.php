<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * News.
 *
 * @ORM\Table(name="news", indexes={@ORM\Index(name="News_fk0", columns={"nauteur"})})
 * @ORM\Entity(repositoryClass="AppBundle\Repository\NewsRepository")
 */
class News
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", options={"default": 0})
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=100, nullable=false)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="contenu", type="text", nullable=false)
     */
    private $contenu;

    /**
     * @var integer
     *
     * @ORM\Column(name="nid", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $nid;

    /**
     * @var \AppBundle\Entity\Membre
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Membre")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="nauteur", referencedColumnName="id")
     * })
     */
    private $nauteur;



    /**
     * Set date
     *
     * @param \DateTime $date
     * @return News
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set titre
     *
     * @param string $titre
     * @return News
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string 
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set contenu
     *
     * @param string $contenu
     * @return News
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;

        return $this;
    }

    /**
     * Get contenu
     *
     * @return string 
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * Get nid
     *
     * @return integer 
     */
    public function getNid()
    {
        return $this->nid;
    }

    /**
     * Set nauteur
     *
     * @param \AppBundle\Entity\Membre $nauteur
     * @return News
     */
    public function setNauteur(\AppBundle\Entity\Membre $nauteur = null)
    {
        $this->nauteur = $nauteur;

        return $this;
    }

    /**
     * Get nauteur
     *
     * @return \AppBundle\Entity\Membre 
     */
    public function getNauteur()
    {
        return $this->nauteur;
    }
}
