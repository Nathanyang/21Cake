<?php
/**
 * Created by PhpStorm.
 * User: NathanY
 * Date: 2015/3/7
 * Time: 15:18
 */

namespace NathanCakeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class RawMaterial
 * @ORM\Entity(repositoryClass="NathanCakeBundle\Repository\RawMaterialRepository")
 * @ORM\Table(name="rawmaterial")
 */
class RawMaterial {
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
