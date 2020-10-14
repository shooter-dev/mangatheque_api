<?php

#   _____ __   __ ____   ____ _______ ______ _____        *
#  / ____| |  | |/ __ \ / __ \__   __|  ____|  __ \      **
# | (___ | |__| | |  | | |  | | | |  | |__  | |__) |    ***
#  \___ \|  __  | |  | | |  | | | |  |  __| |  _  /    ****
#  ____) | |  | | |__| | |__| | | |  | |____| | \ \   *****
# /_____/|_|  |_|\____/ \____/  |_|  |______|_|  \_\ ******
#                                          ***************************
#                                            ***********************
#                                              ****************_____  ________      __
#                                               *****    **** |  __ \|  ____\ \    / /
#                                              ***        *** | |  | | |__   \ \  / /
#                                             **           ** | |  | |  __|   \ \/ /
#                                            *              * | |__| | |____   \  /
#                                                             |_____/|______|   \/
# - Author       : shooterdev
# - Created      : 2020-10-13 06:22:50
# - project name :
# - Directory    : /Users/shooterdev/Projet/ShooterDev/LAB/PHP/mangatheque_api/src/Entity
# - Name         : Editor
# - File name    : Editor.py
# - Type         : class (Editor)
# - Namespace    :
########################################################################################################################

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Editor
 * @package App\Entity
 * @ORM\Entity()
 */
class Editor
{
    /**
     * @var int|null
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups("get")
     */
    public ?int $id = null;
    /**
     * @var string
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank
     * @Assert\Length(max=50)
     * @Groups("get")
     */
    private string $name = "";
    /**
     * @var string
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank
     * @Assert\Length(min=5,max=50)
     * @Groups("get")
     */
    private string $cover = "";

    public function __construct()
    {
    }
    /**
     * @param string $name
     * @param string $cover
     * @return static
     */
    public static function CREATE(string $name, string $cover): self
    {
        $editor = new self();
        $editor->name = $name;
        $editor->cover = $cover;
        return $editor;
    }

   /*
    |--------------------------------------------------------------------------|
    | Getter and Setter                                                        |
    |--------------------------------------------------------------------------|
    |
    */

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getCover(): string
    {
        return $this->cover;
    }

    /**
     * @param string $cover
     */
    public function setCover(string $cover): void
    {
        $this->cover = $cover;
    }
}
