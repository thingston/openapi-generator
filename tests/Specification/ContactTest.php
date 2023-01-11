<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Test\Specification;

use Thingston\OpenApi\Specification\Contact;
use Thingston\OpenApi\Specification\Email;
use Thingston\OpenApi\Specification\Url;
use Thingston\OpenApi\Test\AbstractTestCase;

final class ContactTest extends AbstractTestCase
{
    public function testMinimalSpecification(): void
    {
        $contact = new Contact('Contact name');

        $this->assertSame('Contact name', $contact->getName());

        $this->assertNull($contact->getUrl());
        $contact->setUrl($url = new Url('http://example.org/contact'));
        $this->assertSame($url, $contact->getUrl());

        $this->assertNull($contact->getEmail());
        $contact->setEmail($email = new Email('contact@example.org'));
        $this->assertSame($email, $contact->getEmail());
    }

    public function testFullSpecification(): void
    {
        $url = new Url('http://example.org/contact');
        $email = new Email('contact@example.org');

        $contact = new Contact('Contact name', $url, $email);

        $this->assertSame('Contact name', $contact->getName());
        $this->assertSame($url, $contact->getUrl());
        $this->assertSame($email, $contact->getEmail());
    }

    public function testFactory(): void
    {
        $contact = Contact::create('Contact name', 'contact@example.org', 'http://example.org/contact');

        $this->assertSame('Contact name', $contact->getName());
        $this->assertSame('contact@example.org', (string) $contact->getEmail());
        $this->assertSame('http://example.org/contact', (string) $contact->getUrl());
    }
}
