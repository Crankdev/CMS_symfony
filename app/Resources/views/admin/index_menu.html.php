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
                    <th>Icon</th>
                    <th>Url</th>
                    <th>Is_activated</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Keywords</th>
                    <th>Title_ru</th>
                    <th>Description_ru</th>
                    <th>Keywords_ru</th>
                    <th>Title_en</th>
                    <th>Description_en</th>
                    <th>Keywords_en</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
			 <?php foreach( $menus as $menu ){ ?>
                <tr>
                    <td class="id"><a href="<?php echo $view['router']->path('admin_show_menu', array( 'id' => $menu->getId() )) ?>">
						<?php echo $menu->getId() ?>
					</a></td>
                    <td><?php echo $menu->getName() ?></td>
                    <td><?php echo $menu->getNameru() ?></td>
                    <td><?php echo $menu->getNameen() ?></td>
                    <td><?php echo $menu->getIcon() ?></td>
                    <td><?php echo $menu->getUrl() ?></td>
                    <td><?php   if ($menu->getIsactivated())echo 'YES';
								else echo 'NO';
						?></td>
                    <td><?php echo $menu->getTitle() ?></td>
                    <td><?php echo $menu->getDescription() ?></td>
                    <td><?php echo $menu->getKeywords() ?></td>
                    <td><?php echo $menu->getTitleru() ?></td>
                    <td><?php echo $menu->getDescriptionru() ?></td>
                    <td><?php echo $menu->getKeywordsru() ?></td>
                    <td><?php echo $menu->getTitleen() ?></td>
                    <td><?php echo $menu->getDescriptionen() ?></td>
                    <td><?php echo $menu->getKeywordsen() ?></td>
                    <td>
                        <ul>
                            <li>
                                <a href="<?php echo $view['router']->path('admin_show_menu', array( 'id'=> $menu->getId() )) ?>">show</a>
                            </li>
                            <li>
                                <a href="<?php echo $view['router']->path('admin_edit_menu', array( 'id'=> $menu->getId() )) ?>">edit</a>
                            </li>
							<li>
                                <a href="<?php echo $view['router']->path('admin_delete_menu', array( 'id'=> $menu->getId() )) ?>">delete</a>
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