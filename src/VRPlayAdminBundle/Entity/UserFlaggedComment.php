<?php 

namespace VRPlayAdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="user_flagged_comments")
 * @ORM\Entity(repositoryClass="UserFlaggedCommentRepository")
 */
class UserFlaggedComment
{
  /**
   * @ORM\Column(type="guid")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="UUID")
   */
  protected $id;

  /**
   * @ORM\ManyToOne(targetEntity="User", inversedBy="user_flagged_comments")
   * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
   */
  protected $user;

  /**
   * @ORM\ManyToOne(targetEntity="Comment", inversedBy="user_flagged_comments")
   * @ORM\JoinColumn(name="app_id", referencedColumnName="id")
   */
  protected $comment;

  /**
   * @ORM\ManyToOne(targetEntity="Flag", inversedBy="user_flagged_comments")
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
     * @return UserFlaggedComment
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
     * Set comment
     *
     * @param \VRPlayAdminBundle\Entity\Comment $comment
     *
     * @return UserFlaggedComment
     */
    public function setComment(\VRPlayAdminBundle\Entity\Comment $comment = null)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return \VRPlayAdminBundle\Entity\Comment
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set flag
     *
     * @param \VRPlayAdminBundle\Entity\Flag $flag
     *
     * @return UserFlaggedComment
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
