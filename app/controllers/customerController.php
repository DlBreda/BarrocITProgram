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