<?php
/**
 * @copyright Macintoshplus (c) 2021
 * Added by : Macintoshplus at 01/09/2021 22:44
 */

declare(strict_types=1);

namespace App\Infra\Entity;

use App\Domain\DTO\TodoDto;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class DoctrineTodo implements TodoDto
{
    /**
     * @ORM\Column(type="string", length=50, nullable=false)
     * @ORM\Id()
     */
    private string $identifier;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private string $title;

    /**
     * @ORM\Column(type="boolean", nullable=false)
     */
    private bool $isDone = false;

    //Permet de l'utiliser plus tard dans les formulaires Symfony
    public function __construct(?string $identifier = null)
    {
        $this->identifier = $identifier ?? uniqid();
    }

    public function updateFromDomain(string $title, bool $isDone): void
    {
        $this->title = $title;
        $this->isDone = $isDone;
    }

    public function getIdentifier(): string
    {
        return $this->identifier;
    }

    public function setIdentifier(string $identifier): void
    {
        $this->identifier = $identifier;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function isDone(): bool
    {
        return $this->isDone;
    }

    public function setIsDone(bool $isDone): void
    {
        $this->isDone = $isDone;
    }


}
