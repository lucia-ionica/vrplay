<?php 

namespace VRPlayAdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="comments")
 * @ORM\Entity(repositoryClass="CommentRepository")
 */
class Comment
{
  /**
   * @ORM\Column(type="guid")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="UUID")
   */
  protected $id;

  /**
   * @ORM\Column(type="text", length=3000)
   */
  protected $message;

  /**
   * @ORM\ManyToOne(targetEntity="User", inversedBy="comments")
   * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
   */
  protected $user;

  /**
   * @ORM\ManyToOne(targetEntity="Store", inversedBy="comments")
   * @ORM\JoinColumn(name="store_id", referencedColumnName="id")
   */
  protected $store;

  /**
   * @ORM\ManyToOne(targetEntity="App", inversedBy="comments")
   * @ORM\JoinColumn(name="app_id", referencedColumnName="id")
   */
  protected $app;


    /**
     * @ORM\OneToMany(targetEntity="Comment", mappedBy="parent")
     */
    private $reply;

    /**
     * @ORM\ManyToOne(targetEntity="Comment", inversedBy="reply")
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id")
     */
    private $parent;

    /**
     * @ORM\OneToMany(targetEntity="UserFlaggedComment", mappedBy="comment")
     */
    private $user_flagged_comments;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->flags = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set message
     *
     * @param string $message
     *
     * @return Comment
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set user
     *
     * @param \VRPlayAdminBundle\Entity\User $user
     *
     * @return Comment
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
     * Set store
     *
     * @param \VRPlayAdminBundle\Entity\Store $store
     *
     * @return Comment
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
     * Add flag
     *
     * @param \VRPlayAdminBundle\Entity\Flag $flag
     *
     * @return Comment
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
     * Set app
     *
     * @param \VRPlayAdminBundle\Entity\App $app
     *
     * @return Comment
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
     * Add reply
     *
     * @param \VRPlayAdminBundle\Entity\Comment $reply
     *
     * @return Comment
     */
    public function addReply(\VRPlayAdminBundle\Entity\Comment $reply)
    {
        $this->reply[] = $reply;

        return $this;
    }

    /**
     * Remove reply
     *
     * @param \VRPlayAdminBundle\Entity\Comment $reply
     */
    public function removeReply(\VRPlayAdminBundle\Entity\Comment $reply)
    {
        $this->reply->removeElement($reply);
    }

    /**
     * Get reply
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getReply()
    {
        return $this->reply;
    }

    /**
     * Set parent
     *
     * @param \VRPlayAdminBundle\Entity\Comment $parent
     *
     * @return Comment
     */
    public function setParent(\VRPlayAdminBundle\Entity\Comment $parent = null)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent
     *
     * @return \VRPlayAdminBundle\Entity\Comment
     */
    public function getParent()
    {
        return $this->parent;
    }
}
