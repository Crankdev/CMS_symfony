<?php $view->extend('::admin.html.php') ?>
<?php $view['slots']->start('body') ?>
<div class="top_panel">
    <h1>Menus list <small>Добавить или редактировать меню</small></h1>
    <ol class="breadcrumb">
        <li>
            <a class="btn btn-info btn-xs" href="<?php echo $view['router']->path('admin_new_people') ?>"><i class="fa fa-file"></i>Добавить</a>
            <button type="button" class="btn btn-default btn-xs" onclick="reload()"><i class="fa fa-refresh"></i> Обновить </button>
        </li>
    </ol>
</div>
<div class="admin-content">
    <div class="table-responsive">
        <div class="table table-bordered table-hover tablesorter">
        <table>
            <thead>
                <tr class="table-bordered">
                    <th class="table-bordered" width="30" class="header">ID <i class="fa fa-sort"></i></th>
					<th width="150" class="table-bordered">Foto</th>
                    <th width="150" class="table-bordered">Name<br>Name_ru<br>Name_en</th>
                    <th class="table-bordered">Who</th>
					<th class="table-bordered">Who_ru</th>
					<th class="table-bordered">Who_en</th>
                    <th class="table-bordered">Facebook</th>
                    <th class="table-bordered">Phone</th>
                    <th class="table-bordered">Mail</th>
					<th class="table-bordered">Activities</th>
					<th class="table-bordered">Action</th>
                </tr>
            </thead>
            <tbody>
			 <?php foreach( $peoples as $people ){ ?>
                <tr>
                    <td class="table-bordered" class="id"><a href="<?php echo $view['router']->path('admin_edit_people', array( 'id' => $people->getId() )) ?>">
						<?php echo $people->getId() ?>
					</a></td>
					 <td class="table-bordered"><img width="100%" class="margin-bottom-20" src="<?php echo $view['assets']->getUrl('uploads/foto_people/').$people->getFoto() ?>" alt="image"></td>
                    <td class="table-bordered"><?php echo $people->getName()."<br>".$people->getNameru()."<br>".$people->getNameen() ?></td>
                    <td class="table-bordered"><?php echo $people->getWho() ?></td>
					<td class="table-bordered"><?php echo $people->getWhoru() ?></td>
					<td class="table-bordered"><?php echo $people->getWhoen() ?></td>
                    <td class="table-bordered"><?php echo $people->getFacebook() ?></td>
                    <td class="table-bordered"><?php echo $people->getPhone() ?></td>
                    <td class="table-bordered"><?php echo $people->getMail() ?></td>
                    <td class="table-bordered"><?php echo $people->getActivities() ?></td>
                    <td class="table-bordered">
                        <ul>
                            <a href="<?php echo $view['router']->path('admin_edit_people', array( 'id'=> $people->getId() )) ?>">edit</a>
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