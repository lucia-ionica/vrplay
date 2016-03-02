<?php 

namespace VRPlayAdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="flags")
 * @ORM\Entity(repositoryClass="FlagRepository")
 */
class Flag
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
     * @ORM\OneToMany(targetEntity="UserFlaggedComment", mappedBy="flag")
     */
    protected $user_flagged_comments;

    /**
     * @ORM\OneToMany(targetEntity="UserFlaggedApp", mappedBy="flag")
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
     * @return Flag
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
     * Constructor
     */
    public function __construct()
    {
        $this->flagged_comments = new \Doctrine\Common\Collections\ArrayCollection();
        $this->flagged_apps = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add flaggedComment
     *
     * @param \VRPlayAdminBundle\Entity\Comment $flaggedComment
     *
     * @return Flag
     */
    public function addFlaggedComment(\VRPlayAdminBundle\Entity\Comment $flaggedComment)
    {
        $this->flagged_comments[] = $flaggedComment;

        return $this;
    }

    /**
     * Remove flaggedComment
     *
     * @param \VRPlayAdminBundle\Entity\Comment $flaggedComment
     */
    public function removeFlaggedComment(\VRPlayAdminBundle\Entity\Comment $flaggedComment)
    {
        $this->flagged_comments->removeElement($flaggedComment);
    }

    /**
     * Get flaggedComments
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFlaggedComments()
    {
        return $this->flagged_comments;
    }

    /**
     * Add flaggedApp
     *
     * @param \VRPlayAdminBundle\Entity\App $flaggedApp
     *
     * @return Flag
     */
    public function addFlaggedApp(\VRPlayAdminBundle\Entity\App $flaggedApp)
    {
        $this->flagged_apps[] = $flaggedApp;

        return $this;
    }

    /**
     * Remove flaggedApp
     *
     * @param \VRPlayAdminBundle\Entity\App $flaggedApp
     */
    public function removeFlaggedApp(\VRPlayAdminBundle\Entity\App $flaggedApp)
    {
        $this->flagged_apps->removeElement($flaggedApp);
    }

    /**
     * Get flaggedApps
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFlaggedApps()
    {
        return $this->flagged_apps;
    }
}
