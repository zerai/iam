<?php

declare(strict_types=1);

namespace OpenDaje\IdentityAccess\Tests\Domain\Model\Identity;

use OpenDaje\IdentityAccess\Domain\Model\Identity\EmailAddress;
use PHPUnit\Framework\TestCase;

/**
 * @group unit
 */
class EmailAddressTest extends TestCase
{
    private const FIRST_EMAIL   = 'first@example.com';
    private const SECOND_EMAIL  = 'first@example.com'; // EQUAL TO THE FIRST
    private const THIRD_EMAIL   = 'third@example.com';

    /** @test */
    public function it_can_create_EmailAddress_from_string()
    {
        $email = EmailAddress::fromString(self::FIRST_EMAIL);

        $this->assertInstanceOf(EmailAddress::class, $email);
        $this->assertNotEmpty($email->toString());
        $this->assertSame(self::FIRST_EMAIL, $email->toString());
        $this->assertSame(self::FIRST_EMAIL, $email->__toString());
        $this->assertSame(self::FIRST_EMAIL, $email->email());
    }

    /** @test */
    public function it_can_return_new_VO_when_modify_email()
    {
        $email = EmailAddress::fromString(self::FIRST_EMAIL);

        $newEmail = $email->withEmail(self::THIRD_EMAIL);

        $this->assertInstanceOf(EmailAddress::class, $newEmail);
    }

    /**
     * @test
     * @depends  it_can_create_EmailAddress_from_string
     */
    public function it_can_be_compared()
    {
        $first = EmailAddress::fromString(self::FIRST_EMAIL);
        $second = EmailAddress::fromString(self::SECOND_EMAIL);
        $third = EmailAddress::fromString(self::THIRD_EMAIL);

        $this->assertTrue($first->equals($second));
        $this->assertFalse($first->equals($third));
        $this->assertFalse($third->equals($second));
    }
}
