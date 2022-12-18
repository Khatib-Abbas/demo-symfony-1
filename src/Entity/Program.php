<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\ProgramRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;

#[ORM\Entity(repositoryClass: ProgramRepository::class)]
#[ApiResource]
class Program
{

    use TimestampableEntity;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $summary = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $duration = null;

    #[ORM\OneToMany(mappedBy: 'program', targetEntity: ProgramSchedule::class)]
    private Collection $programSchedules;

    #[ORM\ManyToOne(inversedBy: 'programs')]
    #[ORM\JoinColumn(nullable: false)]
    private ?ProgramType $programType = null;

    public function __construct()
    {
        $this->programSchedules = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getSummary(): ?string
    {
        return $this->summary;
    }

    public function setSummary(?string $summary): self
    {
        $this->summary = $summary;

        return $this;
    }

    public function getDuration(): ?int
    {
        return $this->duration;
    }

    public function setDuration(int $duration): self
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * @return Collection<int, ProgramSchedule>
     */
    public function getProgramSchedules(): Collection
    {
        return $this->programSchedules;
    }

    public function addProgramSchedule(ProgramSchedule $programSchedule): self
    {
        if (!$this->programSchedules->contains($programSchedule)) {
            $this->programSchedules->add($programSchedule);
            $programSchedule->setProgram($this);
        }

        return $this;
    }

    public function removeProgramSchedule(ProgramSchedule $programSchedule): self
    {
        if ($this->programSchedules->removeElement($programSchedule)) {
            // set the owning side to null (unless already changed)
            if ($programSchedule->getProgram() === $this) {
                $programSchedule->setProgram(null);
            }
        }

        return $this;
    }

    public function getProgramType(): ?ProgramType
    {
        return $this->programType;
    }

    public function setProgramType(?ProgramType $programType): self
    {
        $this->programType = $programType;

        return $this;
    }
}
