<?php
if (isset($current_user)):
    ?>
    <section id="secondary_bar">
        <div class="user">
            <p><?= $current_user['nombre'] . ' ' . $current_user['apellido'] ?></p>
            <!-- <a class="logout_user" href="#" title="Logout">Logout</a> -->
        </div>
        <div class="breadcrumbs_container">
            <article class="breadcrumbs"><?= $this->Html->link('Panel Principal', ['controller' => 'Users', 'action' => 'home']) ?><div class="breadcrumb_divider"></div> <a class="current"><?= $this->fetch('title') ?></a></article>
        </div>
    </section><!-- end of secondary bar -->

    <aside id="sidebar" class="column">
        <form class="quick_search">
            <input type="text" value="Quick Search" onfocus="if (!this._haschanged) {
                            this.value = ''
                        }
                        ;
                        this._haschanged = true;">
        </form>
        <hr/>
        <h3>Contenido</h3>
        <ul class="toggle">
            <li class = "icn_tags"><?= $this->Html->Link('Mis Bookmarks', ['controller' => 'Bookmarks', 'action' => 'index']); ?></li>
            <?php
            if ($current_user['role'] === 'admin'):
                ?>
                <li class = "icn_tags"><?= $this->Html->Link('Todos los Bookmarks', ['controller' => 'Bookmarks', 'action' => 'viewall']); ?></li>
                <?php
            endif;
            ?>
            <li class = "icn_new_article"><?= $this->Html->Link('Crear Bookmark', ['controller' => 'Bookmarks', 'action' => 'add']); ?></li>
            <li class = "icn_edit_article"><a href = "#">Editar Bookmark</a></li>
            <li class = "icn_alert_error"><a href = "#">Eliminar Bookmark</a></li>
        </ul>
        <?php
        if (isset($current_user) and $current_user['role'] == 'admin'):
            ?>
            <h3>Users</h3>
            <ul class="toggle">
                <li class = "icn_add_user"><?= $this->Html->Link('Crear Usuario', ['controller' => 'Users', 'action' => 'add']); ?></li>
                <li class = "icn_view_users"><?= $this->Html->Link('Listar Usuarios', ['controller' => 'Users', 'action' => 'index']); ?></li>
            </ul>
        <?php endif ?>
        <h3><?= $current_user['role']; ?></h3>
        <ul class="toggle">
            <?php
            if (isset($current_user) and $current_user['role'] == 'admin'):
                ?>
                <li class="icn_settings"><a href="#">Opciones</a></li>
                <li class="icn_security"><a href="#">Seguridad</a></li>
            <?php endif ?>
            <li class="icn_jump_back"><?= $this->Html->link('Salir', ['controller' => 'Users', 'action' => 'logout']) ?></li>
        </ul>

        <footer>
            <br />
            <br />
            <br />

        </footer>
    </aside><!-- end of sidebar -->
    <?php

















 endif ?>