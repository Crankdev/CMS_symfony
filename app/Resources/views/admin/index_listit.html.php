<?php $view->extend('::admin.html.php') ?>
<?php $view['slots']->start('body') ?>
<div class="top_panel">
    <h1>Menus list <small>Добавить или редактировать меню</small></h1>
    <ol class="breadcrumb">
        <li>
            <a class="btn btn-info btn-xs" href="<?php echo $view['router']->path('admin_new_listit') ?>"><i class="fa fa-file"></i>Добавить</a>
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
                    <th class="table-bordered">Name<br>Name_ru<br>Name_en</th>
					<th class="table-bordered">About</th>
					<th class="table-bordered">About_ru</th>
					<th class="table-bordered">About_en</th>
					<!--th>Locales</th-->
					<th class="table-bordered">Url</th>
					<th class="table-bordered">Is_activated</th>
					<th class="table-bordered" width="240">Foto</th>
					<th class="table-bordered">Actions</th>
                </tr>
            </thead>
            <tbody>
			 <?php foreach( $listits as $listit ){ ?>
                <tr>
                    <td class="table-bordered" class="id"><a href="<?php echo $view['router']->path('admin_edit_listit', array( 'id' => $listit->getId() )) ?>">
						<?php echo $listit->getId() ?>
					</a></td>
                    <td class="table-bordered"><?php echo $listit->getName()."<br>".$listit->getNameru()."<br>".$listit->getNameen() ?><br></td>
					<td class="table-bordered"><?php echo $listit->getAbout() ?></td>
                    <td class="table-bordered"><?php echo $listit->getAboutru() ?></td>
                    <td class="table-bordered"><?php echo $listit->getAbouten() ?></td>
                    <!--td><?php //echo $listit->getLocales() ?></td-->
                    <td class="table-bordered"><?php echo $listit->getUrl() ?></td>
                    <td class="table-bordered"><?php   if ($listit->getIsactivated())echo 'YES';
								else echo 'NO';
						?></td>
                    <td class="table-bordered"><img src="<?php echo $view['assets']->getUrl('uploads/imeges_list/').$listit->getFoto()  ?>"  width="80%"></td>
                    <td class="table-bordered">
                        <a href="<?php echo $view['router']->path('admin_edit_listit', array( 'id'=> $listit->getId() )) ?>">edit</a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
        </div>
    </div>
</div>
<?php $view['slots']->stop() ?>