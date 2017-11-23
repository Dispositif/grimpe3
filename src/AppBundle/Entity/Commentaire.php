<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commentaire
 *
 * @ORM\Table(name="commentaire", indexes={@ORM\Index(name="commentaire_fk0", columns={"cauteur"}), @ORM\Index(name="commentaire_fk1", columns={"csortie"}), @ORM\Index(name="commentaire_fk2", columns={"alerteuser"})})
 * @ORM\Entity
 */
class Commentaire
{
    /**
     * @var string
     *
     * @ORM\Column(name="contenu", type="text", length=16777215, nullable=false)
     */
    private $contenu;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=true)
     */
    private $date;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="alertedate", type="datetime", nullable=true)
     */
    private $alertedate;

    /**
     * @var integer
     *
     * @ORM\Column(name="cid", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $cid;

    /**
     * @var \AppBundle\Entity\Membre
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Membre")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cauteur", referencedColumnName="idmembre")
     * })
     */
    private $cauteur;

    /**
     * @var \AppBundle\Entity\Sortie
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Sortie")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="csortie", referencedColumnName="idsortie")
     * })
     */
    private $csortie;

    /**
     * @var \AppBundle\Entity\Membre
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Membre")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="alerteuser", referencedColumnName="idmembre")
     * })
     */
    private $alerteuser;



    /**
     * Set contenu
     *
     * @param string $contenu
     * @return Commentaire
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
     * Set date
     *
     * @param \DateTime $date
     * @return Commentaire
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
     * Set alertedate
     *
     * @param \DateTime $alertedate
     * @return Commentaire
     */
    public function setAlertedate($alertedate)
    {
        $this->alertedate = $alertedate;

        return $this;
    }

    /**
     * Get alertedate
     *
     * @return \DateTime 
     */
    public function getAlertedate()
    {
        return $this->alertedate;
    }

    /**
     * Get cid
     *
     * @return integer 
     */
    public function getCid()
    {
        return $this->cid;
    }

    /**
     * Set cauteur
     *
     * @param \AppBundle\Entity\Membre $cauteur
     * @return Commentaire
     */
    public function setCauteur(\AppBundle\Entity\Membre $cauteur = null)
    {
        $this->cauteur = $cauteur;

        return $this;
    }

    /**
     * Get cauteur
     *
     * @return \AppBundle\Entity\Membre 
     */
    public function getCauteur()
    {
        return $this->cauteur;
    }

    /**
     * Set csortie
     *
     * @param \AppBundle\Entity\Sortie $csortie
     * @return Commentaire
     */
    public function setCsortie(\AppBundle\Entity\Sortie $csortie = null)
    {
        $this->csortie = $csortie;

        return $this;
    }

    /**
     * Get csortie
     *
     * @return \AppBundle\Entity\Sortie 
     */
    public function getCsortie()
    {
        return $this->csortie;
    }

    /**
     * Set alerteuser
     *
     * @param \AppBundle\Entity\Membre $alerteuser
     * @return Commentaire
     */
    public function setAlerteuser(\AppBundle\Entity\Membre $alerteuser = null)
    {
        $this->alerteuser = $alerteuser;

        return $this;
    }

    /**
     * Get alerteuser
     *
     * @return \AppBundle\Entity\Membre 
     */
    public function getAlerteuser()
    {
        return $this->alerteuser;
    }
}
