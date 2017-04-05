<?php

namespace Front\TopBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * Project
 */
class Project
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
     * @var string
     */
    private $name_ru;

    /**
     * @var string
     */
    private $name_en;

    /**
     * @var string
     */
    private $about;

    /**
     * @var string
     */
    private $about_ru;

    /**
     * @var string
     */
    private $about_en;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $activities;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->activities = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * @return Project
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
     * Set nameRu
     *
     * @param string $nameRu
     *
     * @return Project
     */
    public function setNameRu($nameRu)
    {
        $this->name_ru = $nameRu;

        return $this;
    }

    /**
     * Get nameRu
     *
     * @return string
     */
    public function getNameRu()
    {
        return $this->name_ru;
    }

    /**
     * Set nameEn
     *
     * @param string $nameEn
     *
     * @return Project
     */
    public function setNameEn($nameEn)
    {
        $this->name_en = $nameEn;

        return $this;
    }

    /**
     * Get nameEn
     *
     * @return string
     */
    public function getNameEn()
    {
        return $this->name_en;
    }

    /**
     * Set about
     *
     * @param string $about
     *
     * @return Project
     */
    public function setAbout($about)
    {
        $this->about = $about;

        return $this;
    }

    /**
     * Get about
     *
     * @return string
     */
    public function getAbout()
    {
        return $this->about;
    }

    /**
     * Set aboutRu
     *
     * @param string $aboutRu
     *
     * @return Project
     */
    public function setAboutRu($aboutRu)
    {
        $this->about_ru = $aboutRu;

        return $this;
    }

    /**
     * Get aboutRu
     *
     * @return string
     */
    public function getAboutRu()
    {
        return $this->about_ru;
    }

    /**
     * Set aboutEn
     *
     * @param string $aboutEn
     *
     * @return Project
     */
    public function setAboutEn($aboutEn)
    {
        $this->about_en = $aboutEn;

        return $this;
    }

    /**
     * Get aboutEn
     *
     * @return string
     */
    public function getAboutEn()
    {
        return $this->about_en;
    }

    /**
     * Add activite
     *
     * @param \Front\TopBundle\Entity\activities $activities
     *
     * @return Project
     */
    public function addActivities(\Front\TopBundle\Entity\activities $activities)
    {
        $this->activities[] = $activities;

        return $this;
    }

    /**
     * Remove activite
     *
     * @param \Front\TopBundle\Entity\activities $activite
     */
    public function removeActivities(\Front\TopBundle\Entity\activities $activities)
    {
        $this->activities->removeElement($activities);
    }

    /**
     * Get activites
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getActivities()
    {
        return $this->activities;
    }

    public function __toString()
    {
        if(is_null($this->name)) {
            return 'NULL';
        }
        return $this->name;
    }
}
