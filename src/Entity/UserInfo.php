<?php
namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity(repositoryClass="App\Repository\UserInfoRepository")
 */
class UserInfo
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $fname;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $mname;
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lname;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $suffix;
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $gender;
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $civilStatus;
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $address;
    /**
     * @ORM\Column(type="date")
     */
    private $birthDate;
    public function getId()
    {
        return $this->id;
    }
    public function getFname(): ?string
    {
        return $this->fname;
    }
    public function setFname(string $fname): self
    {
        $this->fname = $fname;
        return $this;
    }
    public function getMname(): ?string
    {
        return $this->mname;
    }
    public function setMname(?string $mname): self
    {
        $this->mname = $mname;
        return $this;
    }
    public function getLname(): ?string
    {
        return $this->lname;
    }
    public function setLname(string $lname): self
    {
        $this->lname = $lname;
        return $this;
    }
    public function getSuffix(): ?string
    {
        return $this->suffix;
    }
    public function setSuffix(?string $suffix): self
    {
        $this->suffix = $suffix;
        return $this;
    }
    public function getGender(): ?string
    {
        return $this->gender;
    }
    public function setGender(string $gender): self
    {
        $this->gender = $gender;
        return $this;
    }
    public function getCivilStatus(): ?string
    {
        return $this->civilStatus;
    }
    public function setCivilStatus(string $civilStatus): self
    {
        $this->civilStatus = $civilStatus;
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
    public function getBirthDate(): ?\DateTimeInterface
    {
        return $this->birthDate;
    }
    public function setBirthDate(\DateTimeInterface $birthDate): self
    {
        $this->birthDate = $birthDate;
        return $this;
    }
}