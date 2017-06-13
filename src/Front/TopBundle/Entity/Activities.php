<?php

namespace Front\TopBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * Activities
 */
class Activities
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
     * @var string
     */
    private $url;

    /**
     * @var boolean
     */
    private $is_activated;

    /**
     * @var \DateTime
     */
    private $created_at;

    /**
     * @var \DateTime
     */
    private $updated_at;


    /**
     * @var \Front\TopBundle\Entity\Project
     */
    private $project;

    /**
     *Construct.
     */

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
     * @return Activities
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
     * @return Activities
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
     * @return Activities
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
     * @return Activities
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
     * @return Activities
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
     * @return Activities
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
     * Set url
     *
     * @param string $url
     *
     * @return Activities
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set isActivated
     *
     * @param boolean $isActivated
     *
     * @return Activities
     */
    public function setIsActivated($isActivated)
    {
        $this->is_activated = $isActivated;

        return $this;
    }

    /**
     * Get isActivated
     *
     * @return boolean
     */
    public function getIsActivated()
    {
        return $this->is_activated;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Activities
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = new \DateTime();

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Activities
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = new \DateTime();

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * Add foto
     *
     * @param \Front\TopBundle\Entity\Foto $foto
     *
     * @return Activities
     */
    public function addFoto(\Front\TopBundle\Entity\Foto $foto)
    {
        $this->foto[] = $foto;

        return $this;
    }

    /**
     * Remove foto
     *
     * @param \Front\TopBundle\Entity\Foto $foto
     */
    public function removeFoto(\Front\TopBundle\Entity\Foto $foto)
    {
        $this->foto->removeElement($foto);
    }

    /**
     * Get foto
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFoto()
    {
        return $this->foto;
    }

    /**
     * Add person
     *
     * @param \Front\TopBundle\Entity\People $person
     *
     * @return Activities
     */
    public function addPerson(\Front\TopBundle\Entity\People $person)
    {
        $this->people[] = $person;

        return $this;
    }

    /**
     * Remove person
     *
     * @param \Front\TopBundle\Entity\People $person
     */
    public function removePerson(\Front\TopBundle\Entity\People $person)
    {
        $this->people->removeElement($person);
    }

    /**
     * Get people
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPeople()
    {
        return $this->people;
    }

    /**
     * Set project
     *
     * @param \Front\TopBundle\Entity\Project $project
     *
     * @return Activities
     */
    public function setProject(\Front\TopBundle\Entity\Project $project = null)
    {
        $this->project = $project;

        return $this;
    }

    /**
     * Get project
     *
     * @return \Front\TopBundle\Entity\Project
     */
    public function getProject()
    {
        return $this->project;
    }
    /**
     * @ORM\PrePersist
     */
    public function setCreatedAtValue()
    {
        if($this->created_at == null)
        {
            $this->created_at = new \DateTime();
        }
    }

    /**
     * @ORM\PreUpdate
     */
    public function setUpdatedAtValue()
    {
        // Add your code here
    }
    public function __toString()
    {
        if(is_null($this->name)) {
            return 'NULL';
        }
        return $this->name;
    }
    /**
     * @var string
     */
    private $needs;

    /**
     * @var string
     */
    private $needs_ru;

    /**
     * @var string
     */
    private $needs_en;


    /**
     * Set needs
     *
     * @param string $needs
     *
     * @return Activities
     */
    public function setNeeds($needs)
    {
        $this->needs = $needs;

        return $this;
    }

    /**
     * Get needs
     *
     * @return string
     */
    public function getNeeds()
    {
        return $this->needs;
    }

    /**
     * Set needsRu
     *
     * @param string $needsRu
     *
     * @return Activities
     */
    public function setNeedsRu($needsRu)
    {
        $this->needs_ru = $needsRu;

        return $this;
    }

    /**
     * Get needsRu
     *
     * @return string
     */
    public function getNeedsRu()
    {
        return $this->needs_ru;
    }

    /**
     * Set needsEn
     *
     * @param string $needsEn
     *
     * @return Activities
     */
    public function setNeedsEn($needsEn)
    {
        $this->needs_en = $needsEn;

        return $this;
    }

    /**
     * Get needsEn
     *
     * @return string
     */
    public function getNeedsEn()
    {
        return $this->needs_en;
    }

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $foto;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $people;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->foto = new \Doctrine\Common\Collections\ArrayCollection();
        $this->people = new \Doctrine\Common\Collections\ArrayCollection();
    }
<<<<<<< HEAD
    public function __toString()
    {
        if(is_null($this->name)) {
            return 'NULL';
        }
        return $this->name;
    }
=======
>>>>>>> parent of 5f11dee... Update admin bundle

}
