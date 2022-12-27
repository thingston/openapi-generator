<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Test\Specification;

use Thingston\OpenApi\Specification\AbstractSpecification;
use Thingston\OpenApi\Specification\License;
use Thingston\OpenApi\Specification\Url;

final class LicenseTest extends AbstractSpecificationTest
{
    public function createMinimalSpecification(): AbstractSpecification
    {
        return new License('License name');
    }

    public function createFullSpecification(): AbstractSpecification
    {
        return (new License('License name'))
            ->setUrl(new Url('http://example.org/license'));
    }
}
