<?php

namespace Crawly\Test;

use Crawly\Browser;
use PHPUnit\Framework\TestCase;

class BrowserTest extends TestCase
{
    protected $headers;

    protected function setUp(): void
    {
        parent::setUp();

        $browser       = new Browser();
        $this->headers = $browser->getHeaders();
    }

    public function testProperties()
    {
        $this->assertArrayHasKey('User-Agent', $this->headers);
        $this->assertArrayHasKey('Accept-Language', $this->headers);
        $this->assertArrayHasKey('Accept', $this->headers);
        $this->assertArrayHasKey('Accept-Encoding', $this->headers);
        $this->assertArrayHasKey('Connection', $this->headers);
        $this->assertArrayHasKey('Accept-Charset', $this->headers);
        $this->assertArrayHasKey('Pragma', $this->headers);
        $this->assertArrayHasKey('Upgrade-Insecure-Requests', $this->headers);
    }

    public function testAcceptCharset()
    {
        $this->assertEquals('utf-8', $this->headers['Accept-Charset']);
    }

    public function testPragma()
    {
        $this->assertEquals('no-cache', $this->headers['Pragma']);
    }

    public function testUpgradeInsecureRequests()
    {
        $this->assertEquals('1', $this->headers['Upgrade-Insecure-Requests']);
    }

    public function testConnection()
    {
        $this->assertEquals('keep-alive', $this->headers['Connection']);
    }

    public function testAcceptEncoding()
    {
        $this->assertEquals('gzip, deflate', $this->headers['Accept-Encoding']);
    }

    public function testAccept()
    {
        $this->assertEquals('text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8', $this->headers['Accept']);
    }

    public function testUserAgent()
    {
        $this->assertContains($this->headers['User-Agent'], Browser::USER_AGENTS);
    }

    public function testAcceptLanguage()
    {
        $this->assertContains($this->headers['Accept-Language'], Browser::ACCEPT_LANGUAGES);
    }

    public function testAdditionalHeaders()
    {
        $browser       = new Browser();
        $headers = $browser->getHeaders(['test' => '123']);

        $this->assertEquals('123', $headers['test']);
    }
}