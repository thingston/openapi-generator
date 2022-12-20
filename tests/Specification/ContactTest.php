<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Test\Specification;

use Thingston\OpenApi\Specification\AbstractSpecification;
use Thingston\OpenApi\Specification\Contact;
use Thingston\OpenApi\Specification\Email;
use Thingston\OpenApi\Specification\Url;

final class ContactTest extends AbstractSpecificationTest
{
    public function createMinimalSpecification(): AbstractSpecification
    {
        $contact = new Contact('Contact name');

        return $contact;
    }

    public function createFullSpecification(): AbstractSpecification
    {
        $contact = new Contact('Contact name');
        $contact->url = new Url('http://example.org/contact');
        $contact->email = new Email('contact@example.org');

        return $contact;
    }
}
