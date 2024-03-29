<?php
namespace App\HTML;

class Form
{
    private $data;
    private $errors;

    public function __construct(
        // $data , array $errors
        )
    {
        // $this->data = $data;
        // $this->errors = $errors;
    }

    public function input(string $name, string $label, $value, $type): string
    {
        // <label class="label" for="{$name}">{$label}</label>
        // <input class="input" type="{$type}" id="{$name}" name="{$name}" value="{$value}">
        return <<<HTML
        <input type="{$type}" name="{$name}" id="{$name}" class="form-control" placeholder="{$label}" value="{$value}" required>
        <label for="{$name}">{$label}</label>
HTML;
    }

    public function textarea(string $name, string $label,$value): string
    {
        return <<<HTML
        <label class="label" for="{$name}">{$label}</label>
        <textarea class="input" name="{$name}" id="{$name}" cols="30" rows="10" class="form-control">{$value}</textarea>
HTML;
    }
}