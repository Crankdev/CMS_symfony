<?php

namespace Front\TopBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Foto
 */
class Foto
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var integer
     */
    private $size_x;

    /**
     * @var integer
     */
    private $size_y;

    /**

     */
    private $activities;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Foto
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set sizeX
     *
     * @param integer $sizeX
     *
     * @return Foto
     */
    public function setSizeX($sizeX)
    {
        $this->size_x = $sizeX;

        return $this;
    }

    /**
     * Get sizeX
     *
     * @return integer
     */
    public function getSizeX()
    {
        return $this->size_x;
    }

    /**
     * Set sizeY
     *
     * @param integer $sizeY
     *
     * @return Foto
     */
    public function setSizeY($sizeY)
    {
        $this->size_y = $sizeY;

        return $this;
    }

    /**
     * Get sizeY
     *
     * @return integer
     */
    public function getSizeY()
    {
        return $this->size_y;
    }


    public function __toString()
    {
        if(is_null($this->name)) {
            return 'NULL';
        }
        return $this->name;
    }

    /**
     * Set activities
     *
     * @param \Front\TopBundle\Entity\Activities $activities
     *
     * @return Foto
     */
    public function setActivities(\Front\TopBundle\Entity\Activities $activities = null)
    {
        $this->activities = $activities;

        return $this;
    }

    /**
     * Get activities
     *
     * @return \Front\TopBundle\Entity\Activities
     */
    public function getActivities()
    {
        return $this->activities;
    }
}
