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

}
