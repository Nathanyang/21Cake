<?php
/**
 * Created by PhpStorm.
 * User: NathanY
 * Date: 2015/3/7
 * Time: 14:30
 */

namespace NathanCakeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * Class Type
 * @ORM\Entity(repositoryClass="NathanCakeBundle\Repository\TypeRepository")
 * @ORM\Table(name="type")
 */
class Type {
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
     * @ORM\Column(type="string", length=80)
     */
    protected $name;
}
