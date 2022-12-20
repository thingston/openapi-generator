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
        $license = new License('License name');

        return $license;
    }

    public function createFullSpecification(): AbstractSpecification
    {
        $license = new License('License name');
        $license->url = new Url('http://example.org/license');

        return $license;
    }
}
