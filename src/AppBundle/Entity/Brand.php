<?php
/**
 * Created by PhpStorm.
 * User: NathanY
 * Date: 2015/3/7
 * Time: 15:02
 */

namespace NathanCakeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Brand
 * @ORM\Entity(repositoryClass="NathanCakeBundle\Repository\BrandRepository")
 * @ORM\Table(name="brand")
 */
class Brand {
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
     * @ORM\Column(type="string", length=10)
     */
    protected $name;
}
