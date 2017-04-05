<?php $view->extend('::admin.html.php') ?>

<?php $view['slots']->start('body') ?>
<div class="top_panel">
    <h1>Menus list <small>Добавить или редактировать меню</small></h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo $view['router']->path('admin_new_foto') ?>">Create a new menu</a>
            <button type="button" class="btn btn-info btn-xs" onclick="newRow()"><i class="fa fa-file"></i> Добавить</button>
            <button type="button" class="btn btn-default btn-xs" onclick="reload()"><i class="fa fa-refresh"></i> Обновить </button>
        </li>
    </ol>
</div>
<div class="admin-content">
    <div class="table-responsive">
        <div class="table table-bordered table-hover tablesorter">
        <table>
            <thead>
                <tr>
					<th width="70" class="header">ID <i class="fa fa-sort"></i></th>
					<th>Name</th>
					<th>Foto</th>
					<th>size_x</th>
					<th>size_y</th>
					<th>active</th>
				</tr>
            </thead>
            <tbody>
			 <?php foreach($fotos as $foto){ ?>
                <tr>
                    <td class="id"><a href="<?php echo $view['router']->path('admin_show_foto', array( 'id'=> $foto->getId()  )) ?>">
						<?php echo $foto->getId()  ?>
					</a></td>
					<td><?php echo $foto->getName()  ?></td>
					<td><img src="<?php echo $view['assets']->getUrl('uploads/imeges/').$foto->getName()  ?>"  width="30%"></td>
					<td><?php echo $foto->getSizex()  ?></td>
					<td><?php echo $foto->getSizey()  ?></td>
					<td><?php echo $foto->getActivities()  ?></td>
                    <td>
                        <ul>
                            <li>
                                <a href="<?php echo $view['router']->path('admin_show_foto', array( 'id'=> $foto->getId()  )) ?>">show</a>
                            </li>
                            <li>
                                <a href="<?php echo $view['router']->path('admin_edit_foto', array( 'id'=> $foto->getId()  )) ?>">edit</a>
                            </li>
							<li>
                                <a href="<?php echo $view['router']->path('admin_delete_foto', array( 'id'=> $foto->getId()  )) ?>">delete</a>
                            </li>
                        </ul>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
        </div>
    </div>
</div>
<?php $view['slots']->stop() ?>