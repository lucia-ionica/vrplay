<?php 

namespace VRPlayAdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="user_apps")
 * @ORM\Entity(repositoryClass="UserAppRepository")
 */
class UserApp
{
  /**
   * @ORM\Column(type="guid")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="UUID")
   */
  protected $id;

  /**
   * @ORM\Column(type="boolean")
   */
  protected $is_downloaded;

  /**
   * @ORM\Column(type="boolean")
   */
  protected $is_purchased;

  /**
   * @ORM\Column(type="boolean")
   */
  protected $in_wishlist;

  /**
   * @ORM\Column(type="boolean")
   */
  protected $is_liked;

  /**
   * @ORM\Column(type="boolean")
   */
  protected $is_disliked;

  /**
   * @ORM\ManyToOne(targetEntity="User", inversedBy="user_apps")
   * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
   */
  protected $user;

  /**
   * @ORM\ManyToOne(targetEntity="App", inversedBy="user_apps")
   * @ORM\JoinColumn(name="app_id", referencedColumnName="id")
   */
  protected $app;



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
     * Set isDownloaded
     *
     * @param boolean $isDownloaded
     *
     * @return UserApp
     */
    public function setIsDownloaded($isDownloaded)
    {
        $this->is_downloaded = $isDownloaded;

        return $this;
    }

    /**
     * Get isDownloaded
     *
     * @return boolean
     */
    public function getIsDownloaded()
    {
        return $this->is_downloaded;
    }

    /**
     * Set isPurchased
     *
     * @param boolean $isPurchased
     *
     * @return UserApp
     */
    public function setIsPurchased($isPurchased)
    {
        $this->is_purchased = $isPurchased;

        return $this;
    }

    /**
     * Get isPurchased
     *
     * @return boolean
     */
    public function getIsPurchased()
    {
        return $this->is_purchased;
    }

    /**
     * Set inWishlist
     *
     * @param boolean $inWishlist
     *
     * @return UserApp
     */
    public function setInWishlist($inWishlist)
    {
        $this->in_wishlist = $inWishlist;

        return $this;
    }

    /**
     * Get inWishlist
     *
     * @return boolean
     */
    public function getInWishlist()
    {
        return $this->in_wishlist;
    }

    /**
     * Set isLiked
     *
     * @param boolean $isLiked
     *
     * @return UserApp
     */
    public function setIsLiked($isLiked)
    {
        $this->is_liked = $isLiked;

        return $this;
    }

    /**
     * Get isLiked
     *
     * @return boolean
     */
    public function getIsLiked()
    {
        return $this->is_liked;
    }

    /**
     * Set isDisliked
     *
     * @param boolean $isDisliked
     *
     * @return UserApp
     */
    public function setIsDisliked($isDisliked)
    {
        $this->is_disliked = $isDisliked;

        return $this;
    }

    /**
     * Get isDisliked
     *
     * @return boolean
     */
    public function getIsDisliked()
    {
        return $this->is_disliked;
    }

    /**
     * Set user
     *
     * @param \VRPlayAdminBundle\Entity\User $user
     *
     * @return UserApp
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
     * @return UserApp
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
}
