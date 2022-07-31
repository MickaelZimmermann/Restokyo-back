<?php

namespace App\Entity;

use DateTime;
use App\Entity\District;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use App\Repository\EstablishmentRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=EstablishmentRepository::class)
 * 
 * @ORM\HasLifecycleCallbacks()
 * @UniqueEntity(fields={"name"})
 * 
 */
class Establishment
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"establishments_get_list", "establishments_get_validated", "districts_get_establishments", "establishment_get_data", "tags_get_establishments", "tag_get_data"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     * @Groups({"establishments_get_list", "establishments_get_validated", "districts_get_establishments", "establishment_get_data", "tags_get_establishments", "tags_get_list"})
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"establishments_get_list", "establishments_get_validated", "districts_get_establishments", "establishment_get_data", "tags_get_establishments", "tags_get_list"})
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=100)
     * @Groups({"establishments_get_list", "establishments_get_validated", "establishment_get_data", "tags_get_list"})
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=200)
     * @Groups({"establishments_get_list", "establishments_get_validated", "establishment_get_data", "tags_get_list"})
     */
    private $address;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Groups({"establishments_get_list", "establishments_get_validated", "establishment_get_data", "tags_get_establishments", "tags_get_list"})
     */
    private $price;

    /**
     * Used to put in front form to let the user enter datas about the etablishment he proposes (website, price, phone, etc.)
     * 
     * @ORM\Column(type="text", nullable=true)
     * @Groups({"establishments_get_list", "establishment_get_data", "tags_get_establishments"})
     */
    private $useful_info;

    // /**
    //  * @ORM\Column(type="text", nullable=true)
    //  * @Groups({"establishments_get_list", "establishment_get_data", "tags_get_establishments"})
    //  */
    // private $noon_opening_time;

    // /**
    //  * @ORM\Column(type="text", nullable=true)
    //  * @Groups({"establishments_get_list", "establishment_get_data", "tags_get_establishments"})
    //  */
    // private $evening_opening_time;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"establishments_get_list", "establishments_get_validated", "establishment_get_data"})
     */
    private $website;

    /**
     * @ORM\Column(type="bigint", length=14, nullable=true)
     * @Groups({"establishments_get_list", "establishments_get_validated", "establishment_get_data"})
     */
    private $phone;

    /**
     * @ORM\Column(type="decimal", precision=3, scale=1, nullable=true)
     * @Groups({"establishments_get_list", "establishments_get_validated", "establishment_get_data", "tags_get_establishments", "tags_get_list"})
     */
    private $rating;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"establishments_get_list", "establishments_get_validated", "establishment_get_data", "tags_get_establishments", "tags_get_list"})
     */
    private $slug;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"establishments_get_list", "establishments_get_validated", "establishment_get_data", "tags_get_establishments", "tags_get_list"})
     */
    private $picture;

    /**
     * @ORM\OneToMany(targetEntity=Comment::class, mappedBy="establishment", orphanRemoval=true)
     * @Groups({"establishments_get_validated"})
     */
    private $comments;

    /**
     * @ORM\ManyToOne(targetEntity=District::class, inversedBy="establishments")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"establishments_get_list", "establishments_get_validated", "establishment_get_data", "tags_get_establishments", "tags_get_list"})

     */
    private $district;

    /**
     * @ORM\ManyToMany(targetEntity=Tag::class, inversedBy="establishments")
     * @Groups({"establishments_get_list", "establishments_get_validated", "establishment_get_data"})
     */
    private $tags;

    /**
     *
     * Used to set a validation status on each establishment
     * If 0 = not validated, if 1 = validated (so shown on page)
     * @Groups({"establishments_get_list", "establishment_get_data", "tags_get_establishments", "establishments_get_validated", "tags_get_list"})
     * 
     * @ORM\Column(name="status", type="integer")
     * @ORM\OrderBy({"updatedAt" = "DESC"})
     */
    private $status;

    /**
     * @ORM\Column(type="string", length=200, nullable=true)
     * @Groups({"establishments_get_list", "establishments_get_validated", "establishment_get_data"})
     */
    private $openingTime;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Groups({"establishments_get_validated", "establishment_get_data"})
     */
    private $updatedAt;

    /**
     * @ORM\OneToMany(targetEntity=Picture::class, mappedBy="establishment")
     * @Groups({"establishment_get_data"})
     */
    private $pictures;

    /**
     * @ORM\ManyToMany(targetEntity=User::class, inversedBy="establishments")
     */
    private $users;


    public function __construct()
    {
        $this->comments = new ArrayCollection();
        $this->tags = new ArrayCollection(); //https://symfony.com/doc/current/components/serializer.html#usage
        $this->status = 0;
        $this->pictures = new ArrayCollection();
        $this->users = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function __toString()
    {
        return $this->name;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(?int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getUsefulInfo(): ?string
    {
        return $this->useful_info;
    }

    public function setUsefulInfo(?string $useful_info): self
    {
        $this->useful_info = $useful_info;

        return $this;
    }

    public function getWebsite(): ?string
    {
        return $this->website;
    }

    public function setWebsite(?string $website): self
    {
        $this->website = $website;

        return $this;
    }

    public function getPhone(): ?int
    {
        return $this->phone;
    }

    public function setPhone(?int $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getRating(): ?string
    {
        return $this->rating;
    }

    public function setRating(?string $rating): self
    {
        $this->rating = $rating;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(?string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(?string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    /**

     * @return Collection<int, Comment>
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function addComment(Comment $comment): self
    {
        if (!$this->comments->contains($comment)) {
            $this->comments[] = $comment;
            $comment->setEstablishment($this);
        }

        return $this;
    }

    public function removeComment(Comment $comment): self
    {
        if ($this->comments->removeElement($comment)) {
            // set the owning side to null (unless already changed)
            if ($comment->getEstablishment() === $this) {
                $comment->setEstablishment(null);
            }
        }

        return $this;
    }

    public function getDistrict(): ?District
    {
        return $this->district;
    }

    /**
     * Set the value of district
     *
     * @return  self
     */ 
    public function setDistrict(?District $district): self

    {
        $this->district = $district;

        return $this;
    }

    /**
     * @return Collection<int, Tag>
     */
    public function getTags(): Collection
    {
        return $this->tags;
    }

    public function addTag(Tag $tag): self
    {
        if (!$this->tags->contains($tag)) {
            $this->tags[] = $tag;
            $tag->addEstablishment($this);
        }

        return $this;
    }

    public function removeTag(Tag $tag): self
    {
        if ($this->tags->removeElement($tag)) {
            $tag->removeEstablishment($this);
        }

        return $this;
    }

    /**
     * Get the value of status
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */ 
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of openingTime
     */ 
    public function getOpeningTime()
    {
        return $this->openingTime;
    }

    /**
     * Set the value of openingTime
     *
     * @return  self
     */ 
    public function setOpeningTime($openingTime)
    {
        $this->openingTime = $openingTime;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @ORM\PreUpdate
     */
    public function setUpdatedAtValue()
    {
        // Date courante
        //$this->updatedAt = new DateTime();
    }

    /**
     * @return Collection<int, Picture>
     */
    public function getPictures(): Collection
    {
        return $this->pictures;
    }

    public function addPicture(Picture $picture): self
    {
        if (!$this->pictures->contains($picture)) {
            $this->pictures[] = $picture;
            $picture->setEstablishment($this);
        }

        return $this;
    }

    public function removePicture(Picture $picture): self
    {
        if ($this->pictures->removeElement($picture)) {
            // set the owning side to null (unless already changed)
            if ($picture->getEstablishment() === $this) {
                $picture->setEstablishment(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        $this->users->removeElement($user);

        return $this;
    }
}
