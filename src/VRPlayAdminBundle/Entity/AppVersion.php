<?php 

namespace VRPlayAdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="apps_versions")
 * @ORM\Entity(repositoryClass="AppVersionRepository")
 */
class AppVersion
{
  /**
   * @ORM\Column(type="guid")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="UUID")
   */
  protected $id;

  /**
   * @ORM\Column(type="string", length=255, unique=true, nullable=false)
   * @Assert\NotBlank
   * @Assert\NotNull
   */
  protected $version_file;

  /**
   * @ORM\ManyToOne(targetEntity="App", inversedBy="app_versions")
   * @ORM\JoinColumn(name="app_id", referencedColumnName="id")
   */
  protected $app;

  /**
   * @ORM\ManyToOne(targetEntity="Platform", inversedBy="app_versions")
   * @ORM\JoinColumn(name="platform_id", referencedColumnName="id")
   */
  protected $platform;

  /**
   * @ORM\ManyToOne(targetEntity="OperatingSystem", inversedBy="app_versions")
   * @ORM\JoinColumn(name="platform_id", referencedColumnName="id")
   */
  protected $oprating_system;

  /**
   * @ORM\ManyToOne(targetEntity="Status", inversedBy="app_version_statuses")
   * @ORM\JoinColumn(name="status_id", referencedColumnName="id")
   */
  protected $status;


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
     * Set versionFile
     *
     * @param string $versionFile
     *
     * @return AppVersion
     */
    public function setVersionFile($versionFile)
    {
        $this->version_file = $versionFile;

        return $this;
    }

    /**
     * Get versionFile
     *
     * @return string
     */
    public function getVersionFile()
    {
        return $this->version_file;
    }

    /**
     * Set app
     *
     * @param \VRPlayAdminBundle\Entity\App $app
     *
     * @return AppVersion
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
     * Set platform
     *
     * @param \VRPlayAdminBundle\Entity\Platform $platform
     *
     * @return AppVersion
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

    /**
     * Set opratingSystem
     *
     * @param \VRPlayAdminBundle\Entity\OperatingSystem $opratingSystem
     *
     * @return AppVersion
     */
    public function setOpratingSystem(\VRPlayAdminBundle\Entity\OperatingSystem $opratingSystem = null)
    {
        $this->oprating_system = $opratingSystem;

        return $this;
    }

    /**
     * Get opratingSystem
     *
     * @return \VRPlayAdminBundle\Entity\OperatingSystem
     */
    public function getOpratingSystem()
    {
        return $this->oprating_system;
    }

    /**
     * Set status
     *
     * @param \VRPlayAdminBundle\Entity\Status $status
     *
     * @return AppVersion
     */
    public function setStatus(\VRPlayAdminBundle\Entity\Status $status = null)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return \VRPlayAdminBundle\Entity\Status
     */
    public function getStatus()
    {
        return $this->status;
    }
}
