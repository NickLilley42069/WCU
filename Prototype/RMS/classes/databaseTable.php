<?php
namespace CSY2089;

class databaseTable {

private $pdo;
private $table;
private $primaryKey;
private $entityClass;
private $entityConstructor;

public function __construct($pdo, $table, $primaryKey, $entityClass, $entityConstructor) {
$this->pdo = $pdo;
$this->table = $table;
$this->primaryKey = $primaryKey;
$this->entityClass = $entityClass;
$this->entityConstructor = $entityConstructor;

}

public function find($field, $value) {

$stmt = $this->pdo->prepare('SELECT * FROM ' . $this->table . ' WHERE ' . $field . ' = :value');
$stmt->setFetchMode(\PDO::FETCH_CLASS, $this->entityClass, $this->entityConstructor);

$criteria = ['value' => $value];
$stmt->execute($criteria);

return $stmt->fetchAll();

}

public function findAll() {

$stmt = $this->pdo->prepare('SELECT * FROM ' . $this->table);
$stmt->setFetchMode(\PDO::FETCH_CLASS, $this->entityClass, $this->entityConstructor);
$stmt->execute();

return $stmt->fetchAll();

}

public function insertRecord($record) {

    if (empty($this->id)) {

    unset($this->id);

    }

    $keys = array_keys($record);

    $attributes = implode(', ', $keys);
    $attributesWithColon = implode(', :', $keys);

    $query = "INSERT INTO $this->table ($attributes) VALUES (:$attributesWithColon)";

    $stmt = $this->pdo->prepare($query);

    $stmt->execute($record);

}

public function updateRecord($attribute, $value, $searchAttribute, $searchValue) {

    $sql = "UPDATE $this->table SET $attribute = :val WHERE $searchAttribute = :id";

    $stmt = $this->pdo->prepare($sql);

    $stmt->execute([

        ':val' => $value,
        ':id'  => $searchValue

    ]);

    return 'Record edited';

}



public function deleteRecord($searchAttribute, $searchValue) {

    $sql = "DELETE FROM $this->table WHERE $searchAttribute = :value";

    $stmt = $this->pdo->prepare($sql);

    $stmt->execute(['value' => $searchValue]);

    return "Records with " . $searchAttribute . " of " . $searchValue . "deleted";

}

public function saveRecord($record) {

    // If there is no matching id, insert the record, else update the existing record.

    if (isset($record[$this->primaryKey])) {

        foreach ($record as $key => $value) {

            if ($key !== $this->primaryKey) {

                $this->updateRecord($key, $value, $this->primaryKey, $record[$this->primaryKey]);
            
            }

        }

    }
    
    else {

        $this->insertRecord($record);

    }

}











































































}