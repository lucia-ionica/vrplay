<?php 

namespace VRPlayAdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="platforms")
 * @ORM\Entity(repositoryClass="PlatformRepository")
 */
class Platform
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
     * @ORM\OneToMany(targetEntity="AppVersion", mappedBy="platform")
     */
    protected $app_versions;

    /**
     * @ORM\OneToMany(targetEntity="OperatingSystem", mappedBy="platform")
     */
    protected $operating_systems;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->app_versions = new \Doctrine\Common\Collections\ArrayCollection();
        $this->operating_systems = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set name
     *
     * @param string $name
     *
     * @return Platform
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
     * Add appVersion
     *
     * @param \VRPlayAdminBundle\Entity\AppVersion $appVersion
     *
     * @return Platform
     */
    public function addAppVersion(\VRPlayAdminBundle\Entity\AppVersion $appVersion)
    {
        $this->app_versions[] = $appVersion;

        return $this;
    }

    /**
     * Remove appVersion
     *
     * @param \VRPlayAdminBundle\Entity\AppVersion $appVersion
     */
    public function removeAppVersion(\VRPlayAdminBundle\Entity\AppVersion $appVersion)
    {
        $this->app_versions->removeElement($appVersion);
    }

    /**
     * Get appVersions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAppVersions()
    {
        return $this->app_versions;
    }

    /**
     * Add operatingSystem
     *
     * @param \VRPlayAdminBundle\Entity\OperatingSystem $operatingSystem
     *
     * @return Platform
     */
    public function addOperatingSystem(\VRPlayAdminBundle\Entity\OperatingSystem $operatingSystem)
    {
        $this->operating_systems[] = $operatingSystem;

        return $this;
    }

    /**
     * Remove operatingSystem
     *
     * @param \VRPlayAdminBundle\Entity\OperatingSystem $operatingSystem
     */
    public function removeOperatingSystem(\VRPlayAdminBundle\Entity\OperatingSystem $operatingSystem)
    {
        $this->operating_systems->removeElement($operatingSystem);
    }

    /**
     * Get operatingSystems
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOperatingSystems()
    {
        return $this->operating_systems;
    }
}
