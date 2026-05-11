<?php
namespace WUC\Entity;

class student {

    public $studentID;
    public $firstName;
    public $middleName;
    public $surName;
    public $yearOfStudy;
    public $currentAddress;
    public $homeAddress;
    public $phoneNumber;
    public $email;
    public $offerLetter;
    public $degreeClassification;
    public $emergencyContact;
    public $recordStatus;
    public $courseID;

    private static $attributeMap = [
        'student_id' => 'studentID',
        'first_name' => 'firstName',
        'middle_name' => 'middleName',
        'surname' => 'surName',
        'year_of_study' => 'yearOfStudy',
        'current_address' => 'currentAddress',
        'home_address' => 'homeAddress',
        'phone_number' => 'phoneNumber',
        'email' => 'email',
        'offer_letter' => 'offerLetter',
        'degree_classification' => 'degreeClassification',
        'emergency_contact' => 'emergencyContact',
        'record_status' => 'recordStatus',
        'course_id' => 'courseID'
    ];

    public function __construct() {

    }

    public function getRecord($studentID) {
        return $this->studentID === $studentID ? $this : null;
    }

    public function getRecordVal($studentID, $attribute) {
        if ($this->studentID !== $studentID || !isset(self::$attributeMap[$attribute])) {
            return null;
        }
        $property = self::$attributeMap[$attribute];
        return $this->$property ?? null;
    }

    public function setRecord($studentID, $student) {
        if ($this->studentID !== $studentID || !($student instanceof self)) {
            return false;
        }

        foreach (self::$attributeMap as $property) {
            if (property_exists($student, $property)) {
                $this->$property = $student->$property;
            }
        }

        return true;
    }

    public function setRecordVal($studentID, $attribute, $newValue) {
        if ($this->studentID !== $studentID || !isset(self::$attributeMap[$attribute])) {
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