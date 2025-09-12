<?php

function h($s) {
  if (empty($s)) return null;
  return htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
}

function render($view, $params = []) {
    extract($params);

    ob_start();
    require __DIR__ . "/$view.php";
    $content = ob_get_clean();

    require __DIR__ . "/layout.php";
}