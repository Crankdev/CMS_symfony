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
}
