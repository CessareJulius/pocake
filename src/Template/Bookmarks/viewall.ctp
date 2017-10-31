<div class="row">
    <div class="col-md-12">
        <div class="page-header">
            <h2><center>Lista de Todos Los Bookmarks</center></h2>
        </div>
        <ul class="list-group">
            <?php foreach ($bookmarks as $bookmark): ?>
                <li class="list-group-item">
                    <h4 class="list-group-item-heading"><?= h($bookmark->title) ?></h4>
                    <p>
                        <strong class="text-info">
                            <small>
                                <?= $this->HTML->Link($bookmark->url, null, ['target' => 'blank']) ?>
                            </small>
                        </strong>
                    </p>
                    <p class="list-group-item-text">
                        <?= h($bookmark->descripcion) ?>
                    </p>
                </li>
            <?php endforeach ?>
        </ul>
        <div class="paginator">
            <center>
                <ul class="pagination">
                    <?= $this->Paginator->prev('< ' . __('Anterior')) ?>
                    <?= $this->Paginator->numbers(['before' => '', 'after' => '']) ?>
                    <?= $this->Paginator->next(__('Siguiente') . ' >') ?>
                </ul>
                <p><?= $this->Paginator->counter(['format' => __('Pagina {{page}} de {{pages}}, total de resultados: {{count}}')]) ?></p>
            </center>
        </div>
    </div>
</div>
