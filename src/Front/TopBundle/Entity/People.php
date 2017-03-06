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
}

