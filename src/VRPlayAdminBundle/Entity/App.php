<?php 

namespace VRPlayAdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="apps")
 * @ORM\Entity(repositoryClass="AppRepository")
 */
class App
{
  /**
   * @ORM\Column(type="guid")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="UUID")
   */
  protected $id;

  /**
   * @ORM\Column(type="string", length=50, unique=true, nullable=false)
   * @Assert\NotBlank
   * @Assert\NotNull
   */
  protected $name;

  /**
   * @ORM\Column(type="string", length=255, nullable=true)
   */
  protected $app_thumb;

  /**
   * @ORM\Column(type="text", length=1000, nullable=true)
   */
  protected $description;

  /**
   * @ORM\Column(type="decimal", scale=2, nullable=true)
   * @Assert\Currency
   */
  protected $price;

  /**
   * @ORM\Column(type="string", length=255, nullable=true)
   */
  protected $screenshot1;

  /**
   * @ORM\Column(type="string", length=255, nullable=true)
   */
  protected $screenshot2;

  /**
   * @ORM\Column(type="string", length=255, nullable=true)
   */
  protected $screenshot3;

  /**
   * @ORM\Column(type="string", length=255, nullable=true)
   */
  protected $screenshot4;

  /**
   * @ORM\Column(type="string", length=255, nullable=true)
   */
  protected $screenshot5;

  /**
   * @ORM\Column(type="string", length=255, nullable=true)
   */
  protected $screenshot6;

  /**
   * @ORM\Column(type="string", length=255, nullable=true)
   */
  protected $screenshot7;

  /**
   * @ORM\Column(type="string", length=255, nullable=true)
   */
  protected $video1;

    /**
     * @ORM\OneToMany(targetEntity="AppVersion", mappedBy="app")
     */
    protected $app_versions;

    /**
     * @ORM\OneToMany(targetEntity="UserApp", mappedBy="app")
     */
    protected $user_apps;

    /**
     * @ORM\OneToMany(targetEntity="Comment", mappedBy="app")
     */
    protected $comments;

  /**
   * @ORM\ManyToOne(targetEntity="Store", inversedBy="apps")
   * @ORM\JoinColumn(name="store_id", referencedColumnName="id")
   */
  protected $store;

  /**
   * @ORM\ManyToOne(targetEntity="Status", inversedBy="app_statuses")
   * @ORM\JoinColumn(name="status_id", referencedColumnName="id")
   */
  protected $status;

    /**
     * @ORM\ManyToMany(targetEntity="Category", inversedBy="apps")
     * @ORM\JoinTable(name="apps_categories")
     */
    private $categories;

    /**
     * @ORM\ManyToMany(targetEntity="Genre", inversedBy="apps")
     * @ORM\JoinTable(name="apps_genres")
     */
    private $genres;

    /**
     * @ORM\OneToMany(targetEntity="UserFlaggedApp", mappedBy="app")
     */
    protected $user_flagged_apps;

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
     * @return App
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
     * Set appThumb
     *
     * @param string $appThumb
     *
     * @return App
     */
    public function setAppThumb($appThumb)
    {
        $this->app_thumb = $appThumb;

        return $this;
    }

