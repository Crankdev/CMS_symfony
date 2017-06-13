<?php

namespace Front\TopBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * People
 */
class People
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
    private $who;

    /**
     * @var string
     */
    private $foto_peope;

    /**
     * @var string
     */
    private $mail;

    /**
     * @var string
     */
    private $phone;

    /**
     * @var string
     */
    private $facebook;




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
     * @return People
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
     * Set who
     *
     * @param string $who
     *
     * @return People
     */
    public function setWho($who)
    {
        $this->who = $who;

        return $this;
    }

    /**
     * Get who
     *
     * @return string
     */
    public function getWho()
    {
        return $this->who;
    }

    /**
     * Set fotoPeope
     *
     * @param string $fotoPeope
     *
     * @return People
     */
    public function setFotoPeope($fotoPeope)
    {
        $this->foto_peope = $fotoPeope;

        return $this;
    }

    /**
     * Get fotoPeope
     *
     * @return string
     */
    public function getFotoPeope()
    {
        return $this->foto_peope;
    }

    /**
     * Set mail
     *
     * @param string $mail
     *
     * @return People
     */
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get mail
     *
     * @return string
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set phone
     *
     * @param string $phone
     *
     * @return People
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set facebook
     *
     * @param string $facebook
     *
     * @return People
     */
    public function setFacebook($facebook)
    {
        $this->facebook = $facebook;

        return $this;
    }

    /**
     * Get facebook
     *
     * @return string
     */
    public function getFacebook()
    {
        return $this->facebook;
    }

    /**
     * Set activites
     *
     * @param \Front\TopBundle\Entity\Activities $activites
     *
     * @return People
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

    public function __toString()
    {
        if(is_null($this->name)) {
            return 'NULL';
        }
        return $this->name;
    }
    /**
     * @var \Front\TopBundle\Entity\Activities
     */
    private $activities;


    /**
     * Set activities
     *
     * @param \Front\TopBundle\Entity\Activities $activities
     *
     * @return People
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
    /**
     * @var string
     */
    private $foto;


    /**
     * Set foto
     *
     * @param string $foto
     *
     * @return People
     */
    public function setFoto($foto)
    {
        $this->foto = $foto;

        return $this;
    }

    /**
     * Get foto
     *
     * @return string
     */
    public function getFoto()
    {
        return $this->foto;
    }
    /**
     * @var string
     */
    private $name_ru;

    /**
     * @var string
     */
    private $who_ru;

    /**
     * @var string
     */
    private $name_en;

    /**
     * @var string
     */
    private $who_en;


    /**
     * Set nameRu
     *
     * @param string $nameRu
     *
     * @return People
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
     * Set whoRu
     *
     * @param string $whoRu
     *
     * @return People
     */
    public function setWhoRu($whoRu)
    {
        $this->who_ru = $whoRu;

        return $this;
    }

    /**
     * Get whoRu
     *
     * @return string
     */
    public function getWhoRu()
    {
        return $this->who_ru;
    }

    /**
     * Set nameEn
     *
     * @param string $nameEn
     *
     * @return People
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
     * Set whoEn
     *
     * @param string $whoEn
     *
     * @return People
     */
    public function setWhoEn($whoEn)
    {
        $this->who_en = $whoEn;

        return $this;
    }

    /**
     * Get whoEn
     *
     * @return string
     */
    public function getWhoEn()
    {
        return $this->who_en;
    }
}
