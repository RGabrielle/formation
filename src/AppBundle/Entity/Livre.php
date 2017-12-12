<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * livre
 *
 * @ORM\Table(name="livre")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\LivreRepository")
 */
class Livre
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
         * @var string
         *
         * @ORM\Column(name="name", type="string", length=20)
         */
        private $name;
     /**
         * @var string
         *
         * @ORM\Column(name="auteur", type="string", length=20)
         */
        private $auteur;

         /**
         * @var int
         *
         * @ORM\Column(name="Annee_publication", type="integer")
         */
        private $Annee_publication;

 /**
         * @var string
         *
         * @ORM\Column(name="description", type="string", length=20)
         */
        private $description;


    /**
     * 
     * 
     * @var string
     * @ORM\Column(name="slug",type="string",length=30, unique=true)
     */

    private $slug;


    /**
     * Many Users have Many Groups.
     * @ORM\ManyToMany(targetEntity="Categorie")
     * @ORM\JoinTable(name="livre_categorie",
     *      joinColumns={@ORM\JoinColumn(name="livre_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="categorie_id", referencedColumnName="id")}
     *      )
     */
    private $categorie;



        /**
         * Get id
         *
         * @return int
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
     * Constructor
     */
    public function __construct()
    {
        $this->categorie = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Remove categorie
     *
     * @param \AppBundle\Entity\categorie $categorie
     */
    public function removecategorie(\AppBundle\Entity\Categorie $categorie)
    {
        $this->categorie->removeElement($categorie);
    }

    /**
     * Get categorie
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getcategorie()
    {
        return $this->categorie;
    }
    

    /**
     * Set slug
     *
     * @param string $slug
     *
     * @return Livre
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set auteur
     *
     * @param string $auteur
     *
     * @return Livre
     */
    public function setAuteur($auteur)
    {
        $this->auteur = $auteur;

        return $this;
    }

    /**
     * Get auteur
     *
     * @return string
     */
    public function getAuteur()
    {
        return $this->auteur;
    }

    /**
     * Set anneePublication
     *
     * @param \int $anneePublication
     *
     * @return Livre
     */
    public function setAnneePublication($anneePublication)
    {
        $this->Annee_publication = $anneePublication;

        return $this;
    }

    /**
     * Get anneePublication
     *
     * @return \int
     */
    public function getAnneePublication()
    {
        return $this->Annee_publication;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Livre
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Add categorie
     *
     * @param \AppBundle\Entity\Categorie $categorie
     *
     * @return Livre
     */
    public function addCategorie(\AppBundle\Entity\Categorie $categorie)
    {
        $this->categorie[] = $categorie;

        return $this;
    }
}
