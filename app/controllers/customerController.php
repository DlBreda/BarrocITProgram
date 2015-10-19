<?php require_once __DIR__ . '/../init.php';
/**
 * Created by PhpStorm.
 * User: K
 * Date: 19-10-2015
 * Time: 16:37
 */

switch ($_POST['type']) {
    case 'add':
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
            bankAccountNumber = :bankAccountNumber";
    $q = $db->prepare($sql);
    $q->bindParam(':companyName', $companyName);
    $q->bindParam(':adress', $adress);
    $q->bindParam(':postalZip', $postalZip);
    $q->bindParam(':adress2', $adress2);
    $q->bindParam(':postalZip2', $postalZip2);
    $q->bindParam(':contactPerson', $contactPerson);
    $q->bindParam(':phoneNumber', $phoneNumber);
    $q->bindParam(':faxNumber', $faxNumber);
    $q->bindParam(':emailAdress', $emailAdress);
    $q->bindParam(':creditWorthy', $creditWorthy);
    $q->bindParam(':bankAccountNumber', $bankAccountNumber);

    $q->execute();

}