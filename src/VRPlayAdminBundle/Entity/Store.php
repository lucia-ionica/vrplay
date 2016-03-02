<?php 

namespace VRPlayAdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="stores")
 * @ORM\Entity(repositoryClass="StoreRepository")
 */
class Store
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
  protected $profile_picture;

  /**
   * @ORM\Column(type="string", length=255, nullable=true)
   */
  protected $cover_image;

  /**
   * @ORM\Column(type="text", length=1000, nullable=true)
   */
  protected $description;

  /**
   * @ORM\Column(type="string", length=255, nullable=true)
   */
  protected $website_page;

  /**
   * @ORM\Column(type="string", length=255, nullable=true)
   */
  protected $twitter_page;

  /**
   * @ORM\Column(type="string", length=255, nullable=true)
   */
  protected $fb_page;

  /**
   * @ORM\Column(type="string", length=255, nullable=true)
   */
  protected $google_plus_page;

  /**
   * @ORM\ManyToOne(targetEntity="User", inversedBy="stores")
   * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
   */
  protected $owner;

    /**
     * @ORM\OneToMany(targetEntity="App", mappedBy="store")
     */
    protected $apps;

    /**
     * @ORM\ManyToMany(targetEntity="User", mappedBy="following_stores")
     */
    private $followers;

    /**
     * @ORM\OneToMany(targetEntity="Comment", mappedBy="store")
     */
    protected $comments;

    /**
     * Set id
     *
     * @param integer $id
     *
     * @return Store
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
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
     * @return Store
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
     * Set profilePicture
     *
     * @param string $profilePicture
     *
     * @return Store
     */
    public function setProfilePicture($profilePicture)
    {
        $this->profile_picture = $profilePicture;

        return $this;
    }

    /**
     * Get profilePicture
     *
     * @return string
     */
    public function getProfilePicture()
    {
        return $this->profile_picture;
    }

    /**
     * Set coverImage
     *
     * @param string $coverImage
     *
     * @return Store
     */
    public function setCoverImage($coverImage)
    {
        $this->cover_image = $coverImage;

        return $this;
    }

    /**
     * Get coverImage
     *
     * @return string
     */
    public function getCoverImage()
    {
        return $this->cover_image;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Store
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
     * Set websitePage
     *
     * @param string $websitePage
     *
     * @return Store
     */
    public function setWebsitePage($websitePage)
    {
        $this->website_page = $websitePage;

        return $this;
    }

    /**
     * Get websitePage
     *
     * @return string
     */
    public function getWebsitePage()
    {
        return $this->website_page;
    }

    /**
     * Set twitterPage
     *
     * @param string $twitterPage
     *
     * @return Store
     */
    public function setTwitterPage($twitterPage)
    {
        $this->twitter_page = $twitterPage;

        return $this;
    }

    /**
     * Get twitterPage
     *
     * @return string
     */
    public function getTwitterPage()
    {
        return $this->twitter_page;
    }

    /**
     * Set fbPage
     *
     * @param string $fbPage
     *
     * @return Store
     */
    public function setFbPage($fbPage)
    {
        $this->fb_page = $fbPage;

        return $this;
    }

    /**
     * Get fbPage
     *
     * @return string
     */
    public function getFbPage()
    {
        return $this->fb_page;
    }

    /**
     * Set googlePlusPage
     *
     * @param string $googlePlusPage
     *
     * @return Store
     */
    public function setGooglePlusPage($googlePlusPage)
    {
        $this->google_plus_page = $googlePlusPage;

        return $this;
    }

    /**
     * Get googlePlusPage
     *
     * @return string
     */
    public function getGooglePlusPage()
    {
        return $this->google_plus_page;
    }

    /**
     * Set owner
     *
     * @param \VRPlayAdminBundle\Entity\User $owner
     *
     * @return Store
     */
    public function setOwner(\VRPlayAdminBundle\Entity\User $owner = null)
    {
        $this->owner = $owner;

        return $this;
    }

    /**
     * Get owner
     *
     * @return \VRPlayAdminBundle\Entity\User
     */
    public function getOwner()
    {
        return $this->owner;
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
     * @return Store
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

    /**
     * Add follower
     *
     * @param \VRPlayAdminBundle\Entity\User $follower
     *
     * @return Store
     */
    public function addFollower(\VRPlayAdminBundle\Entity\User $follower)
    {
        $this->followers[] = $follower;

        return $this;
    }

    /**
     * Remove follower
     *
     * @param \VRPlayAdminBundle\Entity\User $follower
     */
    public function removeFollower(\VRPlayAdminBundle\Entity\User $follower)
    {
        $this->followers->removeElement($follower);
    }

    /**
     * Get followers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFollowers()
    {
        return $this->followers;
    }

    /**
     * Add comment
     *
     * @param \VRPlayAdminBundle\Entity\Comment $comment
     *
     * @return Store
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
}
