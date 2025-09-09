<?php

enum MenuCategory: int {
  case Drink = 1;
  case Cake = 2;
  case Bread = 3;

  public function label(): string {
    return match($this) {
      self::Drink => 'Drink',
      self::Cake => 'Cake',
      self::Bread => 'Bread',
    };
  }
}