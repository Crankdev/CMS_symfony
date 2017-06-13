<?php $view->extend('::admin.html.php') ?>
<?php $view['slots']->start('body') ?>
<div class="top_panel">
    <h1>Activit list <small>Добавить или редактировать події</small></h1>
    <ol class="breadcrumb">
        <li>
            <a class="btn btn-info btn-xs" href="<?php echo $view['router']->path('admin_new_activity') ?>"><i class="fa fa-file"></i>Добавить</a>
            <button type="button" class="btn btn-default btn-xs" onclick="reload()"><i class="fa fa-refresh"></i> Обновить </button>
        </li>
    </ol>
</div>
<div class="admin-content">
    <div class="table-responsive">
        <div class="table table-bordered table-hover tablesorter">
        <table>
            <thead class="table-bordered">
                <tr class="table-bordered">
                    <th width="30" class="header" >ID <i class="fa fa-sort"></i></th>
                    <th class="table-bordered">Name<br>Name_ru<br>Name_en</th>
                    <th class="table-bordered">About</th>
					<th class="table-bordered">About_ru</th>
					<th class="table-bordered">About_en</th>
                    <!--th class="table-bordered">Url</th-->
                    <th class="table-bordered">Is_activated</th>
                    <!--th class="table-bordered">updated_at</th-->
                    <!--th class="table-bordered">created_at</th-->
                    <th class="table-bordered">Project</th>
					<th class="table-bordered">Action</th>
                </tr>
            </thead>
            <tbody>
			 <?php foreach( $activities as $activitie ){ ?>
                <tr class="table-bordered">
                    <td class="id"><a href="<?php echo $view['router']->path('admin_edit_activity', array( 'id' => $activitie->getId() )) ?>">
						<?php echo $activitie->getId() ?>
					</a></td>
                    <td class="table-bordered"><?php echo $activitie->getName().'<br><br>'.$activitie->getNameru().'<br><br>'.$activitie->getNameen() ?></td>
                    <td class="table-bordered"><?php echo $activitie->getAbout() ?></td>
					<td class="table-bordered"><?php echo $activitie->getAboutru() ?></td>
					<td class="table-bordered"><?php echo $activitie->getAbouten() ?></td>
                    <!--td class="table-bordered"><?php //echo $activitie->getUrl() ?></td-->
                    <td class="table-bordered"><?php   if ($activitie->getIsactivated())echo 'YES';
								else echo 'NO';
						?></td>
                    <!--td><?php //echo $activitie->getUpdatedat()?></td-->
                    <!--td><?php //echo $activitie->getCreatedat()?></td-->
                    <td class="table-bordered"><?php echo $activitie->getProject() ?></td>
                    <td class="table-bordered">
                       <a href="<?php echo $view['router']->path('admin_edit_activity', array( 'id'=> $activitie->getId() )) ?>">edit</a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
        </div>
    </div>
</div>
<?php $view['slots']->stop() ?>