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
# - Created      : 14/10/2020
# - PROJECT_NAME : mangatheque_api
# - Directory    :
# - NAME         : ApiEditorTest
# - FILE_NAME    : ApiEditorTest.php
# - Type         : Class (ApiEditorTest)
# - Namespace    : App\Tests;


namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RouterInterface;

class ApiEditorTest extends WebTestCase
{
    public function testSuccessEditorCollection()
    {
        $client = self::createClient();

        /** @var RouterInterface $router */
        $router = $client->getContainer()->get("router");

        $client->request('GET', $router->generate("api_editors_collection"), []);

        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
    }

    public function testSuccessEditorItem()
    {
        $client = self::createClient();

        /** @var RouterInterface $router */
        $router = $client->getContainer()->get("router");

        $client->request('GET', $router->generate("api_editor_item", [
            "id" => 4
        ]), []);

        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
    }

    public function testSuccessEditorCreate()
    {
        $client = self::createClient();

        /** @var RouterInterface $router */
        $router = $client->getContainer()->get("router");

        $response = $client->request(
            'POST',
            $router->generate("api_editor_created"),
            [],
            [],
            [],
            json_encode([
                'name' => "editor",
                'cover' => "cover.png"
            ])
        );
        $this->assertResponseStatusCodeSame(Response::HTTP_CREATED);
    }

    public function testSuccessEditorUpdate()
    {
        $client = self::createClient();

        /** @var RouterInterface $router */
        $router = $client->getContainer()->get("router");

        $response = $client->request('PUT', $router->generate("api_editor_update", [
            "id" => 5
        ]), [], [], [], json_encode([
            'name' => "new_editor",
            'cover' => "cover.png"
        ]));

        $this->assertResponseStatusCodeSame(Response::HTTP_NO_CONTENT);
    }

    public function testSuccessEditorDelete()
    {
        $client = self::createClient();

        /** @var RouterInterface $router */
        $router = $client->getContainer()->get("router");

        $client->request('DELETE', $router->generate("api_editor_delete", [
            "id" => 5
        ]), []);

        $this->assertResponseStatusCodeSame(Response::HTTP_NO_CONTENT);
    }
}
