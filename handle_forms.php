<?php
require_once 'dbConfig.php';
require_once 'models.php';

// Handle add unitowner
if (isset($_POST['addUnitowner'])) {
    if (isset($_POST['name'], $_POST['contact'], $_POST['email'])) {
        $name = $_POST['name'];
        $contact = $_POST['contact'];
        $email = $_POST['email'];

        if (Unitowner::addUnitowner($pdo, $name, $contact, $email)) {
            header("Location: index.php");
            exit;
        } else {
            echo "Error adding unitowner.";
        }
    } else {
        echo "Form data is incomplete.";
    }
}

// Handle update unitowner
if (isset($_POST['updateUnitowner'])) {
    if (isset($_POST['id'], $_POST['name'], $_POST['contact'], $_POST['email'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $contact = $_POST['contact'];
        $email = $_POST['email'];

        if (Unitowner::updateUnitowner($pdo, $id, $name, $contact, $email)) {
            header("Location: index.php");
            exit;
        } else {
            echo "Error updating unitowner.";
        }
    } else {
        echo "Form data for update is incomplete.";
    }
}

// Handle delete unitowner
if (isset($_GET['deleteUnitowner'])) {
    $id = $_GET['unitownerId'];
    if (Unitowner::deleteUnitowner($pdo, $id)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Error deleting unitowner.";
    }
}

