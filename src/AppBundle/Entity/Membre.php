<?php

// src/Entity/Membre.php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Membre entity
 *
 * Defini les utilisateurs (et admins). 
 * Hérite de BaseUser du FOSUserBundle
 * 
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MembreRepository")
 * @ORM\Table(name="fos_user")
 */
class Membre extends BaseUser
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=30, nullable=true)
     * 
     * //Assert\NotBlank(message="Entrez un nom.", groups={"Registration", "Profile"})
     * //Assert\Length(
     *     min=3,
     *     max=255,
     *     minMessage="The name is too short.",
     *     maxMessage="The name is too long.",
     *     groups={"Registration", "Profile"}
     * )
     */
    protected $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=30, nullable=true)
     *
     */
    protected $prenom;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datecreated", type="datetime", nullable=true, options={"default": 0} )
     */
    protected $datecreated;

    /**
     * @var string
     *
     * @ORM\Column(name="lastip", type="string", length=50, nullable=true)
     */
    protected $lastip;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone", type="string", length=20, nullable=true)
     */
    protected $telephone;

    /**
     * @var string
     *
     * @ORM\Column(name="avatar", type="string", length=250, nullable=true)
     */
    protected $avatar;

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
     * @var float
     *
     * @ORM\Column(name="eval", type="float", precision=10, scale=0, nullable=true)
     */
    protected $eval;


    /**
     * Set nom
     *
     * @param string $nom
     *
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
     *
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
     * Set datecreated
     *
     * @param \DateTime $datecreated
     *
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
     * Set lastip
     *
     * @param string $lastip
     *
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
     *
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
     *
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
     *
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
     *
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
     * Set eval
     *
     * @param float $eval
     *
     * @return Membre
     */
    public function setEval($eval)
    {
        $this->eval = $eval;

        return $this;
    }

    /**
     * Get eval
     *
     * @return float
     */
    public function getEval()
    {
        return $this->eval;
    }
}
