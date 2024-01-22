<?php

namespace Models;

use App\Models\Social;
use PHPUnit\Framework\TestCase;

class SocialTest extends TestCase
{
    public function testHydrate()
    {
        // Mock data for testing
        $data = [
            'idUser1' => 1,
            'idUser2' => 2,
            'accepted' => 1,
        ];

        // Call the hydrate method
        $result = Social::hydrate($data);

        // Assert that the returned object is an instance of Social
        $this->assertInstanceOf(Social::class, $result);

        // Assert that the properties of the object are set correctly
        $this->assertEquals($data['idUser1'], $result->getIdUser1());
        $this->assertEquals($data['idUser2'], $result->getIdUser2());
        $this->assertEquals($data['accepted'], $result->getAccepted());
    }

    public function testDelete()
    {
        // Mock the Auth class or provide a test-friendly implementation
        $authMock = $this->createMock(Auth::class);

        // Replace Auth::getSessionUserId() with the expected user ID for testing
        $authMock->expects($this->any())
            ->method('getSessionUserId')
            ->willReturn(123); // Replace with the expected user ID

        // Create an instance of YourClass, injecting the mocked Auth class
        $yourClass = new YourClass($authMock, /* other dependencies if any */);

        // Set the necessary properties (e.g., $this->idUser1, $this->idUser2) in your instance
        $yourClass->setIdUser1(/* set the user ID */);
        $yourClass->setIdUser2(/* set the user ID */);

        // Test when $this->idUser1 == Auth::getSessionUserId()
        $result1 = $yourClass->delete();
        $this->assertEquals(/* expected result when $this->idUser1 == Auth::getSessionUserId() */, $result1);

        // Test when $this->idUser1 != Auth::getSessionUserId()
        $result2 = $yourClass->delete();
        $this->assertEquals(/* expected result when $this->idUser1 != Auth::getSessionUserId() */, $result2);
    }
}
