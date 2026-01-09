
<h1>Menu List</h1>

<?= $message ?? '' ?>

<a href="new_menu" class="button">Add Menu</a>
<a href="/" class="button">Top</a>
<table>
  <thead>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Category</th>
      <th>Price</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($menus as $menu): ?>
      <tr>
        <td><?= h($menu->id) ?></td>
        <td><?= h($menu->name) ?></td>
        <td><?= h($menu->category->label()) ?></td>
        <td><?= h($menu->price) ?> Riel</td>
        <td><a href="/edit_menu?id=<?= h($menu->id) ?>" class="button">Edit</a></td>
      </tr>
    <?php endforeach; ?>
  </tbody>