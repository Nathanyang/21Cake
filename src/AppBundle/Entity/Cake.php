<?php
/**
 * Created by PhpStorm.
 * User: NathanY
 * Date: 2015/3/7
 * Time: 14:16
 */
namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Cake
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CakeRepository")
 * @ORM\Table(name="cake")
 */
class Cake {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @ORM\Column(type="string", length=45, nullable=false)
     */
    protected $name;
    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $remind;
    /**
     * @ORM\Column(type="string")
     */
    protected $profile_en;
    /**
     * @ORM\Column(type="string")
     */
    protected $profile_cn;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Cake
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
     * Set remind
     *
     * @param string $remind
     * @return Cake
     */
    public function setRemind($remind)
    {
        $this->remind = $remind;

        return $this;
    }

    /**
     * Get remind
     *
     * @return string 
     */
    public function getRemind()
    {
        return $this->remind;
    }

    /**
     * Set profile_en
     *
     * @param string $profileEn
     * @return Cake
     */
    public function setProfileEn($profileEn)
    {
        $this->profile_en = $profileEn;

        return $this;
    }

    /**
     * Get profile_en
     *
     * @return string 
     */
    public function getProfileEn()
    {
        return $this->profile_en;
    }

    /**
     * Set profile_cn
     *
     * @param string $profileCn
     * @return Cake
     */
    public function setProfileCn($profileCn)
    {
        $this->profile_cn = $profileCn;

        return $this;
    }

    /**
     * Get profile_cn
     *
     * @return string 
     */
    public function getProfileCn()
    {
        return $this->profile_cn;
    }
}
