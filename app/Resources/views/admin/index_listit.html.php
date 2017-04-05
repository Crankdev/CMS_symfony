<?php $view->extend('::admin.html.php') ?>
<?php $view['slots']->start('body') ?>
<div class="top_panel">
    <h1>Menus list <small>Добавить или редактировать меню</small></h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo $view['router']->path('admin_new_menu') ?>">Create a new menu</a>
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
					<th>Name_ru</th>
					<th>Name_en</th>
					<th>About</th>
					<th>About_ru</th>
					<th>About_en</th>
					<th>Locales</th>
					<th>Url</th>
					<th>Is_activated</th>
					<th>Foto</th>
					<th>Actions</th>
                </tr>
            </thead>
            <tbody>
			 <?php foreach( $listits as $listit ){ ?>
                <tr>
                    <td class="id"><a href="<?php echo $view['router']->path('admin_show_menu', array( 'id' => $listit->getId() )) ?>">
						<?php echo $listit->getId() ?>
					</a></td>
                    <td><?php echo $listit->getName() ?></td>
                    <td><?php echo $listit->getNameru() ?></td>
                    <td><?php echo $listit->getNameen() ?></td>
					<td><?php echo $listit->getAbout() ?></td>
                    <td><?php echo $listit->getAboutru() ?></td>
                    <td><?php echo $listit->getAbouten() ?></td>
                    <td><?php echo $listit->getLocales() ?></td>
                    <td><?php echo $listit->getUrl() ?></td>
                    <td><?php   if ($listit->getIsactivated())echo 'YES';
								else echo 'NO';
						?></td>
                    <td><?php echo $listit->getFoto() ?></td>
                    <td>
                        <ul>
                            <li>
                                <a href="<?php echo $view['router']->path('admin_show_listit', array( 'id'=> $listit->getId() )) ?>">show</a>
                            </li>
                            <li>
                                <a href="<?php echo $view['router']->path('admin_edit_listit', array( 'id'=> $listit->getId() )) ?>">edit</a>
                            </li>
							<li>
                                <a href="<?php echo $view['router']->path('admin_delete_listit', array( 'id'=> $listit->getId() )) ?>">delete</a>
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