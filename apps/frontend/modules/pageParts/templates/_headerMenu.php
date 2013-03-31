<?php if(!$sf_user->isAnonymous()): ?>
<div class="navbar-wrapper">
		<div class="navbar">
			<div class="navbar-inner">
				<!-- Responsive Navbar Part 1: Button for triggering responsive navbar (not covered in tutorial). Include responsive CSS to utilize. -->
				<button data-target=".nav-collapse" data-toggle="collapse" class="btn btn-navbar" type="button">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="brand" href="<?php echo url_for('@homepage') ?>">Панель управления проектом</a>
				<!-- Responsive Navbar Part 2: Place all navbar contents you want collapsed withing .navbar-collapse.collapse. -->
				<div class="nav-collapse collapse">
					<ul class="nav">
<!--						--><?php //if($sf_user->hasCredential('auditor')): ?>
						<li><a href="<?php echo url_for('@auditor_panel') ?>">Аудиторам</a> </li>
<!--						--><?php //elseif($sf_user->hasCredentials(array('coordinator', 'admin', 'project_manager'))): ?>
						<li class="dropdown">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">Аудит
								<b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><?php echo link_to('РТТ', 'outlet') ?></li>
							</ul>
						</li>
						<li class="dropdown">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">Вспомогательные разделы
								<b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><?php echo link_to('Города', 'city') ?></li>
								<li><?php echo link_to('Регионы', 'region') ?></li>
								<li><?php echo link_to('Страны', 'country') ?></li>
							</ul>
						</li>
						<li class="dropdown">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">Пользователи 1
								<b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><?php echo link_to('Аудиторы', 'auditor') ?></li>
								<li><?php echo link_to('Координаторы', 'coordinator') ?></li>
								<li><?php echo link_to('Руководители проекта', 'project_manager') ?></li>
							</ul>
						</li>
						<li class="dropdown">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">Пользователи
								<b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><?php echo link_to('Пользователи', 'sf_guard_user') ?></li>
								<li><?php echo link_to('Группы', 'sf_guard_group') ?></li>
								<li><?php echo link_to('Разрешения', 'sf_guard_permission') ?></li>
							</ul>
						</li>
						</ul>
<!--						--><?php //endif; ?>
					<ul id="main-menu-right" class="nav pull-right">
						<li><?php echo link_to('Выход', 'signout') ?></li>
					</ul>
				</div>
				<!--/.nav-collapse -->
			</div>
			<!-- /.navbar-inner -->
		</div>
		<!-- /.navbar -->
</div>
<?php endif; ?>
