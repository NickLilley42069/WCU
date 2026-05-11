<?php 
namespace WUC\Entity;

class recordStatus {

    public $statusID;
    public $status;
    public $dateAdded;

    private static $attributeMap = [
        'status_id' => 'statusID',
        'status' => 'status',
        'date_added' => 'dateAdded'
    ];

    public function __construct() {

    }

    public function getRecord($recordID) {
        return $this->statusID === $recordID ? $this : null;
    }

    public function getRecordVal($recordID, $attribute) {
        if ($this->statusID !== $recordID || !isset(self::$attributeMap[$attribute])) {
            return null;
        }
        $property = self::$attributeMap[$attribute];
        return $this->$property ?? null;
    }

    public function setRecord($recordID, $recordStatus) {
        if ($this->statusID !== $recordID || !($recordStatus instanceof self)) {
            return false;
        }

        foreach (self::$attributeMap as $property) {
            if (property_exists($recordStatus, $property)) {
                $this->$property = $recordStatus->$property;
            }
        }

        return true;
    }

    public function setRecordVal($recordID, $attribute, $newValue) {
        if ($this->statusID !== $recordID || !isset(self::$attributeMap[$attribute])) {
            return false;
        }
        $property = self::$attributeMap[$attribute];
        $this->$property = $newValue;
        return true;
    }

    public static function getAllowedAttributes() {
        return array_keys(self::$attributeMap);
    }
}
?>