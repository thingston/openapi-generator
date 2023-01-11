<?php

declare(strict_types=1);

namespace Thingston\OpenApi\Test\Specification;

use Thingston\OpenApi\Specification\AbstractSpecification;
use Thingston\OpenApi\Specification\Contact;
use Thingston\OpenApi\Specification\Info;
use Thingston\OpenApi\Specification\License;
use Thingston\OpenApi\Specification\Url;
use Thingston\OpenApi\Test\AbstractTestCase;

final class InfoTest extends AbstractTestCase
{
    public function testMinimalSpecification(): void
    {
        $info = new Info('API title', '1.0');

        $this->assertSame('API title', $info->getTitle());
        $this->assertSame('1.0', $info->getVersion());

        $this->assertNull($info->getDescription());
        $info->setDescription('Some description');
        $this->assertSame('Some description', $info->getDescription());

        $this->assertNull($info->getTermsOfService());
        $info->setTermsOfService($url = new Url('http://example.org/terms'));
        $this->assertSame($url, $info->getTermsOfService());

        $this->assertNull($info->getContact());
        $info->setContact($contact = new Contact('Contact name'));
        $this->assertSame($contact, $info->getContact());

        $this->assertNull($info->getLicense());
        $info->setLicense($license = new License('License name'));
        $this->assertSame($license, $info->getLicense());
    }

    public function testFullSpecification(): void
    {
        $info = new Info(
            'API title',
            '1.0',
            'Some description',
            $url = new Url('http://example.org/terms'),
            $contact = new Contact('Contact name'),
            $license = new License('License name')
        );

        $this->assertSame('API title', $info->getTitle());
        $this->assertSame('1.0', $info->getVersion());
        $this->assertSame('Some description', $info->getDescription());
        $this->assertSame($url, $info->getTermsOfService());
        $this->assertSame($contact, $info->getContact());
        $this->assertSame($license, $info->getLicense());
    }

    public function testFactory(): void
    {
        $info = Info::create('API title', '1.0', [
            'termsOfService' => 'http://example.org/terms',
        ]);

        $this->assertSame('API title', $info->getTitle());
        $this->assertSame('1.0', $info->getVersion());
        $this->assertSame('http://example.org/terms', (string) $info->getTermsOfService());
    }
}
