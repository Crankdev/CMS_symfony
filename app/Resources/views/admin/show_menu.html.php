<?php $view->extend('::admin.html.php') ?>
<?php $view['slots']->start('body') ?>
<div class="top_panel">
    <h1>Menus list <small>Добавить или редактировать адреса</small></h1>
    <ol class="breadcrumb">
		<li>
			<a href="<?php echo $view['router']->path('admin_show_menu', array( 'id'=>  $menu->getId() )) ?>">show</a>
        </li>
        <li>
            <a href="<?php echo $view['router']->path('admin_edit_menu', array( 'id'=> $menu->getId() )) ?>">edit</a>
        </li>
		<li>
			<a href="<?php echo $view['router']->path('admin_delete_menu', array( 'id'=> $menu->getId() )) ?>">delete</a>
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
						<td><?php echo $menu->getId() ?></td>
					</tr>
					<tr>
						<th>Name</th>
						<td><?php echo $menu->getName() ?></td>
					</tr>
					<tr>
						<th>Name_ru</th>
						<td><?php echo $menu->getNameru() ?><td>
					</tr>
					<tr>
						<th>Name_en</th>
						<td><?php echo $menu->getNameen() ?></td>
					</tr>
					<tr>
						<th>Icon</th>
						<td><?php echo $menu->getIcon() ?></td>
					</tr>
					<tr>
						<th>Url</th>
						<td><?php echo $menu->getUrl() ?></td>
					</tr>
					<tr>
						<th>Is_activated</th>                   
						<td><?php  if ($menu->getIsactivated()) echo 'YES';
							    else echo 'NO'; ?>
						</td>
					</tr>
					<tr>
						<th>Title</th>
						<td><?php echo $menu->getTitle() ?></td>
					</tr>
					<tr>
						<th>Description</th>
						<td><?php echo $menu->getDescription() ?></td>
					</tr>
					<tr>
						<th>Keywords</th>
						<td><?php echo $menu->getKeywords() ?></td>
					</tr>
					<tr>
						<th>Title_ru</th>
						<td><?php echo $menu->getTitleru() ?></td>
					</tr>
					<tr>
						<th>Description_ru</th>
						<td><?php echo $menu->getDescriptionru() ?></td>
					</tr>
					<tr>
						<th>Keywords_ru</th>
						<td><?php echo $menu->getKeywordsru() ?></td>
					</tr>
					<tr>
						<th>Title_en</th>
						<td><?php echo $menu->getTitleen() ?></td>
					</tr>
					<tr>
						<th>Description_en</th>
						<td><?php echo $menu->getDescriptionen() ?></td>
					</tr>
					<tr>
						<th>Keywords_en</th>
						<td><?php echo $menu->getKeywordsen() ?></td>
					</tr>
				</tbody>
			</table>
        </div>
    </div>
</div>
<?php $view['slots']->stop() ?>