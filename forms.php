<!--                                          ФОРМОЧКА                                          -->
<form method="POST" action="/hello.php">
	Your Name: <input type="text" name="my_name"/>
	<br/>
	<input type="submit" value="Say hello"/>
</form>

<!--                          НЕСКОЛЬКО ЗНАЧЕНИЙ В ФОРМЕ В ВИДЕ МАССИВА                          -->
<form method="POST" action="eat.php">
	<select name="lunch[]" multiple>
		<option value="pork">BBQ Pork Bun</option>
		<option value="chicken">Chicken Bun</option>
		<option value="lotus">Lotus Seed Bun</option>
		<option value="bean">Bean Paste Bun</option>
		<option value="nest">Bird-Nest Bun</option>
	</select>
	<input type="submit" name="submit">
</form>
Selected buns:
<br/>
<?php
if (isset($_POST['lunch'])) {
	foreach ($_POST['lunch'] as $choice) {
		print "You want a $choice bun. <br/>";
	}
}
?>

<!--                                   ОБРАБОТКА ФОРМ ФУНКЦИЯМИ                                   -->
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	process_form();
} else {
	show_form();
}
function process_form() {
	print "Hello, ". $_POST['my_name'];
}
function show_form() {
	print
<<<_HTML_
<form method="POST" action="$_SERVER[PHP_SELF]">
Your name: <input type="text" name="my_name">
<br/>
<input type="submit" value="Say Hello">
</form>
_HTML_;
}
?>