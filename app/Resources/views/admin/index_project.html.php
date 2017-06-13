<?php $view->extend('::admin.html.php') ?>
<?php $view['slots']->start('body') ?>
<div class="top_panel">
    <h1>Project list <small>Добавить или редактировать проектов</small></h1>
    <ol class="breadcrumb">
        <li>
            <a class="btn btn-info btn-xs" href="<?php echo $view['router']->path('admin_new_project') ?>"><i class="fa fa-file"></i>Добавить</a>
            <button type="button" class="btn btn-default btn-xs" onclick="reload()"><i class="fa fa-refresh"></i> Обновить </button>
        </li>
    </ol>
</div>
<div class="admin-content">
    <div class="table-responsive table table-bordered table-hover">
        <table>
            <thead class="table-bordered">
                <tr class="table-bordered">
                    <th width="30" class="header">ID <i class="fa fa-sort"></i></th>
                    <th width="200" class="table-bordered">Name<br>Name_ru<br>Name_en</th>
                    <th class="table-bordered">About</th>
                    <th class="table-bordered">About_ru</th>
                    <th class="table-bordered">About_en</th>
                    <th class="table-bordered">Actions</th>
                </tr>
            </thead>
            <tbody class="table-bordered">
			 <?php foreach( $projects as $project ){ ?>
                <tr class="table-bordered">
                    <td class="id">
                        <a href="<?php echo $view['router']->path('admin_edit_project', array( 'id' => $project->getId() )) ?>">
						    <?php echo $project->getId() ?>
					    </a>
                    </td>
                    <td class="table-bordered"><?php echo $project->getName()."<br>".$project->getNameru()."<br>".$project->getNameen() ?></td>
                    <td class="table-bordered"><?php echo $project->getAbout() ?></td>
                    <td class="table-bordered"><?php echo $project->getAboutru() ?></td>
                    <td class="table-bordered"><?php echo $project->getAbouten() ?></td>
                    <td class="table-bordered">
                        <a href="<?php echo $view['router']->path('admin_edit_project', array( 'id'=> $project->getId() )) ?>">edit</a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<?php $view['slots']->stop() ?>