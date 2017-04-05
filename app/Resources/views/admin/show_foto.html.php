<?php $view->extend('::admin.html.php') ?>
<?php $view['slots']->start('body') ?>
<div class="top_panel">
    <h1>Menus list <small>Добавить или редактировать адреса</small></h1>
    <ol class="breadcrumb">
		<li>
			<a href="<?php echo $view['router']->path('admin_index_foto', array( 'id': echo $foto->id )) ?>">show</a>
        </li>
        <li>
            <a href="<?php echo $view['router']->path('admin_edit_foto', array( 'id': echo $foto->id )) ?>">edit</a>
        </li>
		<li>
			<a href="<?php echo $view['router']->path('admin_delete_foto', array( 'id': echo $foto->id )) ?>">delete</a>
        </li>
        <li>
            <button type="button" class="btn btn-info btn-xs" onclick="newRow()"><i class="fa fa-file"></i> Добавить</button>
            <button type="button" class="btn btn-default btn-xs" onclick="reload()"><i class="fa fa-refresh"></i> Обновить </button>
        </li>
    </ol>
</div>
<div class="admin-content">
    <div class="table-responsive">
        <div class="table table-bordered table-hover tablesorter">
            <h1>Menu</h1>
			<table>
				<tbody>
					<tr>
						<th>Id</th>
						<td><?php echo $foto->id ?></td>
					</tr>
					<tr>
						<th>Name</th>
						<td><?php echo $foto->name ?></td>
					</tr>
					<tr>
						<th>Foto</th>
						<td><img src="<?php echo $view['assets']->getUrl('uploads/imeges/').$foto->name ?>"  width="30%"></td>
					</tr>

					<tr>
						<th>sizex</th>
						<td><?php echo $foto->sizex ?></td>
					</tr>
					<tr>
						<th>sizey</th>
						<td><?php echo $foto->sizey ?></td>
					</tr>
					<tr>
						<th>activety</th>
						<td><?php echo $foto->activities ?></td>
					</tr>
				</tbody>
			</table>
        </div>
    </div>
</div>
<?php $view['slots']->stop() ?>