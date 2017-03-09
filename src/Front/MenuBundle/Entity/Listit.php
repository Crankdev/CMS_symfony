<?php

namespace Front\MenuBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * Listit
 */
class Listit
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
    private $locales;

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
     * @var string
     */
    private $foto;

    /**
     * @var \Front\MenuBundle\Entity\menu
     */
    private $menu;


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
     * @return Listit
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
     * @return Listit
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
     * @return Listit
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
     * @return Listit
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
     * @return Listit
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
     * @return Listit
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
     * Set locales
     *
     * @param string $locales
     *
     * @return Listit
     */
    public function setLocales($locales)
    {
        $this->locales = $locales;

        return $this;
    }

    /**
     * Get locales
     *
     * @return string
     */
    public function getLocales()
    {
        return $this->locales;
    }

    /**
     * Set url
     *
     * @param string $url
     *
     * @return Listit
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
     * @return Listit
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
     * @return Listit
     */
    public function setCreatedAt($createdAt)
    {
         if(!$this->getCreatedAt())
         {
            $this->created_at = new \DateTime();
         }
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
     * @return Listit
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->created_at = new \DateTime();
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
     * Set foto
     *
     * @param string $foto
     *
     * @return Listit
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
     * Set menu
     *
     * @param \Front\MenuBundle\Entity\menu $menu
     *
     * @return Listit
     */
    public function setMenu(\Front\MenuBundle\Entity\menu $menu = null)
    {
        $this->menu = $menu;

        return $this;
    }

    /**
     * Get menu
     *
     * @return \Front\MenuBundle\Entity\menu
     */
    public function getMenu()
    {
        return $this->menu;
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
}
