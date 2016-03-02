<?php 

namespace VRPlayAdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\Translatable\Translatable;

/**
 * @ORM\Table(name="categories")
 * @ORM\Entity(repositoryClass="CategoryRepository")
 */
class Category
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
   * @ORM\Column(type="string", length=100)
   */
  protected $available_for;

    /**
     * @ORM\OneToMany(targetEntity="Genre", mappedBy="category")
     */
    protected $genres;

    /**
     * @ORM\ManyToMany(targetEntity="App", mappedBy="categories")
     */
    private $apps;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->genres = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set availableFor
     *
     * @param string $availableFor
     *
     * @return Category
     */
    public function setAvailableFor($availableFor)
    {
        $this->available_for = $availableFor;

        return $this;
    }

    /**
     * Get availableFor
     *
     * @return string
     */
    public function getAvailableFor()
    {
        return $this->available_for;
    }

    /**
     * Add genre
     *
     * @param \VRPlayAdminBundle\Entity\Genre $genre
     *
     * @return Category
     */
    public function addGenre(\VRPlayAdminBundle\Entity\Genre $genre)
    {
        $this->genres[] = $genre;

        return $this;
    }

    /**
     * Remove genre
     *
     * @param \VRPlayAdminBundle\Entity\Genre $genre
     */
    public function removeGenre(\VRPlayAdminBundle\Entity\Genre $genre)
    {
        $this->genres->removeElement($genre);
    }

    /**
     * Get genres
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGenres()
    {
        return $this->genres;
    }

    /**
     * Add app
     *
     * @param \VRPlayAdminBundle\Entity\App $app
     *
     * @return Category
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
