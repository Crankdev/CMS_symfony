<?php $view->extend('::admin.html.php') ?>
<?php $view['slots']->start('body') ?>
<div class="top_panel">
    <h1>Menus list <small>Добавить или редактировать меню</small></h1>
    <ol class="breadcrumb">
        <li>
            <a class="btn btn-info btn-xs" href="<?php echo $view['router']->path('admin_new_menu') ?>"><i class="fa fa-file"></i>Добавить</a>
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
                    <th class="table-bordered"  width="30" class="header">ID <i class="fa fa-sort"></i></th>
                    <th class="table-bordered" >Name<br>Name_ru<br>Name_en</th>
                    <th class="table-bordered" >Icon</th>
                    <th class="table-bordered" >Url</th>
                    <th class="table-bordered" >Is_activated</th>
                    <th class="table-bordered" >Title<br>Title_ru<br>Title_en</th>
                    <th class="table-bordered" >Description</th>
                    <th class="table-bordered" >Keywords</th>
                    <th class="table-bordered" >Description_ru</th>
                    <th class="table-bordered" >Keywords_ru</th>
                    <th class="table-bordered" >Description_en</th>
                    <th class="table-bordered" class="table-bordered" >Keywords_en</th>
                    <th class="table-bordered" >Actions</th>
                </tr>
            </thead>
            <tbody>
			 <?php foreach( $menus as $menu ){ ?>
                <tr>
                    <td class="table-bordered"  class="id"><a href="<?php echo $view['router']->path('admin_edit_menu', array( 'id' => $menu->getId() )) ?>">
						<?php echo $menu->getId() ?>
					</a></td>
                    <td class="table-bordered" ><?php echo $menu->getName()."<br>".$menu->getNameru()."<br>".$menu->getNameen() ?></td>
                    <td class="table-bordered" ><?php echo $menu->getIcon() ?></td>
                    <td class="table-bordered" ><?php echo $menu->getUrl() ?></td>
                    <td class="table-bordered" ><?php   if ($menu->getIsactivated())echo 'YES';
								else echo 'NO';
						?></td>
                    <td class="table-bordered" ><?php echo $menu->getTitle()."<br><br>". $menu->getTitleru()."<br><br>".$menu->getTitleen() ?></td>
                    <td class="table-bordered"><?php echo $menu->getDescription() ?></td>
                    <td class="table-bordered"><?php echo $menu->getKeywords() ?></td>
                    <td class="table-bordered"><?php echo $menu->getDescriptionru() ?></td>
                    <td class="table-bordered"><?php echo $menu->getKeywordsru() ?></td>
                    <td class="table-bordered"><?php echo $menu->getDescriptionen() ?></td>
                    <td class="table-bordered"><?php echo $menu->getKeywordsen() ?></td>
                    <td class="table-bordered">
                       <a href="<?php echo $view['router']->path('admin_edit_menu', array( 'id'=> $menu->getId() )) ?>">edit</a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
        </div>
    </div>
</div>
<?php $view['slots']->stop() ?>