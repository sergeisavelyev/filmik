<div class="content-wrapper">
    <div class="container-fluid">
        <?php if (empty($film_data)) : ?>
            <p>Список фильмов пуст</p>
        <?php else : ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Название</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Год</th>
                        <th scope="col">Описание</th>
                        <th scope="col">Категория</th>
                        <th scope="col">Изображение</th>
                        <th scope="col">Действия</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($film_data as $film) : ?>
                        <tr id="<?php echo $film['id']; ?>">
                            <th scope="row"><?php echo $film['id']; ?></th>
                            <td><?php echo $film['title']; ?></td>
                            <td><?php echo $film['slug']; ?></td>
                            <td><?php echo $film['date']; ?></td>
                            <td><?php echo mb_strimwidth($film['content'], 0, 100, "..."); ?></td>
                            <td><?php echo $film['category_id']; ?></td>
                            <td><?php echo $film['img']; ?></td>
                            <td>
                                <i class="edit-film fa-regular fa-pen-to-square mx-2" id="<?php echo $film['id']; ?>"></i>
                                <i class="delete-film fa-solid fa-trash-can" id="<?php echo $film['id']; ?>"></i>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</div>