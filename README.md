
# AdsPower API Client for PHP
A PHP library for interacting with the AdsPower API.


## Installation

You can install this package via Composer
```bash
  composer require cherrypepper/adspower-api-client
```

## Requirements

- PHP 7.4 or higher
- PHP JSON extension
- PHP cURL extension
- Guzzle HTTP client

## Configuration

```php
<?php
use CherryPepper\AdsPower\AdsPowerClient;
use GuzzleHttp\Client;
use CherryPepper\AdsPower\Config\AdsPowerConfig;

$httpClient = new Client();
$config = new AdsPowerConfig(
    baseUri: 'http://local.adspower.net:50325',
    retryAttempts: 3,
    sleepDuration: 2
);

$adsPowerClient = new AdsPowerClient($httpClient, $config);
```

## Usage
Starting browser:

```php
<?php
use CherryPepper\AdsPower\AdsPowerClient;
use CherryPepper\AdsPower\DTO\Browser\BrowserStartParameters;
use CherryPepper\AdsPower\Exceptions\AdsPowerException;

// Initialize the client
$adsPowerClient = new AdsPowerClient($httpClient, $config);

// Parameters for starting the browser
$params = new BrowserStartParameters();
$params->user_id = 'h1yynkm'; // Replace with your actual user_id
$params->open_tabs = 1;
$params->launch_args = ["--window-position=400,0", "--blink-settings=imagesEnabled=false", "--disable-notifications"];

try {
    // Start the browser
    $browserResponse = $adsPowerClient->browser->start($params);
    echo "Browser started successfully." . PHP_EOL;
    print_r($browserResponse->data);
} catch (AdsPowerException $e) {
    echo "Error starting browser: " . $e->getMessage() . PHP_EOL;
}
```

Creating a Profile:
```php
<?php
use CherryPepper\AdsPower\AdsPowerClient;
use CherryPepper\AdsPower\DTO\Profile\ProfileCreateParameters;
use CherryPepper\AdsPower\Exceptions\AdsPowerException;

// Initialize the client
$adsPowerClient = new AdsPowerClient($httpClient, $config);

// Parameters for creating a profile
$params = new ProfileCreateParameters();
$params->name = 'User A';
$params->group_id = '100'; // Replace with a valid group_id
$params->fingerprint_config = [
    'automatic_timezone' => '1',
    'language' => ['en-US', 'en'],
    'flash' => 'block',
    'fonts' => ['all'],
    'webrtc' => 'disabled',
    'ua' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)...',
];

try {
    // Create the profile
    $profileCreateResponse = $adsPowerClient->profiles->create($params);
    echo "Profile created with ID: " . $profileCreateResponse->id . PHP_EOL;
} catch (AdsPowerException $e) {
    echo "Error creating profile: " . $e->getMessage() . PHP_EOL;
}
```

## Conclusion
This library provides a convenient way to interact with the AdsPower API to automate tasks related to managing browsers and profiles. You can extend the functionality by using other available methods in the client.

Note: Make sure to replace the example data (such as user_id and group_id) with actual values from your environment.

## License
This project is licensed under the MIT License. See the LICENSE file for details.

## Contributing
If you have suggestions or want to contribute improvements, please create an issue or pull request in the project’s repository.
