<?php

namespace PandaShop\ShopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Favourites
 *
 * @ORM\Table(name="favourites")
 * @ORM\Entity(repositoryClass="PandaShop\ShopBundle\Repository\FavouritesRepository")
 */
class Favourites
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity="\PandaShop\UserBundle\Entity\User", inversedBy="favourites")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", onDelete="CASCADE")
     **/
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="Product", inversedBy="favourites")
     * @ORM\JoinColumn(name="product_id", referencedColumnName="id", onDelete="CASCADE")
     **/
    private $product;

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
     * Set date
     *
     * @param \DateTime $date
     * @return Favourites
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set product
     *
     * @param \PandaShop\ShopBundle\Entity\Product $product
     * @return Favourites
     */
    public function setProduct(\PandaShop\ShopBundle\Entity\Product $product = null)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get product
     *
     * @return \PandaShop\ShopBundle\Entity\Product 
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * Set user
     *
     * @param \PandaShop\UserBundle\Entity\User $user
     * @return Favourites
     */
    public function setUser(\PandaShop\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \PandaShop\UserBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
}
