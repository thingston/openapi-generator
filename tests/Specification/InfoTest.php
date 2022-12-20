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
        $info = new Info('API title', '1.0');

        return $info;
    }

    public function createFullSpecification(): AbstractSpecification
    {
        $info = new Info('API title', '1.0');
        $info->description = 'Some description';
        $info->termsOfService = new Url('http://example.org/terms');
        $info->contact = new Contact('Contact name');
        $info->license = new License('License name');

        return $info;
    }
}
