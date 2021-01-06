<?php if ($authorization): ?>
	<p>Здравствуйте <?=$name?>! Добро пожаловать в интернет-магазин! <a href="?logout">[Выход]</a></p>

<?php else:?>
	<form class="rightForm" action="?action=auth" method="post">
		<p><?=$errors?></p>
		<p>Пожалуйста, авторизуйтесь или зарегистрируйтесь!</p>
		<input id="login" type="text" name="login" placeholder="Логин">
		<input id="password" type="password" name="pass" placeholder="Пароль">
		<button>Войти</button>
	</form>

<?php endif; ?>
