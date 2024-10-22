<?php
class Unitowner {
    public static function getAllUnitowners($pdo) {
        $sql = "SELECT * FROM unitowner";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getUnitownerById($pdo, $id) {
        $sql = "SELECT * FROM unitowner WHERE unitowner_id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function addUnitowner($pdo, $name, $contact, $email) {
        $sql = "INSERT INTO unitowner (owner_name, contact, email) VALUES (:name, :contact, :email)";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute(['name' => $name, 'contact' => $contact, 'email' => $email]);
    }

    public static function updateUnitowner($pdo, $id, $name, $contact, $email) {
        $sql = "UPDATE unitowner SET owner_name = :name, contact = :contact, email = :email WHERE unitowner_id = :id";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute(['name' => $name, 'contact' => $contact, 'email' => $email, 'id' => $id]);
    }

    public static function deleteUnitowner($pdo, $id) {
        $sql = "DELETE FROM unitowner WHERE unitowner_id = :id";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }
}

class Unit {
    public static function getAllUnits($pdo) {
        $sql = "SELECT * FROM unit";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getUnitById($pdo, $unitid) {
        $sql = "SELECT * FROM unit WHERE unitid = :unitid";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['unitid' => $unitid]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function addUnit($pdo, $unitowner_id, $unitnumber, $unitdescription, $price, $unit_availability) {
        $sql = "INSERT INTO unit (unitowner_id, unitnumber, unitdescription, price, unit_availability) VALUES (:unitowner_id, :unitnumber, :unitdescription, :price, :unit_availability)";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([
            'unitowner_id' => $unitowner_id,
            'unitnumber' => $unitnumber,
            'unitdescription' => $unitdescription,
            'price' => $price,
            'unit_availability' => $unit_availability
        ]);
    }

    public static function updateUnit($pdo, $unitid, $unitnumber, $unitdescription, $price, $unit_availability) {
        $sql = "UPDATE unit SET unitnumber = :unitnumber, unitdescription = :unitdescription, price = :price, unit_availability = :unit_availability WHERE unitid = :unitid";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([
            'unitnumber' => $unitnumber,
            'unitdescription' => $unitdescription,
            'price' => $price,
            'unit_availability' => $unit_availability,
            'unitid' => $unitid
        ]);
    }

    public static function deleteUnit($pdo, $unitid) {
        $sql = "DELETE FROM unit WHERE unitid = :unitid";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute(['unitid' => $unitid]);
    }
}
