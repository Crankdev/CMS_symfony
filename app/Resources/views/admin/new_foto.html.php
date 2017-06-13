<?php $view->extend('::admin.html.php') ?>
<?php $view['slots']->start('body') ?>
<div class="top_panel">
    <h1>Fotos  <small>Добавить или редактировать Фото</small></h1>
</div>
<div class="admin-content">
    <div class="table-responsive">
        <div class="table table-bordered table-hover tablesorter">
        	<?php echo $view['form']->start($form) ?>
			<?php echo $view['form']->widget($form) ?>
            <input type="submit" value="Create" />
			<?php echo $view['form']->end($form) ?>
        </div>
    </div>
</div>
<?php $view['slots']->stop() ?>