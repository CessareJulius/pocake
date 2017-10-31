<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="page-header">
            <h2>Crear Enlace</h2>
        </div>
        <?= $this->Form->create($bookmark) ?>
        <fieldset>
            <?= $this->element('bookmarks/Fields') ?>
        </fieldset>
        <?php
        echo $this->Form->button("Crear Enlace", ['Class' => 'btn btn-success']);
        echo $this->Form->end();
        ?>
    </div>
</div>

