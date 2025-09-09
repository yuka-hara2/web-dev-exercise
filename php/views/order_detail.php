
<h1>Order Detail</h1>

<dl>
  <dt>Order ID</dt>
  <dd><?= h($order['id']) ?></dd>

  <dt>Order Datetime</dt>
  <dd><?= h($order['order_at']) ?></dd>

  <dt>Customer Name</dt>
  <dd><?= h($order['customer_name']) ?></dd>

  <dt>Menu</dt>
  <dd><?= h($order['menu_name']) ?></dd>

  <dt>Qty.</dt>
  <dd><?= h($order['quantity']) ?></dd>

  <dt>Price</dt>
  <dd><?= h($order['price']) ?> Riel</dd>
</dl>
