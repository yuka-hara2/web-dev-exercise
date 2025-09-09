<?php

class Order {
  public static function searchOrders($conds) {
    $sql_statement = <<<SQL
      SELECT
        orders.id AS id,
        order_at,
        customers.name AS customer_name
      FROM orders
      INNER JOIN customers ON customers.id = customer_id
    SQL;

    global $pdo;
    if (!empty($conds) && !empty($conds['cond_date'])) {
      $sql_statement .= " WHERE order_at > ? and order_at < ?";
      $stmt = $pdo->prepare($sql_statement);
      $cond_datetime = new DateTime($conds['cond_date'] . " 00:00:00");
      $stmt->execute(array($cond_datetime->format("Y-m-d H:i:s"), $cond_datetime->modify('+1 day')->format("Y-m-d H:i:s")));
    } else {
      $stmt = $pdo->query($sql_statement);
    }
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public static function getOrder($id) {
    $sql_statement = <<<SQL
      SELECT
        orders.id AS id,
        order_at,
        customers.name AS customer_name,
        menus.name AS menu_name,
        quantity,
        price
      FROM orders
      INNER JOIN menus ON menus.id = menu_id
      INNER JOIN customers ON customers.id = customer_id
      WHERE orders.id = ?;
    SQL;

    global $pdo;
    $stmt = $pdo->prepare($sql_statement);
    $stmt->execute(array($id));
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }
}