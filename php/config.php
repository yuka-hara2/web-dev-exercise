<?php

try {
  $pdo = new PDO("sqlite:./../../SQLite3/sqlexercise.sqlite3");
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOExeption $e) {
  die("DB connection failed: " . $e->getMessage());
}