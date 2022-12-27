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
        return new Contact('Contact name');
    }

    public function createFullSpecification(): AbstractSpecification
    {
        return (new Contact('Contact name'))
            ->setUrl(new Url('http://example.org/contact'))
            ->setEmail(new Email('contact@example.org'));
    }
}
