<?php

namespace comem\NewsroomBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Theme
 *
 * @ORM\Table(name="theme")
 * @ORM\Entity(repositoryClass="comem\NewsroomBundle\Entity\ThemeRepository")
 */
class Theme
{
    /**
     * @var string
     *
     * @ORM\Column(name="id", type="string", length=255)
     * @ORM\Id
     */
    private $ref;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;
    
    /**
     * 
     * @ORM\OneToMany(targetEntity="comem\NewsroomBundle\Entity\Theme", mappedBy="theme")
     */
    private $ads;
    
    
    /*
     * Constructor
     */
    public function __construct()
    {
        $this->ads = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Theme
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
     * Set ref
     *
     * @param string $ref
     * @return Theme
     */
    public function setRef($ref)
    {
        $this->ref = $ref;

        return $this;
    }

    /**
     * Get ref
     *
     * @return string 
     */
    public function getRef()
    {
        return $this->ref;
    }

    /**
     * Add ads
     *
     * @param \comem\NewsroomBundle\Entity\Theme $ads
     * @return Theme
     */
    public function addAd(\comem\NewsroomBundle\Entity\Theme $ads)
    {
        $this->ads[] = $ads;

        return $this;
    }

    /**
     * Remove ads
     *
     * @param \comem\NewsroomBundle\Entity\Theme $ads
     */
    public function removeAd(\comem\NewsroomBundle\Entity\Theme $ads)
    {
        $this->ads->removeElement($ads);
    }

    /**
     * Get ads
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAds()
    {
        return $this->ads;
    }
}
