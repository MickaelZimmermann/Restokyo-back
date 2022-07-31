<?php

namespace App\Entity;

use App\Repository\OpeningTimeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=OpeningTimesRepository::class)
 */
class OpeningTime
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="decimal", precision=4, scale=2, nullable=true)
     * @Groups({"establishments_get_list", "establishment_get_data"})
     */
    private $mondayOpenNoon;

    /**
     * @ORM\Column(type="decimal", precision=4, scale=2, nullable=true)
     * @Groups({"establishments_get_list", "establishment_get_data"})
     */
    private $mondayCloseNoon;

    /**
     * @ORM\Column(type="decimal", precision=4, scale=2, nullable=true)
     * @Groups({"establishments_get_list", "establishment_get_data"})
     */
    private $mondayOpenEvening;

    /**
     * @ORM\Column(type="decimal", precision=4, scale=2, nullable=true)
     * @Groups({"establishments_get_list", "establishment_get_data"})
     */
    private $mondayCloseEvening;

    /**
     * @ORM\Column(type="decimal", precision=4, scale=2, nullable=true)
     * @Groups({"establishments_get_list", "establishment_get_data"})
     */
    private $tuesdayOpenNoon;

    /**
     * @ORM\Column(type="decimal", precision=4, scale=2, nullable=true)
     * @Groups({"establishments_get_list", "establishment_get_data"})
     */
    private $tuesdayCloseNoon;

    /**
     * @ORM\Column(type="decimal", precision=4, scale=2, nullable=true)
     * @Groups({"establishments_get_list", "establishment_get_data"})
     */
    private $tuesdayOpenEvening;

    /**
     * @ORM\Column(type="decimal", precision=4, scale=2, nullable=true)
     * @Groups({"establishments_get_list", "establishment_get_data"})
     */
    private $tuesdayCloseEvening;

    /**
     * @ORM\Column(type="decimal", precision=4, scale=2, nullable=true)
     * @Groups({"establishments_get_list", "establishment_get_data"})
     */
    private $wednesdayOpenNoon;

    /**
     * @ORM\Column(type="decimal", precision=4, scale=2, nullable=true)
     * @Groups({"establishments_get_list", "establishment_get_data"})
     */
    private $wednesdayCloseNoon;

    /**
     * @ORM\Column(type="decimal", precision=4, scale=2, nullable=true)
     * @Groups({"establishments_get_list", "establishment_get_data"})
     */
    private $wednesdayOpenEvening;

    /**
     * @ORM\Column(type="decimal", precision=4, scale=2, nullable=true)
     * @Groups({"establishments_get_list", "establishment_get_data"})
     */
    private $wednesdayCloseEvening;

    /**
     * @ORM\Column(type="decimal", precision=4, scale=2, nullable=true)
     * @Groups({"establishments_get_list", "establishment_get_data"})
     */
    private $thursdayOpenNoon;

    /**
     * @ORM\Column(type="decimal", precision=4, scale=2, nullable=true)
     * @Groups({"establishments_get_list", "establishment_get_data"})
     */
    private $thursdayCloseNoon;

    /**
     * @ORM\Column(type="decimal", precision=4, scale=2, nullable=true)
     * @Groups({"establishments_get_list", "establishment_get_data"})
     */
    private $thursdayOpenEvening;

    /**
     * @ORM\Column(type="decimal", precision=4, scale=2, nullable=true)
     * @Groups({"establishments_get_list", "establishment_get_data"})
     */
    private $thursdayCloseEvening;

    /**
     * @ORM\Column(type="decimal", precision=4, scale=2, nullable=true)
     * @Groups({"establishments_get_list", "establishment_get_data"})
     */
    private $fridayOpenNoon;

    /**
     * @ORM\Column(type="decimal", precision=4, scale=2, nullable=true)
     * @Groups({"establishments_get_list", "establishment_get_data"})
     */
    private $fridayCloseNoon;

    /**
     * @ORM\Column(type="decimal", precision=4, scale=2, nullable=true)
     * @Groups({"establishments_get_list", "establishment_get_data"})
     */
    private $fridayOpenEvening;

    /**
     * @ORM\Column(type="decimal", precision=4, scale=2, nullable=true)
     * @Groups({"establishments_get_list", "establishment_get_data"})
     */
    private $fridayCloseEvening;

    /**
     * @ORM\Column(type="decimal", precision=4, scale=2, nullable=true)
     * @Groups({"establishments_get_list", "establishment_get_data"})
     */
    private $saturdayOpenNoon;

    /**
     * @ORM\Column(type="decimal", precision=4, scale=2, nullable=true)
     * @Groups({"establishments_get_list", "establishment_get_data"})
     */
    private $saturdayCloseNoon;

    /**
     * @ORM\Column(type="decimal", precision=4, scale=2, nullable=true)
     * @Groups({"establishments_get_list", "establishment_get_data"})
     */
    private $saturdayOpenEvening;

    /**
     * @ORM\Column(type="decimal", precision=4, scale=2, nullable=true)
     * @Groups({"establishments_get_list", "establishment_get_data"})
     */
    private $saturdayCloseEvening;

    /**
     * @ORM\Column(type="decimal", precision=4, scale=2, nullable=true)
     * @Groups({"establishments_get_list", "establishment_get_data"})
     */
    private $sundayOpenNoon;

    /**
     * @ORM\Column(type="decimal", precision=4, scale=2, nullable=true)
     * @Groups({"establishments_get_list", "establishment_get_data"})
     */
    private $sundayCloseNoon;

    /**
     * @ORM\Column(type="decimal", precision=4, scale=2, nullable=true)
     * @Groups({"establishments_get_list", "establishment_get_data"})
     */
    private $sundayOpenEvening;

    /**
     * @ORM\Column(type="decimal", precision=4, scale=2, nullable=true)
     * @Groups({"establishments_get_list", "establishment_get_data"})
     */
    private $sundayCloseEvening;

    /**
     * @ORM\OneToMany(targetEntity=Establishment::class, mappedBy="openingTime")
     */
    private $establishments;

    public function __construct()
    {
        $this->establishments = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Get the value of mondayOpenNoon
     */ 
    public function getMondayOpenNoon()
    {
        return $this->mondayOpenNoon;
    }

    /**
     * Set the value of mondayOpenNoon
     *
     * @return  self
     */ 
    public function setMondayOpenNoon($mondayOpenNoon)
    {
        $this->mondayOpenNoon = $mondayOpenNoon;

        return $this;
    }

    /**
     * Get the value of mondayCloseNoon
     */ 
    public function getMondayCloseNoon()
    {
        return $this->mondayCloseNoon;
    }

    /**
     * Set the value of mondayCloseNoon
     *
     * @return  self
     */ 
    public function setMondayCloseNoon($mondayCloseNoon)
    {
        $this->mondayCloseNoon = $mondayCloseNoon;

        return $this;
    }

    /**
     * Get the value of mondayOpenEvening
     */ 
    public function getMondayOpenEvening()
    {
        return $this->mondayOpenEvening;
    }

    /**
     * Set the value of mondayOpenEvening
     *
     * @return  self
     */ 
    public function setMondayOpenEvening($mondayOpenEvening)
    {
        $this->mondayOpenEvening = $mondayOpenEvening;

        return $this;
    }

    /**
     * Get the value of mondayCloseEvening
     */ 
    public function getMondayCloseEvening()
    {
        return $this->mondayCloseEvening;
    }

    /**
     * Set the value of mondayCloseEvening
     *
     * @return  self
     */ 
    public function setMondayCloseEvening($mondayCloseEvening)
    {
        $this->mondayCloseEvening = $mondayCloseEvening;

        return $this;
    }

    /**
     * Get the value of tuesdayOpenNoon
     */ 
    public function getTuesdayOpenNoon()
    {
        return $this->tuesdayOpenNoon;
    }

    /**
     * Set the value of tuesdayOpenNoon
     *
     * @return  self
     */ 
    public function setTuesdayOpenNoon($tuesdayOpenNoon)
    {
        $this->tuesdayOpenNoon = $tuesdayOpenNoon;

        return $this;
    }

    /**
     * Get the value of tuesdayCloseNoon
     */ 
    public function getTuesdayCloseNoon()
    {
        return $this->tuesdayCloseNoon;
    }

    /**
     * Set the value of tuesdayCloseNoon
     *
     * @return  self
     */ 
    public function setTuesdayCloseNoon($tuesdayCloseNoon)
    {
        $this->tuesdayCloseNoon = $tuesdayCloseNoon;

        return $this;
    }

    /**
     * Get the value of tuesdayOpenEvening
     */ 
    public function getTuesdayOpenEvening()
    {
        return $this->tuesdayOpenEvening;
    }

    /**
     * Set the value of tuesdayOpenEvening
     *
     * @return  self
     */ 
    public function setTuesdayOpenEvening($tuesdayOpenEvening)
    {
        $this->tuesdayOpenEvening = $tuesdayOpenEvening;

        return $this;
    }

    /**
     * Get the value of tuesdayCloseEvening
     */ 
    public function getTuesdayCloseEvening()
    {
        return $this->tuesdayCloseEvening;
    }

    /**
     * Set the value of tuesdayCloseEvening
     *
     * @return  self
     */ 
    public function setTuesdayCloseEvening($tuesdayCloseEvening)
    {
        $this->tuesdayCloseEvening = $tuesdayCloseEvening;

        return $this;
    }

    /**
     * Get the value of wednesdayOpenNoon
     */ 
    public function getWednesdayOpenNoon()
    {
        return $this->wednesdayOpenNoon;
    }

    /**
     * Set the value of wednesdayOpenNoon
     *
     * @return  self
     */ 
    public function setWednesdayOpenNoon($wednesdayOpenNoon)
    {
        $this->wednesdayOpenNoon = $wednesdayOpenNoon;

        return $this;
    }

    /**
     * Get the value of wednesdayCloseNoon
     */ 
    public function getWednesdayCloseNoon()
    {
        return $this->wednesdayCloseNoon;
    }

    /**
     * Set the value of wednesdayCloseNoon
     *
     * @return  self
     */ 
    public function setWednesdayCloseNoon($wednesdayCloseNoon)
    {
        $this->wednesdayCloseNoon = $wednesdayCloseNoon;

        return $this;
    }

    /**
     * Get the value of wednesdayOpenEvening
     */ 
    public function getWednesdayOpenEvening()
    {
        return $this->wednesdayOpenEvening;
    }

    /**
     * Set the value of wednesdayOpenEvening
     *
     * @return  self
     */ 
    public function setWednesdayOpenEvening($wednesdayOpenEvening)
    {
        $this->wednesdayOpenEvening = $wednesdayOpenEvening;

        return $this;
    }

    /**
     * Get the value of wednesdayCloseEvening
     */ 
    public function getWednesdayCloseEvening()
    {
        return $this->wednesdayCloseEvening;
    }

    /**
     * Set the value of wednesdayCloseEvening
     *
     * @return  self
     */ 
    public function setWednesdayCloseEvening($wednesdayCloseEvening)
    {
        $this->wednesdayCloseEvening = $wednesdayCloseEvening;

        return $this;
    }

    /**
     * Get the value of thursdayOpenNoon
     */ 
    public function getThursdayOpenNoon()
    {
        return $this->thursdayOpenNoon;
    }

    /**
     * Set the value of thursdayOpenNoon
     *
     * @return  self
     */ 
    public function setThursdayOpenNoon($thursdayOpenNoon)
    {
        $this->thursdayOpenNoon = $thursdayOpenNoon;

        return $this;
    }

    /**
     * Get the value of thursdayCloseNoon
     */ 
    public function getThursdayCloseNoon()
    {
        return $this->thursdayCloseNoon;
    }

    /**
     * Set the value of thursdayCloseNoon
     *
     * @return  self
     */ 
    public function setThursdayCloseNoon($thursdayCloseNoon)
    {
        $this->thursdayCloseNoon = $thursdayCloseNoon;

        return $this;
    }

    /**
     * Get the value of thursdayOpenEvening
     */ 
    public function getThursdayOpenEvening()
    {
        return $this->thursdayOpenEvening;
    }

    /**
     * Set the value of thursdayOpenEvening
     *
     * @return  self
     */ 
    public function setThursdayOpenEvening($thursdayOpenEvening)
    {
        $this->thursdayOpenEvening = $thursdayOpenEvening;

        return $this;
    }

    /**
     * Get the value of thursdayCloseEvening
     */ 
    public function getThursdayCloseEvening()
    {
        return $this->thursdayCloseEvening;
    }

    /**
     * Set the value of thursdayCloseEvening
     *
     * @return  self
     */ 
    public function setThursdayCloseEvening($thursdayCloseEvening)
    {
        $this->thursdayCloseEvening = $thursdayCloseEvening;

        return $this;
    }

    /**
     * Get the value of fridayOpenNoon
     */ 
    public function getFridayOpenNoon()
    {
        return $this->fridayOpenNoon;
    }

    /**
     * Set the value of fridayOpenNoon
     *
     * @return  self
     */ 
    public function setFridayOpenNoon($fridayOpenNoon)
    {
        $this->fridayOpenNoon = $fridayOpenNoon;

        return $this;
    }

    /**
     * Get the value of fridayCloseNoon
     */ 
    public function getFridayCloseNoon()
    {
        return $this->fridayCloseNoon;
    }

    /**
     * Set the value of fridayCloseNoon
     *
     * @return  self
     */ 
    public function setFridayCloseNoon($fridayCloseNoon)
    {
        $this->fridayCloseNoon = $fridayCloseNoon;

        return $this;
    }

    /**
     * Get the value of fridayOpenEvening
     */ 
    public function getFridayOpenEvening()
    {
        return $this->fridayOpenEvening;
    }

    /**
     * Set the value of fridayOpenEvening
     *
     * @return  self
     */ 
    public function setFridayOpenEvening($fridayOpenEvening)
    {
        $this->fridayOpenEvening = $fridayOpenEvening;

        return $this;
    }

    /**
     * Get the value of fridayCloseEvening
     */ 
    public function getFridayCloseEvening()
    {
        return $this->fridayCloseEvening;
    }

    /**
     * Set the value of fridayCloseEvening
     *
     * @return  self
     */ 
    public function setFridayCloseEvening($fridayCloseEvening)
    {
        $this->fridayCloseEvening = $fridayCloseEvening;

        return $this;
    }

    /**
     * Get the value of saturdayOpenNoon
     */ 
    public function getSaturdayOpenNoon()
    {
        return $this->saturdayOpenNoon;
    }

    /**
     * Set the value of saturdayOpenNoon
     *
     * @return  self
     */ 
    public function setSaturdayOpenNoon($saturdayOpenNoon)
    {
        $this->saturdayOpenNoon = $saturdayOpenNoon;

        return $this;
    }

    /**
     * Get the value of saturdayCloseNoon
     */ 
    public function getSaturdayCloseNoon()
    {
        return $this->saturdayCloseNoon;
    }

    /**
     * Set the value of saturdayCloseNoon
     *
     * @return  self
     */ 
    public function setSaturdayCloseNoon($saturdayCloseNoon)
    {
        $this->saturdayCloseNoon = $saturdayCloseNoon;

        return $this;
    }

    /**
     * Get the value of saturdayOpenEvening
     */ 
    public function getSaturdayOpenEvening()
    {
        return $this->saturdayOpenEvening;
    }

    /**
     * Set the value of saturdayOpenEvening
     *
     * @return  self
     */ 
    public function setSaturdayOpenEvening($saturdayOpenEvening)
    {
        $this->saturdayOpenEvening = $saturdayOpenEvening;

        return $this;
    }

    /**
     * Get the value of saturdayCloseEvening
     */ 
    public function getSaturdayCloseEvening()
    {
        return $this->saturdayCloseEvening;
    }

    /**
     * Set the value of saturdayCloseEvening
     *
     * @return  self
     */ 
    public function setSaturdayCloseEvening($saturdayCloseEvening)
    {
        $this->saturdayCloseEvening = $saturdayCloseEvening;

        return $this;
    }

    /**
     * Get the value of sundayOpenNoon
     */ 
    public function getSundayOpenNoon()
    {
        return $this->sundayOpenNoon;
    }

    /**
     * Set the value of sundayOpenNoon
     *
     * @return  self
     */ 
    public function setSundayOpenNoon($sundayOpenNoon)
    {
        $this->sundayOpenNoon = $sundayOpenNoon;

        return $this;
    }

    /**
     * Get the value of sundayCloseNoon
     */ 
    public function getSundayCloseNoon()
    {
        return $this->sundayCloseNoon;
    }

    /**
     * Set the value of sundayCloseNoon
     *
     * @return  self
     */ 
    public function setSundayCloseNoon($sundayCloseNoon)
    {
        $this->sundayCloseNoon = $sundayCloseNoon;

        return $this;
    }

    /**
     * Get the value of sundayOpenEvening
     */ 
    public function getSundayOpenEvening()
    {
        return $this->sundayOpenEvening;
    }

    /**
     * Set the value of sundayOpenEvening
     *
     * @return  self
     */ 
    public function setSundayOpenEvening($sundayOpenEvening)
    {
        $this->sundayOpenEvening = $sundayOpenEvening;

        return $this;
    }

    /**
     * Get the value of sundayCloseEvening
     */ 
    public function getSundayCloseEvening()
    {
        return $this->sundayCloseEvening;
    }

    /**
     * Set the value of sundayCloseEvening
     *
     * @return  self
     */ 
    public function setSundayCloseEvening($sundayCloseEvening)
    {
        $this->sundayCloseEvening = $sundayCloseEvening;

        return $this;
    }

    /**
     * @return Collection<int, Establishment>
     */
    public function getEstablishments(): Collection
    {
        return $this->establishments;
    }

    public function addEstablishment(Establishment $establishment): self
    {
        if (!$this->establishments->contains($establishment)) {
            $this->establishments[] = $establishment;
            $establishment->setOpeningTime($this);
        }

        return $this;
    }

    public function removeEstablishment(Establishment $establishment): self
    {
        if ($this->establishments->removeElement($establishment)) {
            // set the owning side to null (unless already changed)
            if ($establishment->getOpeningTime() === $this) {
                $establishment->setOpeningTime(null);
            }
        }

        return $this;
    }
}
