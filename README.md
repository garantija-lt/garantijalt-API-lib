 # Garantijalt API

Its a library for Garantija.lt API.

## Using Garantijalt API-lib
- ```__PATH_TO_LIB__``` is a path where Garantija.lt API is placed. This will load Garantija.lt namespace
```php
require(__PATH_TO_LIB__ . "Garantijalt/vendor/autoload.php");
```

Validations, checks, etc. throws `GarantijaltException` and calls to library classes should be wrapped in: blocks
```php
try {
  // ...
} catch (GarantijaltException $e) {
  // ...
}
```

Any function starting with `add` or `set` returns its class so functions can be chained.

## Authentication
---
Uses supplied user `$token` and `(bool) $test_mode`, which if set to true will let you use Demo API or if set to false or not provided will use production API (currently only production API available). It is called during API object creation.
- Initialize new API library using: `$glt = new API($token);`
- Set new token using: `$glt->setToken($token);`


## Creating and Editing Product
---
`use Garantijalt\Sender;` will allow to create Product object.

Minimum required setup:

```php
use Garantijalt\Product;

    $product = new Product();
    $product
      ->setTitle('Product title')
      ->setCategory('Product category')
      ->setManufacturer('Manufacture')
      ->setWarranty(2)
      ->setPrice(90.02)
      ->setSerialNumber('000000000000')
    ;
```


## Creating Customer
---
`use Garantijalt\Customer;` will allow to create Customer object.

Minimum required setup:

```php
use Garantijalt\Customer;

    $customer = new Customer();
    $customer
      ->setFirstName('Vardenis')
      ->setLastName('Pavardenis')
      ->setCode('1223')
      ->setAddress1(null)
      ->setAddress2(null)
      ->setZip(null)
      ->setCity(null)
      ->setCountry(null)
      ->setPhone('+37063000000')
      ->setEmail('info@skc.lt')
    ;
```

## Creating Contract
---
`use Garantijalt\Contract;` will allow to create Contract object.

Minimum required setup:
- `$product` and `$customer` comes from objects described above
```php
use Garantijalt\Contract;

    $contract_obj = new Contract();
    $contract_obj
      ->setContractTypeId('1')
      ->setDuration( '2')
      ->setBranch('Italy')
      ->setSellDate('2021-02-12')
      ->setValidFrom('2021-02-12')
      ->setPrice(9.9)
      ->setProduct($product->__toArray())
      ->setCustomer($customer->__toArray());
```

## Methods
getContracts($date_from, $date_to)
- Get all contracts (certificates) created from `$date_from` to `$date_to`

getContract($id)
- Get a specific contract from its `$id` number

createContract($contract)
- Create a contract. Contract information is provided above.

updateContract($contract, $id)
- Update a contract. Replaces current contract information, with `$contract` provided. Replaces contract of `$id` number. 

getWarrantyTypes()
- Get warranty types array.

getWarrantyDetails($id)
- Get specific warranty details from its `$id` number.

getInsuranceTypes()
- Get insurance types array.

## Calling API
---
- check **src/examples/index.php** for Calling this API examples.
