<div class="row">
    <div class="col-md-12">
        <div class="page-header">
            <h2><center>Usuarios</center></h2>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="thead-default">
                    <tr>
                        <th scope="col"><?= $this->Paginator->sort('id', 'Nro') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('nombre') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('apellido') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('email', 'Correo Electronico') ?></th>
                        <th scope="col" class="actions"><?= __('Acciones') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= $this->Number->format($user->id) ?></td>
                        <td><?= h($user->nombre) ?></td>
                        <td><?= h($user->apellido) ?></td>
                        <td><?= h($user->email) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('Ver'), ['action' => 'view', $user->id], ['Class' => 'btn btn-sm btn-info']) ?>
                            <?= $this->Html->link(__('Editar'), ['action' => 'edit', $user->id], ['Class' => 'btn btn-sm btn-success']) ?>
                            <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $user->id],['Class' => 'btn btn-sm btn-danger'], ['confirm' => __('Esta seguro que desea borrar este usuario # {0}?', $user->id)]) ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
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

