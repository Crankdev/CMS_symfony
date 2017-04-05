<?php $view->extend('::admin.html.php') ?>
<?php $view['slots']->start('body') ?>
<div class="top_panel">
    <h1>Menus list <small>Добавить или редактировать меню</small></h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo $view['router']->path('admin_new_activity') ?>">Create a new menu</a>
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
                    <th>Url</th>
                    <th>Is_activated</th>
                    <th>updated_at</th>
                    <th>created_at</th>
                    <th>Project</th>
					<th>Action</th>
                </tr>
            </thead>
            <tbody>
			 <?php foreach( $activities as $activitie ){ ?>
                <tr>
                    <td class="id"><a href="<?php echo $view['router']->path('admin_show_activity', array( 'id' => $activitie->getId() )) ?>">
						<?php echo $activitie->getId() ?>
					</a></td>
                    <td><?php echo $activitie->getName() ?></td>
                    <td><?php echo $activitie->getNameru() ?></td>
                    <td><?php echo $activitie->getNameen() ?></td>
                    <td><?php echo $activitie->getAbout() ?></td>
					<td><?php echo $activitie->getAboutru() ?></td>
					<td><?php echo $activitie->getAbouten() ?></td>
                    <td><?php echo $activitie->getUrl() ?></td>
                    <td><?php   if ($activitie->getIsactivated())echo 'YES';
								else echo 'NO';
						?></td>
                    <td><?php //echo $activitie->getUpdatedat()?></td>
                    <td><?php //echo $activitie->getCreatedat()?></td>
                    <td><?php echo $activitie->getProject() ?></td>
                    <td>
                        <ul>
                            <li>
                                <a href="<?php echo $view['router']->path('admin_show_activity', array( 'id'=> $activitie->getId() )) ?>">show</a>
                            </li>
                            <li>
                                <a href="<?php echo $view['router']->path('admin_edit_activity', array( 'id'=> $activitie->getId() )) ?>">edit</a>
                            </li>
							<li>
                                <a href="<?php echo $view['router']->path('admin_delete_activity', array( 'id'=> $activitie->getId() )) ?>">delete</a>
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