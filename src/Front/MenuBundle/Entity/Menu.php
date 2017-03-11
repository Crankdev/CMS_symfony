<?php

namespace Front\MenuBundle\Entity;

/**
 * Menu
 */
class Menu
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
    private $url;

    /**
     * @var boolean
     */
    private $is_activated;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $listit;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->listit = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Menu
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
     * @return Menu
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
     * @return Menu
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
     * Set url
     *
     * @param string $url
     *
     * @return Menu
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
     * @return Menu
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
     * Add listit
     *
     * @param \Front\MenuBundle\Entity\listit $listit
     *
     * @return Menu
     */
    public function addListit(\Front\MenuBundle\Entity\listit $listit)
    {
        $this->listit[] = $listit;

        return $this;
    }

    /**
     * Remove listit
     *
     * @param \Front\MenuBundle\Entity\listit $listit
     */
    public function removeListit(\Front\MenuBundle\Entity\listit $listit)
    {
        $this->listit->removeElement($listit);
    }

    /**
     * Get listit
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getListit()
    {
        return $this->listit;
    }
    /**
     * @var \Front\MenuBundle\Entity\Menu
     */
    private $menu;


    /**
     * Set menu
     *
     * @param \Front\MenuBundle\Entity\Menu $menu
     *
     * @return Menu
     */
    public function setMenu(\Front\MenuBundle\Entity\Menu $menu = null)
    {
        $this->menu = $menu;

        return $this;
    }

    /**
     * Get menu
     *
     * @return \Front\MenuBundle\Entity\Menu
     */
    public function getMenu()
    {
        return $this->menu;
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
    private $title;


    /**
     * Set title
     *
     * @param string $title
     *
     * @return Menu
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }
    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $keywords;


    /**
     * Set description
     *
     * @param string $description
     *
     * @return Menu
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set keywords
     *
     * @param string $keywords
     *
     * @return Menu
     */
    public function setKeywords($keywords)
    {
        $this->keywords = $keywords;

        return $this;
    }

    /**
     * Get keywords
     *
     * @return string
     */
    public function getKeywords()
    {
        return $this->keywords;
    }
    /**
     * @var string
     */
    private $icon;

    /**
     * @var string
     */
    private $title_ru;

    /**
     * @var string
     */
    private $description_ru;

    /**
     * @var string
     */
    private $keywords_ru;

    /**
     * @var string
     */
    private $title_en;

    /**
     * @var string
     */
    private $description_en;

    /**
     * @var string
     */
    private $keywords_en;


    /**
     * Set icon
     *
     * @param string $icon
     *
     * @return Menu
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;

        return $this;
    }

    /**
     * Get icon
     *
     * @return string
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * Set titleRu
     *
     * @param string $titleRu
     *
     * @return Menu
     */
    public function setTitleRu($titleRu)
    {
        $this->title_ru = $titleRu;

        return $this;
    }

    /**
     * Get titleRu
     *
     * @return string
     */
    public function getTitleRu()
    {
        return $this->title_ru;
    }

    /**
     * Set descriptionRu
     *
     * @param string $descriptionRu
     *
     * @return Menu
     */
    public function setDescriptionRu($descriptionRu)
    {
        $this->description_ru = $descriptionRu;

        return $this;
    }

    /**
     * Get descriptionRu
     *
     * @return string
     */
    public function getDescriptionRu()
    {
        return $this->description_ru;
    }

    /**
     * Set keywordsRu
     *
     * @param string $keywordsRu
     *
     * @return Menu
     */
    public function setKeywordsRu($keywordsRu)
    {
        $this->keywords_ru = $keywordsRu;

        return $this;
    }

    /**
     * Get keywordsRu
     *
     * @return string
     */
    public function getKeywordsRu()
    {
        return $this->keywords_ru;
    }

    /**
     * Set titleEn
     *
     * @param string $titleEn
     *
     * @return Menu
     */
    public function setTitleEn($titleEn)
    {
        $this->title_en = $titleEn;

        return $this;
    }

    /**
     * Get titleEn
     *
     * @return string
     */
    public function getTitleEn()
    {
        return $this->title_en;
    }

    /**
     * Set descriptionEn
     *
     * @param string $descriptionEn
     *
     * @return Menu
     */
    public function setDescriptionEn($descriptionEn)
    {
        $this->description_en = $descriptionEn;

        return $this;
    }

    /**
     * Get descriptionEn
     *
     * @return string
     */
    public function getDescriptionEn()
    {
        return $this->description_en;
    }

    /**
     * Set keywordsEn
     *
     * @param string $keywordsEn
     *
     * @return Menu
     */
    public function setKeywordsEn($keywordsEn)
    {
        $this->keywords_en = $keywordsEn;

        return $this;
    }

    /**
     * Get keywordsEn
     *
     * @return string
     */
    public function getKeywordsEn()
    {
        return $this->keywords_en;
    }
}
