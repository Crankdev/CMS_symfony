<?php $view->extend('::admin.html.php') ?>
<?php $view['slots']->start('body') ?>
<div class="top_panel">
    <h1>Menus list <small>Добавить или редактировать меню</small></h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo $view['router']->path('admin_new_people') ?>">Create a new people</a>
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
					<th>Foto</th>
                    <th>Name</th>
                    <th>Name_ru</th>
                    <th>Name_en</th>
                    <th>Who</th>
					<th>Who_ru</th>
					<th>Who_en</th>
                    <th>Facebook</th>
                    <th>Phone</th>
                    <th>Mail</th>
					<th>Activities</th>
					<th>Action</th>
                </tr>
            </thead>
            <tbody>
			 <?php foreach( $peoples as $people ){ ?>
                <tr>
                    <td class="id"><a href="<?php echo $view['router']->path('admin_show_people', array( 'id' => $people->getId() )) ?>">
						<?php echo $people->getId() ?>
					</a></td>
					 <td><img width="100%" class="margin-bottom-20" src="<?php echo $view['assets']->getUrl('uploads/foto_people/').$people->getFoto() ?>" alt="image"></td>
                    <td><?php echo $people->getName() ?></td>
                    <td><?php echo $people->getNameru() ?></td>
                    <td><?php echo $people->getNameen() ?></td>
                    <td><?php echo $people->getWho() ?></td>
					<td><?php echo $people->getWhoru() ?></td>
					<td><?php echo $people->getWhoen() ?></td>
                    <td><?php echo $people->getFacebook() ?></td>
                    <td><?php echo $people->getPhone() ?></td>
                    <td><?php echo $people->getMail() ?></td>
                    <td><?php echo $people->getActivities() ?></td>
                    <td>
                        <ul>
                            <li>
                                <a href="<?php echo $view['router']->path('admin_show_people', array( 'id'=> $people->getId() )) ?>">show</a>
                            </li>
                            <li>
                                <a href="<?php echo $view['router']->path('admin_edit_people', array( 'id'=> $people->getId() )) ?>">edit</a>
                            </li>
							<li>
                                <a href="<?php echo $view['router']->path('admin_delete_people', array( 'id'=> $people->getId() )) ?>">delete</a>
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