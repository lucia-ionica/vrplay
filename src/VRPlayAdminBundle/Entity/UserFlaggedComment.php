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

}
