<?php
/**
 * Created by PhpStorm.
 * User: NathanY
 * Date: 2015/3/7
 * Time: 14:16
 */
namespace NathanCakeBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Cake
 * @ORM\Entity(repositoryClass="NathanCakeBundle\Repository\CakeRepository")
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
}
