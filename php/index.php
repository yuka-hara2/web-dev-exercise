<?php

require_once 'config.php';
require_once 'views/_helpers.php';
require_once 'models/menu.php';
require_once 'models/order.php';
require_once 'controllers/menu.php';

switch ($_SERVER['PATH_INFO'] ?? $_SERVER['REQUEST_URI']) {
  case '/':
    include 'views/home.php';
    break;

  case '/home':
    include 'views/home.php';
    break;
  
  case '/menu_list':
    $menus = Menu::getAll();
    // include 'views/menu_list.php';
    render('menu_list', ['menus' => $menus]);
    break;

  case '/order_list':
    $orders = Order::searchOrders($_GET);
    $cond_date = null;
    if (!empty($_GET) && !empty($_GET['cond_date'])) {
      $cond_date = $_GET['cond_date'];
    }
    include 'views/order_list.php';
    break;

  case '/order_detail':
    if (empty($_GET['id'])) echo "Bad Request";

    $order = Order::getOrder($_GET['id']);
    if (empty($order)) echo "Bad Request";

    include 'views/order_detail.php';
    break;

  case '/new_menu':
    include 'views/form_menu.php';
    break;

  case '/create_menu':
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $controller = new MenuController();
      $controller->createMenu($_POST);
    } else {
      echo "Bad Request";
    }
    break;

  case '/edit_menu';
    $old = Menu::getMenu($_GET['id']);
    include 'views/form_menu.php';
    break;

  case '/update_menu':
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $controller = new MenuController();
      $controller->updateMenu($_POST);
    } else {
      echo "Bad Request";
    }
    break;

  default:
    echo "Page not found";
    break;
}