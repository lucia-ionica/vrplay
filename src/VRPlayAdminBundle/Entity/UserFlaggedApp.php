<?php 

namespace VRPlayAdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="user_flagged_app")
 * @ORM\Entity(repositoryClass="UserFlaggedAppRepository")
 */
class UserFlaggedApp
{
  /**
   * @ORM\Column(type="guid")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="UUID")
   */
  protected $id;

  /**
   * @ORM\ManyToOne(targetEntity="User", inversedBy="user_flagged_apps")
   * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
   */
  protected $user;

  /**
   * @ORM\ManyToOne(targetEntity="App", inversedBy="user_flagged_apps")
   * @ORM\JoinColumn(name="app_id", referencedColumnName="id")
   */
  protected $app;

  /**
   * @ORM\ManyToOne(targetEntity="Flag", inversedBy="user_flagged_apps")
   * @ORM\JoinColumn(name="flag_id", referencedColumnName="id")
   */
  protected $flag;


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
     * Set user
     *
     * @param \VRPlayAdminBundle\Entity\User $user
     *
     * @return UserFlaggedApp
     */
    public function setUser(\VRPlayAdminBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \VRPlayAdminBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set app
     *
     * @param \VRPlayAdminBundle\Entity\App $app
     *
     * @return UserFlaggedApp
     */
    public function setApp(\VRPlayAdminBundle\Entity\App $app = null)
    {
        $this->app = $app;

        return $this;
    }

    /**
     * Get app
     *
     * @return \VRPlayAdminBundle\Entity\App
     */
    public function getApp()
    {
        return $this->app;
    }

    /**
     * Set flag
     *
     * @param \VRPlayAdminBundle\Entity\Flag $flag
     *
     * @return UserFlaggedApp
     */
    public function setFlag(\VRPlayAdminBundle\Entity\Flag $flag = null)
    {
        $this->flag = $flag;

        return $this;
    }

    /**
     * Get flag
     *
     * @return \VRPlayAdminBundle\Entity\Flag
     */
    public function getFlag()
    {
        return $this->flag;
    }
}
