
<?php
  $oldCategory = $old['category'] ?? '';
  $id = $old['id'] ?? '';
?>

<?php if (empty($id)) : ?>
  <h1>New Menu</h1>
<?php else : ?>
  <h1>Edit Menu</h1>
<?php endif; ?>

<?php if (!empty($errors)) : ?>
  <ul style="color: red;">
    <?php foreach ($errors as $error) : ?>
      <li><?= htmlspecialchars($error) ?></li>
    <?php endforeach; ?>
  </ul>
<?php endif; ?>

<?php if (empty($id)) : ?>
  <form action="create_menu" method="post">
<?php else : ?>
  <form action="update_menu" method="post">
<?php endif; ?>
  <input type="hidden" name="id" value="<?= h($id) ?>" />
  <div>
    <label>Menu Name</label>
    <input type="text" name="menu_name" value="<?= h($old['menu_name'] ?? '') ?>" />
  </div>

  <div>
    <label>Category</label>
    <select name="category" >
      <option value="" <?= empty($oldCategory) ? "selected" : "" ?>>Choose a category</option>
      <option value=1 <?= ($oldCategory === 1) ? "selected" : "" ?>>Drink</option>
      <option value=2 <?= ($oldCategory === 2) ? "selected" : "" ?>>Cake</option>
      <option value=3 <?= ($oldCategory === 3) ? "selected" : "" ?>>Bread</option>
    </select>
  </div>

  <div>
    <label>Price</label>
    <input type="number" name="price" value="<?= h($old['price'] ?? '') ?>"  />
  </div>

  <div>
    <button type="submit"><?= empty($id) ? "Create" : "Edit" ?></button>
    <a href="menu_list" class="button">Back to Menu List</a>
  </div>
</form>