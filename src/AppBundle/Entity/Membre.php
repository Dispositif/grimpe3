<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Membre
 *
 * @ORM\Table(name="membre")
 * @ORM\Entity
 */
class Membre
{
    /**
     * @var string
     *
     * @ORM\Column(name="email", unique=true, type="string", length=50, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=30, nullable=true)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=30, nullable=true)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=150, nullable=false)
     */
    private $password;

    /**
     * @var integer
     *
     * @ORM\Column(name="isadmin", type="smallint", nullable=false)
     */
    private $isadmin;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datecreated", type="datetime", nullable=false)
     */
    private $datecreated;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="lastdate", type="datetime", nullable=false)
     */
    private $lastdate;

    /**
     * @var string
     *
     * @ORM\Column(name="lastip", type="string", length=50, nullable=true)
     */
    private $lastip;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone", type="string", length=20, nullable=true)
     */
    private $telephone;

    /**
     * @var string
     *
     * @ORM\Column(name="avatar", type="string", length=250, nullable=true)
     */
    private $avatar;

    /**
     * @var string
     *
     * @ORM\Column(name="niveaumin", type="string", length=10, nullable=true)
     */
    private $niveaumin;

    /**
     * @var string
     *
     * @ORM\Column(name="niveaumax", type="string", length=10, nullable=true)
     */
    private $niveaumax;

    /**
     * @var float
     *
     * @ORM\Column(name="meval", type="float", precision=10, scale=0, nullable=false)
     */
    private $meval;

    /**
     * @var integer
     *
     * @ORM\Column(name="emailvalide", type="integer", nullable=false)
     */
    private $emailvalide;

    /**
     * @var integer
     *
     * @ORM\Column(name="idmembre", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idmembre;



    /**
     * Set email
     *
     * @param string $email
     * @return Membre
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Membre
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     * @return Membre
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string 
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return Membre
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set isadmin
     *
     * @param integer $isadmin
     * @return Membre
     */
    public function setIsadmin($isadmin)
    {
        $this->isadmin = $isadmin;

        return $this;
    }

    /**
     * Get isadmin
     *
     * @return integer 
     */
    public function getIsadmin()
    {
        return $this->isadmin;
    }

    /**
     * Set datecreated
     *
     * @param \DateTime $datecreated
     * @return Membre
     */
    public function setDatecreated($datecreated)
    {
        $this->datecreated = $datecreated;

        return $this;
    }

    /**
     * Get datecreated
     *
     * @return \DateTime 
     */
    public function getDatecreated()
    {
        return $this->datecreated;
    }

    /**
     * Set lastdate
     *
     * @param \DateTime $lastdate
     * @return Membre
     */
    public function setLastdate($lastdate)
    {
        $this->lastdate = $lastdate;

        return $this;
    }

    /**
     * Get lastdate
     *
     * @return \DateTime 
     */
    public function getLastdate()
    {
        return $this->lastdate;
    }

    /**
     * Set lastip
     *
     * @param string $lastip
     * @return Membre
     */
    public function setLastip($lastip)
    {
        $this->lastip = $lastip;

        return $this;
    }

    /**
     * Get lastip
     *
     * @return string 
     */
    public function getLastip()
    {
        return $this->lastip;
    }

    /**
     * Set telephone
     *
     * @param string $telephone
     * @return Membre
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return string 
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set avatar
     *
     * @param string $avatar
     * @return Membre
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;

        return $this;
    }

    /**
     * Get avatar
     *
     * @return string 
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * Set niveaumin
     *
     * @param string $niveaumin
     * @return Membre
     */
    public function setNiveaumin($niveaumin)
    {
        $this->niveaumin = $niveaumin;

        return $this;
    }

    /**
     * Get niveaumin
     *
     * @return string 
     */
    public function getNiveaumin()
    {
        return $this->niveaumin;
    }

    /**
     * Set niveaumax
     *
     * @param string $niveaumax
     * @return Membre
     */
    public function setNiveaumax($niveaumax)
    {
        $this->niveaumax = $niveaumax;

        return $this;
    }

    /**
     * Get niveaumax
     *
     * @return string 
     */
    public function getNiveaumax()
    {
        return $this->niveaumax;
    }

    /**
     * Set meval
     *
     * @param float $meval
     * @return Membre
     */
    public function setMeval($meval)
    {
        $this->meval = $meval;

        return $this;
    }

    /**
     * Get meval
     *
     * @return float 
     */
    public function getMeval()
    {
        return $this->meval;
    }

    /**
     * Set emailvalide
     *
     * @param integer $emailvalide
     * @return Membre
     */
    public function setEmailvalide($emailvalide)
    {
        $this->emailvalide = $emailvalide;

        return $this;
    }

    /**
     * Get emailvalide
     *
     * @return integer 
     */
    public function getEmailvalide()
    {
        return $this->emailvalide;
    }

    /**
     * Get idmembre
     *
     * @return integer 
     */
    public function getIdmembre()
    {
        return $this->idmembre;
    }
}
