# GeoIP for Lumen

Determine the geographical location of website visitors based on their IP addresses.

## Installation

To install this package, just install through composer

```
composer require codenexus/lumen-geoip
```

### Providers

Next, open `bootstrap/app.php` and add under the Register Service Providers section:

```php
...
$app->register(Codenexus\GeoIPlm\GeoIPServiceProvider::class);
```

### Update MaxMind GeoLite2 City database

Run this on the command line from the root of your project:

```
$ php artisan geoip:update
```

### Usage

GeoIP will try to determine the IP using the following http headers: `HTTP_CLIENT_IP`, `HTTP_X_FORWARDED_FOR`, `HTTP_X_FORWARDED`, `HTTP_X_CLUSTER_CLIENT_IP`, `HTTP_FORWARDED_FOR`, `HTTP_FORWARDED`, `REMOTE_ADDR` in this order.  Optionally you can set an IP as the only paramater to set it.

```php
$record = $app->geoip->getLocation('232.223.11.11');

print($record->country->isoCode . "\n"); // 'US'
print($record->country->name . "\n"); // 'United States'
print($record->country->names['zh-CN'] . "\n"); // '美国'

print($record->mostSpecificSubdivision->name . "\n"); // 'Minnesota'
print($record->mostSpecificSubdivision->isoCode . "\n"); // 'MN'

print($record->city->name . "\n"); // 'Minneapolis'

print($record->postal->code . "\n"); // '55455'

print($record->location->latitude . "\n"); // 44.9733
print($record->location->longitude . "\n"); // -93.2323
```


