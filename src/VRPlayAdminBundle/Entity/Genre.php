<?php 

namespace VRPlayAdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\Translatable\Translatable;

/**
 * @ORM\Table(name="genres")
 * @ORM\Entity(repositoryClass="GenreRepository")
 */
class Genre
{
  /**
   * @ORM\Column(type="guid")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="UUID")
   */
  protected $id;

  /**
   * @Gedmo\Translatable
   * @ORM\Column(type="string", length=50, unique=true, nullable=false)
   * @Assert\NotBlank
   * @Assert\NotNull
   */
  protected $name;

  /**
   * @ORM\ManyToOne(targetEntity="Category", inversedBy="genres")
   * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
   */
  protected $category;

    /**
     * @ORM\ManyToMany(targetEntity="App", mappedBy="genres")
     */
    private $apps;



    /**
     * Get id
     *
     * @return guid
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
     * @return Genre
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
     * Set category
     *
     * @param \VRPlayAdminBundle\Entity\Category $category
     *
     * @return Genre
     */
    public function setCategory(\VRPlayAdminBundle\Entity\Category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \VRPlayAdminBundle\Entity\Category
     */
    public function getCategory()
    {
        return $this->category;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->apps = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add app
     *
     * @param \VRPlayAdminBundle\Entity\App $app
     *
     * @return Genre
     */
    public function addApp(\VRPlayAdminBundle\Entity\App $app)
    {
        $this->apps[] = $app;

        return $this;
    }

    /**
     * Remove app
     *
     * @param \VRPlayAdminBundle\Entity\App $app
     */
    public function removeApp(\VRPlayAdminBundle\Entity\App $app)
    {
        $this->apps->removeElement($app);
    }

    /**
     * Get apps
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getApps()
    {
        return $this->apps;
    }
}
