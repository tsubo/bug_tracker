<?php
 
namespace AppBundle\Entity;
 
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
 
/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @var int
     */
    protected $id;
 
    /**
     * @ORM\Column(type="string")
     * @var string
     */
    protected $name;

    /**
     * @ORM\OneToMany(targetEntity="Bug", mappedBy="reporter")
     * @var Bug[]
     */
    protected $reportedBugs = null;
 
    /**
     * @ORM\OneToMany(targetEntity="Bug", mappedBy="engineer")
     * @var Bug[]
     */
    protected $assignedBugs = null;
     
     
    public function __construct()
    {
        $this->reportedBugs = new ArrayCollection();
        $this->assignedBugs = new ArrayCollection();
    }

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
     *
     * @return User
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
     * Add reportedBug
     *
     * @param \AppBundle\Entity\Bug $reportedBug
     *
     * @return User
     */
    public function addReportedBug(\AppBundle\Entity\Bug $reportedBug)
    {
        $this->reportedBugs[] = $reportedBug;

        return $this;
    }

    /**
     * Remove reportedBug
     *
     * @param \AppBundle\Entity\Bug $reportedBug
     */
    public function removeReportedBug(\AppBundle\Entity\Bug $reportedBug)
    {
        $this->reportedBugs->removeElement($reportedBug);
    }

    /**
     * Get reportedBugs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getReportedBugs()
    {
        return $this->reportedBugs;
    }

    /**
     * Add assignedBug
     *
     * @param \AppBundle\Entity\Bug $assignedBug
     *
     * @return User
     */
    public function addAssignedBug(\AppBundle\Entity\Bug $assignedBug)
    {
        $this->assignedBugs[] = $assignedBug;

        return $this;
    }

    /**
     * Remove assignedBug
     *
     * @param \AppBundle\Entity\Bug $assignedBug
     */
    public function removeAssignedBug(\AppBundle\Entity\Bug $assignedBug)
    {
        $this->assignedBugs->removeElement($assignedBug);
    }

    /**
     * Get assignedBugs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAssignedBugs()
    {
        return $this->assignedBugs;
    }
}
