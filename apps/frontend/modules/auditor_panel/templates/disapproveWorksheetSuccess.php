<div class="info well container">
	<h2>Анкета успешно возвращена на доработку</h2>
	<?php $filters = $sf_user->getAttribute('auditor_panel.filter', array(), 'auditor_panel_module') ?>
	<?php $page = $sf_user->getAttribute('auditor_panel.page', 1, 'auditor_panel_module') ?>
		<a href="<?php echo url_for('auditor_panel_worksheet_additional_files', $outlet)?>">
			<button class="btn btn-warning">Посмотреть фото</button>
		</a>
		<a href="<?php echo url_for('auditor_panel_worksheet_additional_files', $outlet)?>">
			<button class="btn btn-warning">Прослушать аудио</button>
		</a>
	<a href="<?php echo url_for('auditor_panel_filter') . '?' . http_build_query(array('auditor_panel_filter' => sfOutputEscaper::unescape($filters))).'&page='.$page ?>">
			<button class="btn btn-info">Вернуться к списку РТТ</button>
		</a>
</div>
