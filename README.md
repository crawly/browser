# Browser
Lib that returns headers to simulate a browser

* User-Agent
* Accept-Language
* Accept
* Accept-Encoding
* Connection
* Accept-Charset
* Pragma
* X-Requested-With
* Upgrade-Insecure-Requests

# Install

`composer require crawly/browser`

# Usage

```
$browser = new Browser();
$headers = $browser->getHeaders();
```

**Additional Headers**
```
$browser = new Browser();
$headers = $browser->getHeaders([
    'Referer' => 'http://test.org'
]);
```