<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Region.
 *
 * Pour précalcule des distances vers sites
 *
 * @ORM\Table(name="region")
 * @ORM\Entity
 */
class Region
{
    /**
     * @var string
     *
     * @ORM\Column(name="rnom", type="string", length=100, nullable=false)
     */
    private $rnom;

    /**
     * @var float
     *
     * @ORM\Column(name="rlatitude", type="float", precision=10, scale=0, nullable=false)
     */
    private $rlatitude;

    /**
     * @var float
     *
     * @ORM\Column(name="rlongitude", type="float", precision=10, scale=0, nullable=false)
     */
    private $rlongitude;

    /**
     * @var int
     *
     * @ORM\Column(name="rid", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $rid;

    /**
     * Set rnom.
     *
     * @param string $rnom
     *
     * @return Region
     */
    public function setRnom($rnom)
    {
        $this->rnom = $rnom;

        return $this;
    }

    /**
     * Get rnom.
     *
     * @return string
     */
    public function getRnom()
    {
        return $this->rnom;
    }

    /**
     * Set rlatitude.
     *
     * @param float $rlatitude
     *
     * @return Region
     */
    public function setRlatitude($rlatitude)
    {
        $this->rlatitude = $rlatitude;

        return $this;
    }

    /**
     * Get rlatitude.
     *
     * @return float
     */
    public function getRlatitude()
    {
        return $this->rlatitude;
    }

    /**
     * Set rlongitude.
     *
     * @param float $rlongitude
     *
     * @return Region
     */
    public function setRlongitude($rlongitude)
    {
        $this->rlongitude = $rlongitude;

        return $this;
    }

    /**
     * Get rlongitude.
     *
     * @return float
     */
    public function getRlongitude()
    {
        return $this->rlongitude;
    }

    /**
     * Get rid.
     *
     * @return int
     */
    public function getRid()
    {
        return $this->rid;
    }
}
