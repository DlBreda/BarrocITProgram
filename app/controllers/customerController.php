<?php require_once __DIR__ . '/../init.php';
/**
 * Created by PhpStorm.
 * User: K
 * Date: 19-10-2015
 * Time: 16:37
 */

switch ($_POST['type']) {
    case 'add':
        addCustomer($_POST);
        break;

    case 'edit':
        if (edit($_POST)){
        }
        break;

}

function edit ($customer) {
    global $db;

    $sql = "UPDATE tbl_customers SET
            companyName = :companyName, adress = :adress, postalZip = :postalZip, adress2 = :adress2,
            postalZip2 = :postalZip2, contactPerson = :contactPerson, phoneNumber = :phoneNumber,
            faxNumber = :faxNumber, emailAdress = :emailAdress, creditWorthy = :creditWorthy,
            bankAccountNumber = :bankAccountNumber WHERE id = :id";
    $q = $db->prepare($sql);
    $q->bindParam(':companyName', $customer['companyName']);
    $q->bindParam(':adress', $customer['adress']);
    $q->bindParam(':id', $customer['id']);
    $q->bindParam(':postalZip', $customer['postalZip']);
    $q->bindParam(':adress2', $customer['adress2']);
    $q->bindParam(':postalZip2', $customer['postalZip2']);
    $q->bindParam(':contactPerson', $customer['contactPerson']);
    $q->bindParam(':phoneNumber', $customer['phoneNumber']);
    $q->bindParam(':faxNumber', $customer['faxNumber']);
    $q->bindParam(':emailAdress', $customer['emailAdress']);
    $q->bindParam(':creditWorthy', $customer['creditWorthy']);
    $q->bindParam(':bankAccountNumber', $customer['bankAccountNumber']);

    $q->execute();

    header('location:' . HTTP_PATH . 'public/views/customers/overview.php');
}

function addCustomer($in){

    global $db;


    $sql = "SELECT * FROM tbl_customers WHERE id = :id";
    $q = $db->prepare($sql);
    $q->bindParam(':id', $id);
    $q->execute();


//rowcount counts the returned rows (used to check if the username is already in use)
    if ( $q->rowCount() > 0 ) {
        die('Customer already exists');
    }


    $customer = $q->fetchAll();

//    id
//    companyName
//    adress
//    postalZip
//    adress2
//    postalZip2
//    contactPerson
//    firstName
//    insertion
//    lastName
//    phoneNumber
//    faxNumber
//    emailAdress
//    potentionalCustomer
//    creditWorthy
//    bankAccountNumber


    $sql = "INSERT INTO tbl_customers (companyName, adress, postalZip, adress2, postalZip2, contactPerson,
                                       firstName, insertion, lastName, phoneNumber, faxNumber,
                                       emailAdress, potentionalCustomer, creditWorthy, bankAccountNumber)
                VALUES (:companyName, :adress, :postalZip, :adress2, :postalZip2, :contactPerson,
                                      :firstName, :insertion, :lastName, :phoneNumber, :faxNumber,
                                      :emailAdress, :potentionalCustomer, :creditWorthy, :bankAccountNumber)";
    $q = $db->prepare($sql);
//    $q->bindParam(':firstName', $firstName);
//    $q->bindParam(':lastName', $lastName);
//    $q->bindParam(':companyName', $companyName);
//    $q->bindParam(':adress', $adress);
//    $q->bindParam(':postalZip', $postalZip);
//    $q->bindParam(':adress2', $adress2);
//    $q->bindParam(':postalZip2', $postalZip2);
//    $q->bindParam(':contactPerson', $contactPerson);
//    $q->bindParam(':phoneNumber', $phoneNumber);
//    $q->bindParam(':faxNumber', $faxNumber);
//    $q->bindParam(':emailAdress', $emailAdress);
//    $q->bindParam(':creditWorthy', $creditWorthy);
//    $q->bindParam(':bankAccountNumber', $bankAccountNumber);

    $out = array();
    foreach ( $in as $key => $value )
    {
        if ($key != 'type')
        {
            $out[':' . $key] = $value;
        }
    }
//    $q->bindParam(':firstName', $i);
//    $q->bindParam(':lastName', $i);
//    $q->bindParam(':companyName', $i);
//    $q->bindParam(':adress', $i);
//    $q->bindParam(':postalZip', $i);
//    $q->bindParam(':adress2', $i);
//    $q->bindParam(':postalZip2', $i);
//    $q->bindParam(':contactPerson', $i);
//    $q->bindParam(':phoneNumber', $i);
//    $q->bindParam(':faxNumber', $i);
//    $q->bindParam(':emailAdress', $i);
//    $q->bindParam(':creditWorthy', $i);
//    $q->bindParam(':bankAccountNumber', $i);
    $q->execute($out);

    header('location:' . HTTP_PATH . 'public/views/customers/overview.php');

}
