<?php

namespace Custom\CMSBundle\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Category
 *
 * @ORM\Table(name="category")
 * @ORM\Entity(repositoryClass="Custom\CMSBundle\Repository\CategoryRepository")
 */
class Category
{

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="Page", mappedBy="category")
     */
    private $pages;

    public function _construct()
    {
        $this->pages = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->name;
    }

    /**
     * Get id
     *
     * @return int
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
     * @return Category
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
     * @param Page $pages
     *
     * @return Category
     */
    public function addPage(Page $pages)
    {
        $this->pages[] = $pages;

        return $this;
    }

    /**
     * Remove pages
     *
     * @param Page $pages
     */
    public function removePage(Page $pages)
    {
        $this->getPages()->removeElement($pages);
    }

    /**
     * Get pages
     *
     * @return Collection
     */
    public function getPages()
    {
        return $this->pages;
    }
}

