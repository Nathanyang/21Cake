<?php
/**
 * Created by PhpStorm.
 * User: NathanY
 * Date: 2015/3/7
 * Time: 14:52
 */

namespace NathanCakeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Crowd
 * @ORM\Entity(repositoryClass="NathanCakeBundle\Repository\CrowdRepository")
 * @ORM\Table(name="crowd")
 */
class Crowd {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=10, unique=true)
     */
    protected $code;

    /**
     * @ORM\Column(type="string")
     */
    protected $name;
}