    /**
     * Get appThumb
     *
     * @return string
     */
    public function getAppThumb()
    {
        return $this->app_thumb;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return App
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
     * Set price
     *
     * @param string $price
     *
     * @return App
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set screenshot1
     *
     * @param string $screenshot1
     *
     * @return App
     */
    public function setScreenshot1($screenshot1)
    {
        $this->screenshot1 = $screenshot1;

        return $this;
    }

    /**
     * Get screenshot1
     *
     * @return string
     */
    public function getScreenshot1()
    {
        return $this->screenshot1;
    }

    /**
     * Set screenshot2
     *
     * @param string $screenshot2
     *
     * @return App
     */
    public function setScreenshot2($screenshot2)
    {
        $this->screenshot2 = $screenshot2;

        return $this;
    }

    /**
     * Get screenshot2
     *
     * @return string
     */
    public function getScreenshot2()
    {
        return $this->screenshot2;
    }

    /**
     * Set screenshot3
     *
     * @param string $screenshot3
     *
     * @return App
     */
    public function setScreenshot3($screenshot3)
    {
        $this->screenshot3 = $screenshot3;

        return $this;
    }

    /**
     * Get screenshot3
     *
     * @return string
     */
    public function getScreenshot3()
    {
        return $this->screenshot3;
    }

    /**
     * Set screenshot4
     *
     * @param string $screenshot4
     *
     * @return App
     */
    public function setScreenshot4($screenshot4)
    {
        $this->screenshot4 = $screenshot4;

        return $this;
    }

    /**
     * Get screenshot4
     *
     * @return string
     */
    public function getScreenshot4()
    {
        return $this->screenshot4;
    }

    /**
     * Set screenshot5
     *
     * @param string $screenshot5
     *
     * @return App
     */
    public function setScreenshot5($screenshot5)
    {
        $this->screenshot5 = $screenshot5;

        return $this;
    }

    /**
     * Get screenshot5
     *
     * @return string
     */
    public function getScreenshot5()
    {
        return $this->screenshot5;
    }

    /**
     * Set screenshot6
     *
     * @param string $screenshot6
     *
     * @return App
     */
    public function setScreenshot6($screenshot6)
    {
        $this->screenshot6 = $screenshot6;

        return $this;
    }

    /**
     * Get screenshot6
     *
     * @return string
     */
    public function getScreenshot6()
    {
        return $this->screenshot6;
    }

    /**
     * Set screenshot7
     *
     * @param string $screenshot7
     *
     * @return App
     */
    public function setScreenshot7($screenshot7)
    {
        $this->screenshot7 = $screenshot7;

        return $this;
    }

    /**
     * Get screenshot7
     *
     * @return string
     */
    public function getScreenshot7()
    {
        return $this->screenshot7;
    }

    /**
     * Set video1
     *
     * @param string $video1
     *
     * @return App
     */
    public function setVideo1($video1)
    {
        $this->video1 = $video1;

        return $this;
    }

    /**
     * Get video1
     *
     * @return string
     */
    public function getVideo1()
    {
        return $this->video1;
    }

    /**
     * Set store
     *
     * @param \VRPlayAdminBundle\Entity\Store $store
     *
     * @return App
     */
    public function setStore(\VRPlayAdminBundle\Entity\Store $store = null)
    {
        $this->store = $store;

        return $this;
    }

    /**
     * Get store
     *
     * @return \VRPlayAdminBundle\Entity\Store
     */
    public function getStore()
    {
        return $this->store;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->categories = new \Doctrine\Common\Collections\ArrayCollection();
        $this->genres = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add category
     *
     * @param \VRPlayAdminBundle\Entity\Category $category
     *
     * @return App
     */
    public function addCategory(\VRPlayAdminBundle\Entity\Category $category)
    {
        $this->categories[] = $category;

        return $this;
    }

    /**
     * Remove category
     *
     * @param \VRPlayAdminBundle\Entity\Category $category
     */
    public function removeCategory(\VRPlayAdminBundle\Entity\Category $category)
    {
        $this->categories->removeElement($category);
    }

    /**
     * Get categories
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * Add genre
     *
     * @param \VRPlayAdminBundle\Entity\Genre $genre
     *
     * @return App
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
     * Add appVersion
     *
     * @param \VRPlayAdminBundle\Entity\AppVersion $appVersion
     *
     * @return App
     */
    public function addAppVersion(\VRPlayAdminBundle\Entity\AppVersion $appVersion)
    {
        $this->app_versions[] = $appVersion;

        return $this;
    }

    /**
     * Remove appVersion
     *
     * @param \VRPlayAdminBundle\Entity\AppVersion $appVersion
     */
    public function removeAppVersion(\VRPlayAdminBundle\Entity\AppVersion $appVersion)
    {
        $this->app_versions->removeElement($appVersion);
    }

    /**
     * Get appVersions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAppVersions()
    {
        return $this->app_versions;
    }

    /**
     * Set status
     *
     * @param \VRPlayAdminBundle\Entity\Status $status
     *
     * @return App
     */
    public function setStatus(\VRPlayAdminBundle\Entity\Status $status = null)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return \VRPlayAdminBundle\Entity\Status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Add userApp
     *
     * @param \VRPlayAdminBundle\Entity\UserApp $userApp
     *
     * @return App
     */
    public function addUserApp(\VRPlayAdminBundle\Entity\UserApp $userApp)
    {
        $this->user_apps[] = $userApp;

        return $this;
    }

    /**
     * Remove userApp
     *
     * @param \VRPlayAdminBundle\Entity\UserApp $userApp
     */
    public function removeUserApp(\VRPlayAdminBundle\Entity\UserApp $userApp)
    {
        $this->user_apps->removeElement($userApp);
    }

    /**
     * Get userApps
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUserApps()
    {
        return $this->user_apps;
    }

    /**
     * Add flag
     *
     * @param \VRPlayAdminBundle\Entity\Flag $flag
     *
     * @return App
     */
    public function addFlag(\VRPlayAdminBundle\Entity\Flag $flag)
    {
        $this->flags[] = $flag;

        return $this;
    }

    /**
     * Remove flag
     *
     * @param \VRPlayAdminBundle\Entity\Flag $flag
     */
    public function removeFlag(\VRPlayAdminBundle\Entity\Flag $flag)
    {
        $this->flags->removeElement($flag);
    }

    /**
     * Get flags
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFlags()
    {
        return $this->flags;
    }

    /**
     * Add comment
     *
     * @param \VRPlayAdminBundle\Entity\Comment $comment
     *
     * @return App
     */
    public function addComment(\VRPlayAdminBundle\Entity\Comment $comment)
    {
        $this->comments[] = $comment;

        return $this;
    }

    /**
     * Remove comment
     *
     * @param \VRPlayAdminBundle\Entity\Comment $comment
     */
    public function removeComment(\VRPlayAdminBundle\Entity\Comment $comment)
    {
        $this->comments->removeElement($comment);
    }

    /**
     * Get comments
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Add userFlaggedApp
     *
     * @param \VRPlayAdminBundle\Entity\UserFlaggedApp $userFlaggedApp
     *
     * @return App
     */
    public function addUserFlaggedApp(\VRPlayAdminBundle\Entity\UserFlaggedApp $userFlaggedApp)
    {
        $this->user_flagged_apps[] = $userFlaggedApp;

        return $this;
    }

    /**
     * Remove userFlaggedApp
     *
     * @param \VRPlayAdminBundle\Entity\UserFlaggedApp $userFlaggedApp
     */
    public function removeUserFlaggedApp(\VRPlayAdminBundle\Entity\UserFlaggedApp $userFlaggedApp)
    {
        $this->user_flagged_apps->removeElement($userFlaggedApp);
    }

    /**
     * Get userFlaggedApps
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUserFlaggedApps()
    {
        return $this->user_flagged_apps;
    }
}
