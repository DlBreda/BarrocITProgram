<?php require_once __DIR__ . '/../init.php';
/**
 * Created by PhpStorm.
 * User: K
 * Date: 19-10-2015
 * Time: 16:37
 */

switch ($_POST['type']) {
    case 'addCustomer':
        addCustomer($_POST);
        break;

    case 'editCustomer':
        editCustomer($_POST);
        break;

    case 'addProject':
        addProject($_POST);
        break;

    case 'editProject':
        editProject($_POST);
        break;
    
    case 'addInvoice':
        addInvoice($_POST);
        break;

    case 'addAppoints':
        addAppointment($_POST);
        break;

//    case 'editInvoice':
//        editInvoice($_POST);
//        break;

}

function editCustomer ($customer) {
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

//            id
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


function addProject($in){

    global $db;

    $sql = "SELECT * FROM tbl_customers WHERE id = :id";
    $q = $db->prepare($sql);
    $q->bindParam(':id', $in['customerID']);
    $q->execute();

    if ( $q->rowCount() == 0 )
    {
        die( 'Klant bestaat niet!' );
    }

    $sql = "INSERT INTO tbl_projects (customerID, description, deadline,
                   projectPrice, operatingSystem)
            VALUES (:customerID, :description, :deadline,
                  :projectPrice, :operatingSystem)";
    $q = $db->prepare($sql);

    $out = array();
    foreach ( $in as $key => $value )
    {
        if ($key != 'type')
        {
            $out[':' . $key] = $value;
        }
    }


    $q->execute($out);
    $location = 'location:' . HTTP_PATH . "public/views/projects/show.php?id=" . $in['customerID'];
    header($location);
}

function editProject ($in) {
    global $db;


    $sql = "UPDATE tbl_projects SET description = :description, deadline = :deadline,
                                    projectPrice = :projectPrice, operatingSystem = :operatingSystem
                                    WHERE id = :id";

    $q = $db->prepare($sql);

    $out = array();
    foreach ( $in as $key => $value )
    {
        if ($key != 'type')
        {
            $out[':' . $key] = $value;
        }
    }

    $q->execute($out);

    $location = 'location:' . HTTP_PATH . "public/views/projects/showProject.php?id=" . $in['id'];
    header($location);
}

function addInvoice($in) {

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



    $sql = "INSERT INTO tbl_invoices (description, price, paid, send)
                VALUES (:description, :price, :paid, :send)";
    $q = $db->prepare($sql);

    $out = array();
    foreach ( $in as $key => $value )
    {
        if ($key != 'type')
        {
            $out[':' . $key] = $value;
        }
    }


  $q->execute($out);
    $location = 'location:' . HTTP_PATH . "public/views/projects/show.php?id=" . $in['customerID'];
    header($location);


}

function addAppointment($in) {

    global $db;


    $sql = "SELECT * FROM tbl_apointments WHERE id = :id";
    $q = $db->prepare($sql);
    $q->bindParam(':id', $id);
    $q->execute();


//rowcount counts the returned rows (used to check if the username is already in use)


    $customer = $q->fetchAll();

    $sql = "INSERT INTO tbl_appointments (appointmentDate, description)
                VALUES (:appointmentDate, :description)";
    $q = $db->prepare($sql);
    $q->bindParam(':appointmentDate', $in['appointmentDate']);
    $q->bindParam(':description', $in['description']);
    $q->execute();

    $out = array();
    foreach ( $in as $key => $value )
    {
        if ($key != 'type')
        {
            $out[':' . $key] = $value;
        }
    }
    var_dump($out);
    die();

    $q->execute($out);

    header('location:' . HTTP_PATH . 'public/views/appointments/adminAppointments.php');

}
