<?php
require_once 'menu_category.php';

class Menu {
  public function __construct(
    public int $id,
    public string $name,
    public MenuCategory $category,
    public int $price,
  ) {}

  public static function fromRow(array $row): self {
    return new self(
      id: (int)$row['id'],
      name: $row['name'],
      category: MenuCategory::from((int)$row['category']),
      price: $row['price'],
    );
  }

  public static function getAll() {
    global $pdo;
    $stmt = $pdo->query("SELECT * FROM menus");
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return array_map(fn($row) => Menu::fromRow($row), $rows);
  }

  public static function create($name, $category, $price) {
    $sql = "INSERT INTO menus (name, category, price) VALUES (?, ?, ?)";
    global $pdo;
    $stmt = $pdo->prepare($sql);
    return $stmt->execute(array($name, $category, $price));
  }

  public static function update($name, $category, $price, $id) {
    $sql = "UPDATE menus SET name = ?, category = ?, price = ? WHERE id = ?";
    global $pdo;
    $stmt = $pdo->prepare($sql);
    return $stmt->execute(array($name, $category, $price, $id));
  }

  public static function getMenu($id) {
    $sql_statement = <<<SQL
    SELECT
      id,
      name AS menu_name,
      category,
      price
    FROM menus
    WHERE id = ?
    SQL;
    global $pdo;
    $stmt = $pdo->prepare($sql_statement);
    $stmt->execute(array($id));
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }
}