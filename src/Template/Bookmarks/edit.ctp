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
        echo $this->Form->button("Editar Enlace", ['Class' => 'btn btn-success']);
        echo "&nbsp;&nbsp;";
        echo $this->Html->Link("Volver",['action' => 'index'], ['Class' => 'btn btn-primary']);
        echo $this->Form->end();
        ?>
    </div>
</div>