<?php

function h($s) {
  if (empty($s)) return null;
  return htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
}