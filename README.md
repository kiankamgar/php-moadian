# PHP Moadian
<p>
<a href="https://packagist.org/packages/kiankamgar/php-moadian"><img src="https://img.shields.io/packagist/dt/kiankamgar/php-moadian" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/kiankamgar/php-moadian"><img src="https://img.shields.io/packagist/v/kiankamgar/php-moadian" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/kiankamgar/php-moadian"><img src="https://img.shields.io/packagist/l/kiankamgar/php-moadian" alt="License"></a>
</p>

PHP SDK for tp.tax.gov.ir API (Karpoosheh/Moadian)

This PHP SDK provides a convenient way to interact with the tp.tax.gov.ir API, also known as Karpoosheh or Moadian. By integrating this SDK into your PHP applications, you can seamlessly access and utilize the functionalities offered by the tp.tax.gov.ir APIs.

## Features

- **Easy Integration**: Simplifies the process of integrating tp.tax.gov.ir API into your PHP projects.
- **Comprehensive Functionality**: Access a wide range of functionalities offered by the tp.tax.gov.ir platform.
- **Robust and Secure**: Built with attention to security and reliability, ensuring safe interactions with the API.

## Requirements

- PHP 8.0 or higher
- Composer for installation

### Composer Dependencies
```json
{
   "require": {
      "php": "^8.0",
      "guzzlehttp/guzzle": "^7.5",
      "ext-json": "*",
      "ext-openssl": "*",
      "ext-ctype": "*",
      "phpseclib/phpseclib": "~3.0"
   }
}
```

## Getting Started

1. Get memory id (fiscal id), private key and certificate files from tp.tax.gov.ir.

2. Install the SDK via Composer:
   ```bash
   composer require kiankamgar/php-moadian
   ```
   
3. Start utilizing the various methods provided by the SDK to interact with the API.

## Usage
Require composer autoload file:
```php
require_once __DIR__ . '/vendor/autoload.php';
```

Create an instance from Moadian class:
```php
use KianKamgar\MoadianPhp\Moadian;

$moadian = new Moadian(
        $privateKeyFilePath,
        $certificateFilePath,
        $memoryId,
        $economicalCode
    );
```

Now you can use these APIs:
### Get fiscal information
```php
$fiscalInformation = $moadian->getFiscalInformation();

$economicCode = $fiscalInformation->getEconomicCode();
$fiscalStatus = $fiscalInformation->getFiscalStatus();
$nameTrade = $fiscalInformation->getNameTrade();
$nationalId = $fiscalInformation->getNationalId();
```

### Get tax payer
```php
$taxPayer = $moadian->getTaxPayer();

$nameTrade = $taxPayer->getNameTrade();
$nationalId = $taxPayer->getNationalId();
$taxpayerStatus = $taxPayer->getTaxpayerStatus();
```

### Send invoice
#### Create invoice
Each invoice contains header, body array and payment array (payment array is optional). You can create invoice with Invoice helper:
```php
use KianKamgar\MoadianPhp\Invoice;

$invoice = new Invoice();
$invoice->header($moadian->getMemoryId())
        ->setInty(1)
        ->setInp(1)
        ->setIns(1)
        ->setTins("14003778990")
        ->setTob(2)
        ->setBid("10100302746")
        ->setTinb("10100302746")
        ->setTprdis(20_000)
        ->setTdis(500)
        ->setTadis(19_500)
        ->setTvam(1_755)
        ->setTodam(0)
        ->setTbill(21_255)
        ->setSetm(2);
        
$invoice->body()
        ->setSstid("2710000138624")
        ->setSstt("title")
        ->setMu("164")
        ->setAm(2)
        ->setFee(10_000)
        ->setPrdis(20_000)
        ->setDis(500)
        ->setAdis(19_500)
        ->setVra(9)
        ->setVam(1_755)
        ->setTsstam(21255)
        ->build();
        
$invoice->body()
        ->setSstid("2710000138624")
        ->setSstt("another title")
        ->setMu("164")
        ->setAm(2)
        ->setFee(10_000)
        ->setPrdis(20_000)
        ->setDis(500)
        ->setAdis(19_500)
        ->setVra(9)
        ->setVam(1_755)
        ->setTsstam(21255)
        ->build();

$invoice->payment()
        ->setPcn('pcn')
        ->setPv(10)
        ->build();
```

#### Send invoices
Now that you have created your invoice objects you can send your invoices with two options:
1. If you just want to send invoices and do not need inquiry, you can do this:
```php
$response = $moadian->sendInvoices(
        $invoice1,
        $invoice2,
        $invoice3,
        ...
    );

$timestamp = $response->getTimestamp();
$result = $response->getResult();
```

2. If you want to send invoices and get the inquiry for each as well, you can do this:

**_NOTE:_** keep in mind that you need to wait at least 10 seconds to be able to inquiry an invoice, therefor in this case your request will take at least 10 seconds
```php
$response = $moadian->sendInvoicesWithResponse(
        $invoice1,
        $invoice2,
        $invoice3,
        ...
    );

$result = $response->getResult();
```

### Inquiry sent invoices
1. By reference id(s)
```php
$inquiry = $moadian->getInquiryByReferenceIds(['referenceId1', 'referenceId2']);

$result = $inquiry->getResult();
```
You can pass start and end as well to filter results (both are optional):
```php
$start = new DateTime();
$end = (new DateTime())->modify('+1 day');

$inquiry = $moadian->getInquiryByReferenceIds(
  ['referenceId1', 'referenceId2'],
  $start,
  $end
);

$result = $inquiry->getResult();
```

2. By uid
```php
$inquiry = $moadian->getInquiryByUid(['uid1', 'uid2']);
    
$result = $inquiry->getResult();
```
You can pass start and end as well to filter results (both are optional):
```php
$start = new DateTime();
$end = (new DateTime())->modify('+1 day');

$inquiry = $moadian->getInquiryByUid(
  ['uid1', 'uid2'],
  $start,
  $end
);

$result = $inquiry->getResult();
```

3. By Time
```php
// inquiry sent invoices in the past 24 hours
$inquiry = $moadian->getInquiryByTime();
    
$result = $inquiry->getResult();
```

Also, you can pass optional parameters:
```php
use KianKamgar\MoadianPhp\Enums\InvoiceStatus;

$start = new DateTime();
$end = (new DateTime())->modify('+1 day');
$inquiry = $moadian->getInquiryByTime(
  $pageNumber, // default = 1
  $pageSize, // default = 10
  InvoiceStatus::SUCCESS,
  $start,
  $end
);

$result = $inquiry->getResult();
```

## Contributing

Contributions, bug reports, and feature requests are welcome! Please feel free to open issues or submit pull requests.

## License

This SDK is open-source and licensed under the MIT License. See the [LICENSE](https://github.com/kiankamgar/php-moadian/blob/main/LICENSE) file for more details.