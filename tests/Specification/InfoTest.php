<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Test\Specification;

use Thingston\OpenApi\Specification\AbstractSpecification;
use Thingston\OpenApi\Specification\Contact;
use Thingston\OpenApi\Specification\Info;
use Thingston\OpenApi\Specification\License;
use Thingston\OpenApi\Specification\Url;

final class InfoTest extends AbstractSpecificationTest
{
    public function createMinimalSpecification(): AbstractSpecification
    {
        return new Info('API title', '1.0');
    }

    public function createFullSpecification(): AbstractSpecification
    {
        return (new Info('API title', '1.0'))
            ->setDescription('Some description')
            ->setTermsOfService(new Url('http://example.org/terms'))
            ->setContact(new Contact('Contact name'))
            ->setLicense(new License('License name'));
    }
}
