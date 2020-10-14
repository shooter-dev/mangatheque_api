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
# - Created      : 2020-10-13 06:23:20
# - project name :
# - Directory    : /Users/shooterdev/Projet/ShooterDev/LAB/PHP/mangatheque_api/src/DataFixtures
# - Name         : EditorFixtures
# - File name    : EditorFixtures.py
# - Type         : class (EditorFixtures)
# - Namespace    :
########################################################################################################################

namespace App\DataFixtures;

use App\Entity\Editor;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

/**
 *
 */
class EditorFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i <= 19; $i++) {
            $editor = Editor::CREATE(
                sprintf("editor-%d", $i),
                "cover.png"
            );

            $manager->persist($editor);
        }

        $manager->flush();
    }
}
