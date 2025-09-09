
<h1>Menu List</h1>

<?= $message ?? '' ?>

<table>
  <thead>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Category</th>
      <th tab=2>Price</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($menus as $menu): ?>
      <tr>
        <td><?= h($menu->id) ?></td>
        <td><?= h($menu->name) ?></td>
        <td><?= h($menu->category->label()) ?></td>
        <td><?= h($menu->price) ?> Riel</td>
        <td><a href="/edit_menu?id=<?= h($menu->id) ?>">Edit</a></td>
      </tr>
    <?php endforeach; ?>
  </tbody>