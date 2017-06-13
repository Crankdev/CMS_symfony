<?php $view->extend('::admin.html.php') ?>
<?php $view['slots']->start('body') ?>
<div class="top_panel">
    <h1>Project list <small>Редактировать проект</small></h1>
    <ol class="breadcrumb">
        <li>
            <a class="btn btn-info btn-xs"  href="<?php echo $view['router']->path('admin_new_project') ?>"><i class="fa fa-file"></i> Добавить project</a>
            <button type="button" class="btn btn-default btn-xs" onclick="reload()"><i class="fa fa-refresh"></i> Обновить </button>
        </li>
    </ol>
</div>
<div class="admin-content">
    <div class="table-responsive">
        <div class="table table-bordered table-hover tablesorter">
			<?php echo $view['form']->start($edit_form) ?>
			<?php echo $view['form']->widget($edit_form) ?>
			<input type="submit" value="Edit" />
			<?php echo $view['form']->end($edit_form) ?>
            <?php echo $view['form']->start($delete_form) ?>
            <input type="submit" value="Delete">
            <?php echo $view['form']->end($delete_form) ?>
        </div>
    </div>
</div>
<?php $view['slots']->stop() ?>