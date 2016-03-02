<?php
namespace VRPlayAdminBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="fos_user")
 * @ORM\Entity(repositoryClass="UserRepository")
 */
class User extends BaseUser
{
    /**
   * @ORM\Column(type="guid")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="UUID")
     */
    protected $id;
    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $first_name;
    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $last_name;
    /**
     * @ORM\Column(type="string", length=15)
     */
    protected $phone;
    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $profile_picture;
    /**
     * @ORM\Column(type="string", length=25)
     */
    protected $gender;
    /**
     * @ORM\Column(type="date")
     */
    protected $birthday;
    /**
     * @ORM\Column(type="string", length=150)
     */
    protected $country;

    /**
     * @ORM\Column(type="json")
     */
    protected $settings;


    /**
     * @ORM\OneToMany(targetEntity="Store", mappedBy="owner")
     */
    protected $stores;

    /**
     * @ORM\ManyToMany(targetEntity="Store", inversedBy="followers")
     * @ORM\JoinTable(name="user_following_stores")
     */
    private $following_stores;

    /**
     * @ORM\ManyToOne(targetEntity="Status", inversedBy="user_statuses")
     * @ORM\JoinColumn(name="status_id", referencedColumnName="id")
     */
    protected $status;

    /**
     * @ORM\OneToMany(targetEntity="UserApp", mappedBy="user")
     */
    protected $user_apps;

    /**
     * @ORM\OneToMany(targetEntity="Comment", mappedBy="user")
     */
    protected $comments;

    /**
     * @ORM\OneToMany(targetEntity="UserFlaggedComment", mappedBy="user")
     */
    protected $user_flagged_comments;

    /**
     * @ORM\OneToMany(targetEntity="UserFlaggedApp", mappedBy="user")
     */
    protected $user_flagged_apps;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    /**
     * Set id
     *
     * @param integer $id
     *
     * @return User
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     *
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->first_name = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->last_name = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * Set phone
     *
     * @param string $phone
     *
     * @return User
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set profilePicture
     *
     * @param string $profilePicture
     *
     * @return User
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
     * Set gender
     *
     * @param string $gender
     *
     * @return User
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set birthday
     *
     * @param \DateTime $birthday
     *
     * @return User
     */
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;

        return $this;
    }

    /**
     * Get birthday
     *
     * @return \DateTime
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * Set country
     *
     * @param string $country
     *
     * @return User
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Add store
     *
     * @param \VRPlayAdminBundle\Entity\Store $store
     *
     * @return User
     */
    public function addStore(\VRPlayAdminBundle\Entity\Store $store)
    {
        $this->stores[] = $store;

        return $this;
    }

    /**
     * Remove store
     *
     * @param \VRPlayAdminBundle\Entity\Store $store
     */
    public function removeStore(\VRPlayAdminBundle\Entity\Store $store)
    {
        $this->stores->removeElement($store);
    }

    /**
     * Get stores
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getStores()
    {
        return $this->stores;
    }

    /**
     * Add followingStore
     *
     * @param \VRPlayAdminBundle\Entity\Store $followingStore
     *
     * @return User
     */
    public function addFollowingStore(\VRPlayAdminBundle\Entity\Store $followingStore)
    {
        $this->following_stores[] = $followingStore;

        return $this;
    }

    /**
     * Remove followingStore
     *
     * @param \VRPlayAdminBundle\Entity\Store $followingStore
     */
    public function removeFollowingStore(\VRPlayAdminBundle\Entity\Store $followingStore)
    {
        $this->following_stores->removeElement($followingStore);
    }

    /**
     * Get followingStores
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFollowingStores()
    {
        return $this->following_stores;
    }

    /**
     * Set status
     *
     * @param \VRPlayAdminBundle\Entity\Status $status
     *
     * @return User
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
     * @return User
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
     * Add comment
     *
     * @param \VRPlayAdminBundle\Entity\Comment $comment
     *
     * @return User
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
     * Set settings
     *
     * @param \json $settings
     *
     * @return User
     */
    public function setSettings(\json $settings)
    {
        $this->settings = $settings;

        return $this;
    }

    /**
     * Get settings
     *
     * @return \json
     */
    public function getSettings()
    {
        return $this->settings;
    }
}
