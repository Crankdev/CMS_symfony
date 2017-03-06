<?php

namespace Front\TopBundle\Entity;

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
     * @var \Front\TopBundle\Entity\Activities
     */
    private $activites;


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

    /**
     * Set activites
     *
     * @param \Front\TopBundle\Entity\Activities $activites
     *
     * @return Foto
     */
    public function setActivites(\Front\TopBundle\Entity\Activities $activites = null)
    {
        $this->activites = $activites;

        return $this;
    }

    /**
     * Get activites
     *
     * @return \Front\TopBundle\Entity\Activities
     */
    public function getActivites()
    {
        return $this->activites;
    }
}

