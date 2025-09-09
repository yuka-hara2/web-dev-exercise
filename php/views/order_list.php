
<h1>Order List</h1>

<form action="order_list" method="get">
  <input type="date" name="cond_date" value=<?= h($cond_date) ?> />
  <button type="submit">search</button>
</form>

<table>
  <thead>
    <tr>
      <th>ID</th>
      <th>Order Datetime</th>
      <th>Customer Name</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($orders as $order): ?>
      <tr>
        <td><a href="/order_detail?id=<?= h($order['id']) ?>"><?= h($order['id']) ?></a></td>
        <td><?= h($order['order_at']) ?></td>
        <td><?= h($order['customer_name']) ?></td>
      </tr>
    <?php endforeach; ?>
  </tbody>