<?php $view->extend('::admin.html.php') ?>
<?php $view['slots']->start('body') ?>
<div class="top_panel">
    <h1>Menus list <small>Добавить или редактировать адреса</small></h1>
    <ol class="breadcrumb">
		<li>
			<a href="<?php echo $view['router']->path('admin_show_people', array( 'id' => $person->getId() )) ?>">show</a>
        </li>
        <li>
            <a href="<?php echo $view['router']->path('admin_edit_people', array( 'id' => $person->getId() )) ?>">edit</a>
        </li>
		<li>
			<a href="<?php echo $view['router']->path('admin_delete_people', array( 'id' => $person->getId() )) ?>">delete</a>
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
						<td><?php echo $person->getId() ?></td>
					</tr>
					<tr>
						<th>Name</th>
						<td><?php echo $person->getName() ?></td>
					</tr>
					<tr>
						<th>Who</th>
						<td><?php echo $person->getWho() ?></td>
					</tr>
					<tr>
						<th>Name_ru</th>
						<td><?php echo $person->getNameru() ?></td>
					</tr>
					<tr>
						<th>Who_ru</th>
						<td><?php echo $person->getWhoru() ?></td>
					</tr>
					<tr>
						<th>Name_en</th>
						<td><?php echo $person->getNameen() ?></td>
					</tr>
					<tr>
						<th>Who_en</th>
						<td><?php echo $person->getWhoen() ?></td>
					</tr>
					<tr>
						<th>Foto</th>
						<td><img width="100%" class="margin-bottom-20" src="<?php echo $view['assets']->getUrl('uploads/foto_people/').$person->getFoto() ?>" alt="image"></td>
					</tr>
					<tr>
						<th>Mail</th>
						<td><?php echo $person->getMail() ?></td>
					</tr>
					<tr>
						<th>Phone</th>
						<td><?php echo $person->getPhone() ?></td>
					</tr>
					<tr>
						<th>Facebook</th>
						<td><?php echo $person->getFacebook() ?></td>
					</tr>
				</tbody>
			</table>
        </div>
    </div>
</div>
<?php $view['slots']->stop() ?>