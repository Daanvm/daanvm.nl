<?php

namespace ChristelMusic;

class FormData
{
    /**
     * Indicates if the form was already submitted, to differentiate which class
     * to return. When unsubmitted, empty is not invalid.
     */
    private $is_submitted;

    public $name;
    public $email;
    public $address;
    public $postalCode;
    public $city;
    public $country;
    public $quantity;

    private $errorMessages = [];

    public static function fromPost(array $postData): self
    {
        $formData = new self();
        $formData->is_submitted = true;
        $formData->name = $postData['name'];
        $formData->email = $postData['email'];
        $formData->address = $postData['address'];
        $formData->postalCode = $postData['postalCode'];
        $formData->city = $postData['city'];
        $formData->country = $postData['country'];
        $formData->quantity = intval($postData['quantity']);

        $formData->validate();

        return $formData;
    }

    public static function empty(): self
    {
        $formData = new self();
        $formData->is_submitted = false;
        $formData->country = 'The Netherlands';

        return $formData;
    }

    public function isValid(): bool
    {
        return count($this->errorMessages) == 0;
    }

    public function getHtmlClass(string $field): string
    {
        if (!$this->is_submitted) {
            return '';
        }

        if (!empty($this->errorMessages[$field])) {
            return 'is-invalid';
        } else {
            return 'is-valid';
        }
    }

    public function getHtmlFeedback(string $field): string
    {
        if (!$this->is_submitted) {
            return '';
        }

        if (!empty($this->errorMessages[$field])) {
            return sprintf('<div class="invalid-feedback">%s</div>', $this->errorMessages[$field]);
        }

        return '';
    }

    private function validate(): void
    {
        foreach (['name', 'email', 'address', 'postalCode', 'city', 'country', 'quantity'] as $field) {
            if (empty($this->{$field})) {
                $this->errorMessages[$field] = 'This is a required field.';
            }
        }

        if (!isset($this->errorMessages['email']) && !filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $this->errorMessages['email'] = 'This is an invalid email address.';
        }
    }
}
