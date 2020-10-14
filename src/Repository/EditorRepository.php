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
# - Created      : 2020-10-13 06:27:09
# - project name :
# - Directory    : /Users/shooterdev/Projet/ShooterDev/LAB/PHP/mangatheque_api/src/Repository
# - Name         : EditorRepository
# - File name    : EditorRepository.py
# - Type         : class (EditorRepository)
# - Namespace    :
########################################################################################################################

namespace App\Repository;

use App\Entity\Editor;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * Class EditorRepository
 * @package App\Repository
 */
class EditorRepository extends ServiceEntityRepository
{
    /**
     * @inheritDoc
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Editor::class);
    }
}
