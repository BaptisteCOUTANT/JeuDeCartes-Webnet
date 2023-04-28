<?php
// src/Model/Card.php

namespace App\Model;

class Card
{
private string $color;
private string $value;

public function __construct(string $color, string $value)
{
$this->color = $color;
$this->value = $value;
}

public function getColor(): string
{
return $this->color;
}

public function getValue(): string
{
return $this->value;
}

public function __toString(): string
{
// retourne une chaîne de caractères représentant la carte, par exemple "AS Trèfle"
return $this->value . ' ' . $this->color;
}
}
