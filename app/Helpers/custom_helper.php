<?php
function countData($table) {
  $db = \Config\Database::connect();
  return $db->table($table)->countAllResults();
}

// function countData($cart) {
//   $cart = \Config\Services::cart();
//   return $cart->contents($cart)->countAllResults();
// }

 ?>
