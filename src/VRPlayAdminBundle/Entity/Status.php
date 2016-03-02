<?php 

namespace VRPlayAdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="statuses")
 * @ORM\Entity(repositoryClass="StatusRepository")
 */
class Status
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
  protected $name;

    /**
     * @ORM\OneToMany(targetEntity="User", mappedBy="status")
     */
    protected $user_statuses;

    /**
     * @ORM\OneToMany(targetEntity="App", mappedBy="status")
     */
    protected $app_statuses;

    /**
     * @ORM\OneToMany(targetEntity="AppVersion", mappedBy="status")
     */
    protected $app_version_statuses;


    /**
     * Set id
     *
     * @param integer $id
     *
     * @return Status
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
     * @return Status
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
     * @return Status
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
     * Constructor
     */
    public function __construct()
    {
        $this->user_statuses = new \Doctrine\Common\Collections\ArrayCollection();
        $this->app_statuses = new \Doctrine\Common\Collections\ArrayCollection();
        $this->app_version_statuses = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add userStatus
     *
     * @param \VRPlayAdminBundle\Entity\User $userStatus
     *
     * @return Status
     */
    public function addUserStatus(\VRPlayAdminBundle\Entity\User $userStatus)
    {
        $this->user_statuses[] = $userStatus;

        return $this;
    }

    /**
     * Remove userStatus
     *
     * @param \VRPlayAdminBundle\Entity\User $userStatus
     */
    public function removeUserStatus(\VRPlayAdminBundle\Entity\User $userStatus)
    {
        $this->user_statuses->removeElement($userStatus);
    }

    /**
     * Get userStatuses
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUserStatuses()
    {
        return $this->user_statuses;
    }

    /**
     * Add appStatus
     *
     * @param \VRPlayAdminBundle\Entity\App $appStatus
     *
     * @return Status
     */
    public function addAppStatus(\VRPlayAdminBundle\Entity\App $appStatus)
    {
        $this->app_statuses[] = $appStatus;

        return $this;
    }

    /**
     * Remove appStatus
     *
     * @param \VRPlayAdminBundle\Entity\App $appStatus
     */
    public function removeAppStatus(\VRPlayAdminBundle\Entity\App $appStatus)
    {
        $this->app_statuses->removeElement($appStatus);
    }

    /**
     * Get appStatuses
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAppStatuses()
    {
        return $this->app_statuses;
    }

    /**
     * Add appVersionStatus
     *
     * @param \VRPlayAdminBundle\Entity\AppVersion $appVersionStatus
     *
     * @return Status
     */
    public function addAppVersionStatus(\VRPlayAdminBundle\Entity\AppVersion $appVersionStatus)
    {
        $this->app_version_statuses[] = $appVersionStatus;

        return $this;
    }

    /**
     * Remove appVersionStatus
     *
     * @param \VRPlayAdminBundle\Entity\AppVersion $appVersionStatus
     */
    public function removeAppVersionStatus(\VRPlayAdminBundle\Entity\AppVersion $appVersionStatus)
    {
        $this->app_version_statuses->removeElement($appVersionStatus);
    }

    /**
     * Get appVersionStatuses
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAppVersionStatuses()
    {
        return $this->app_version_statuses;
    }
}
