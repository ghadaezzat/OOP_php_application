<div>
    <?php if (isset($SESSION['is_looged_in'])) :?>
    <a class="btn btn-success btn-share" href="<?= ROOT_PATH; ?>/shares/add">
        add share
    </a>
    <?php endif ?>
    <?php foreach($viewmodel as $item) :?>
    <div class="well">
        <h2><?= $item['title']?></h2>
        <small><?= $item['date']?></small>
        <hr/>
        <p><?= $item['text']?></p>
    </div>
    <?php endforeach; ?>
</div>