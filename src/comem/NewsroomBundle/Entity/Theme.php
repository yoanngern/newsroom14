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
     * @var string
     *
     * @ORM\Column(name="bigTitle", type="string", length=255)
     */
    private $bigTitle;
    
    
    /**
     * 
     * @ORM\ManyToMany(targetEntity="comem\NewsroomBundle\Entity\Ad", mappedBy="themes")
     */
    private $ads;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->ads = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Add ads
     *
     * @param \comem\NewsroomBundle\Entity\Ad $ads
     * @return Theme
     */
    public function addAd(\comem\NewsroomBundle\Entity\Ad $ads)
    {
        $this->ads[] = $ads;

        return $this;
    }

    /**
     * Remove ads
     *
     * @param \comem\NewsroomBundle\Entity\Ad $ads
     */
    public function removeAd(\comem\NewsroomBundle\Entity\Ad $ads)
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

    /**
     * Set bigTitle
     *
     * @param string $bigTitle
     * @return Theme
     */
    public function setBigTitle($bigTitle)
    {
        $this->bigTitle = $bigTitle;

        return $this;
    }

    /**
     * Get bigTitle
     *
     * @return string 
     */
    public function getBigTitle()
    {
        return $this->bigTitle;
    }
}
