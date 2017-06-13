<?php $view->extend('::admin.html.php') ?>

<?php $view['slots']->start('body') ?>
<div class="top_panel">
    <h1>Foto list <small>Добавить или редактировать фото</small></h1>
    <ol class="breadcrumb">
        <li>
            <a class="btn btn-info btn-xs" href="<?php echo $view['router']->path('admin_new_foto') ?>"><i class="fa fa-file"></i>Добавить</a>
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
					<th class="table-bordered" width="30" class="header">ID <i class="fa fa-sort"></i></th>
					<th class="table-bordered">Name</th>
					<th class="table-bordered">Foto</th>
					<th class="table-bordered">size_x</th>
					<th class="table-bordered">size_y</th>
					<th class="table-bordered">activitie</th>
                    <th class="table-bordered">action</th>
				</tr>
            </thead>
            <tbody>
			 <?php foreach($fotos as $foto){ ?>
                <tr>
                    <td class="table-bordered" class="id">
                        <a href="<?php echo $view['router']->path('admin_edit_foto', array( 'id'=> $foto->getId()  )) ?>">
						    <?php echo $foto->getId()  ?>
					    </a>
                    </td>
					<td class="table-bordered"><?php echo $foto->getName()  ?></td>
					<td class="table-bordered"><img src="<?php echo $view['assets']->getUrl('uploads/imeges/').$foto->getName()  ?>"  width="30%"></td>
					<td class="table-bordered"><?php echo $foto->getSizex()  ?></td>
					<td class="table-bordered"><?php echo $foto->getSizey()  ?></td>
					<td class="table-bordered"><?php echo $foto->getActivities()  ?></td>
                    <td class="table-bordered">
                        <a href="<?php echo $view['router']->path('admin_edit_foto', array( 'id'=> $foto->getId()  )) ?>">edit</a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
        </div>
    </div>
</div>
<?php $view['slots']->stop() ?>