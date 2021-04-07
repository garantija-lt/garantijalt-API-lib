<!DOCTYPE html>
<html lang="lt">
<body>
<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
ini_set('error_reporting', E_ALL);

require("../vendor/autoload.php");

use Garantijalt\API;
use Garantijalt\Product;
use Garantijalt\Customer;
use Garantijalt\Contract;
use Garantijalt\Exception\GarantijaltException;

$token = "005030666b58c1baed96ec3847dfb3fb30691038";

try {
    /*
     *  Token - Bearer token (API key)
     *  test_mode - makes request to demo API, currently there is no test API, so it connects to LIVE API
     *  api_debug_mode - Adds custom data to be shown in HTML. Useful for debugging.
     * */
    $glt = new API($token, true, true);



    $date_from = '2003-01-01';
    $date_to = '2021-04-06';

    $product = new Product();
    $product
      ->setTitle('Product title')
      ->setCategory('Product category')
      ->setManufacturer('Manufacture')
      ->setWarranty(2)
      ->setPrice(90.02)
      ->setSerialNumber('000000000000')
    ;

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

    $contract_obj = new Contract();
    $contract_obj
      ->setContractTypeId('1')
      ->setDuration( '2')
      ->setBranch('Italy')
      ->setSellDate('2021-02-12 00:00:00')
      ->setValidFrom('2021-02-12 00:00:00')
      ->setPrice(9.9)
      ->setProduct($product->__toArray())
      ->setCustomer($customer->__toArray());

//    $contracts = $glt->getContracts($date_from, $date_to);
//    $contract = $glt->getContract('3171309');
//    $newContract = $glt->createContract($contract_obj);

    $contract_obj->setPrice(421.6);

//    $updatedContract = $glt->updateContract($contract_obj, '3440412');
//    $warrantyTypes = $glt->getWarrantyTypes();
//    $warrantyDetails = $glt->getWarrantyDetails('1');
    $insuranceTypes = $glt->getInsuranceTypes();

//    echo json_encode($contracts);
//    echo json_encode($contract);
//    echo json_encode($newContract);
//    echo json_encode($updatedContract);
//    echo json_encode($warrantyTypes);
//    echo json_encode($warrantyDetails);
    echo json_encode($insuranceTypes);

} catch (GarantijaltException $e) {
    echo $e->getMessage();
}

?>


</body>
</html>
