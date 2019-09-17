<?php

namespace Crawly;

class Browser
{
    const ACCEPT_LANGUAGES = [
        'en-US,en;q=0.5',
        'pt-BR,pt;q=0.9,en-US;q=0.8,en;q=0.7',
        'en-GB,en;q=0.9,en-US;q=0.8,pt-BR;q=0.7,pt;q=0.6,fr;q=0.5,es;q=0.4',
        'en-GB,en;q=0.9,en-US;q=0.8,pt-BR;q=0.7',
        'en-GB,en;q=0.9,en-US;q=0.8,pt-BR;q=0.7,fr;q=0.5',
        'en-GB,en;q=0.9,en-US;q=0.8,pt-BR;q=0.7,es;q=0.4',
        'pt-BR,pt;q=0.8,en-US;q=0.5,en;q=0.3',
    ];
    const USER_AGENTS = [
        'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36',
        'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.135 Safari/537.36 Edge/12.246',
        'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_2) AppleWebKit/601.3.9 (KHTML, like Gecko) Version/9.0.2 Safari/601.3.9',
        'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.111 Safari/537.36',
        'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:15.0) Gecko/20100101 Firefox/15.0.1',
    ];

    public function getHeaders(array $additionalHeaders = []): array
    {
        return array_merge([
            'User-Agent'                => $this->getRandomUserAgent(),
            'Accept-Language'           => $this->getRandomAcceptLang(),
            'Accept'                    => 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
            'Accept-Encoding'           => 'gzip, deflate',
            'Connection'                => 'keep-alive',
            'Accept-Charset'            => 'utf-8',
            'Pragma'                    => 'no-cache',
            'X-Requested-With'          => 'XMLHttpRequest',
            'Upgrade-Insecure-Requests' => '1',
        ], $additionalHeaders);
    }

    protected function getRandomAcceptLang(): string
    {
        return self::ACCEPT_LANGUAGES[array_rand(self::ACCEPT_LANGUAGES)];
    }

    protected function getRandomUserAgent(): string
    {
        return self::USER_AGENTS[array_rand(self::USER_AGENTS)];
    }
}
