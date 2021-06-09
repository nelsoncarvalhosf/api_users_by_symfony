<?php

namespace App\Tests\Controller;

use App\Entity\User;
use App\Tests\TestCase;
use Symfony\Component\HttpFoundation\Response;

class UpdateUserActionTest extends TestCase
{
    public function test_update_user(): void
    {
        $user = new User();
        $user->setFirstName('User');
        $user->setLastName('Test');
        $user->setEmail('user@test.com');
        $this->em->persist($user);
        $this->em->flush();

        
        $this->client->request(method: 'PUT', uri: '/users/1', content: json_encode([
            'firstName' => 'User2',
            'lastName' => 'Test',
            'email' => 'user2@test.com',
        ]));
        $statusCode = $this->client->getResponse()->getStatusCode();

        $this->assertSame(Response::HTTP_NO_CONTENT, $statusCode);
    }

    public function test_update_user_with_invalid_data(): void
    {
        $user = new User();
        $user->setFirstName('User');
        $user->setLastName('Test');
        $user->setEmail('user@teste.com');
        $this->em->persist($user);
        $this->em->flush();

        $this->client->request(method: 'PUT', uri: '/users/1', content: json_encode([
            'firstName' => 'User3',
            'lastName' => 'Test',
            'email' => 'user3@/test',
        ]));
        $statusCode = $this->client->getResponse()->getStatusCode();

        $this->assertSame(Response::HTTP_BAD_REQUEST, $statusCode);
    }

    public function test_update_user_with_invalid_user_id(): void
    {
        $user = new User();
        $user->setFirstName('USer');
        $user->setLastName('Test');
        $user->setEmail('user@test.com');
        $this->em->persist($user);
        $this->em->flush();

        $this->client->request(method: 'PUT', uri: '/users/999', content: json_encode([
            'firstName' => 'User2',
            'lastName' => 'Test',
        ]));
        $statusCode = $this->client->getResponse()->getStatusCode();

        $this->assertSame(Response::HTTP_NOT_FOUND, $statusCode);
    }
}
