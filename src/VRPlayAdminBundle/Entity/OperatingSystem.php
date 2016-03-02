<?php 

namespace VRPlayAdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="operating_systems")
 * @ORM\Entity(repositoryClass="OperatingSystemRepository")
 */
class OperatingSystem
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
     * @ORM\OneToMany(targetEntity="AppVersion", mappedBy="operating_system")
     */
    protected $app_versions;

  /**
   * @ORM\ManyToOne(targetEntity="Platform", inversedBy="operating_systems")
   * @ORM\JoinColumn(name="platform_id", referencedColumnName="id")
   */
  protected $platform;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->app_versions = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return OperatingSystem
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
     * @return OperatingSystem
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
     * Set platform
     *
     * @param \VRPlayAdminBundle\Entity\Platform $platform
     *
     * @return OperatingSystem
     */
    public function setPlatform(\VRPlayAdminBundle\Entity\Platform $platform = null)
    {
        $this->platform = $platform;

        return $this;
    }

    /**
     * Get platform
     *
     * @return \VRPlayAdminBundle\Entity\Platform
     */
    public function getPlatform()
    {
        return $this->platform;
    }
}
