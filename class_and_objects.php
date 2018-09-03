<?php
////////////////////////////////////////////////////////////////////////////////////////////////////
/******************************************** ОБЪЕКТЫ: ********************************************/
// КЛАССИЧЕСКОЕ СОЗДАНИЕ КЛАССА
class Entree {
	public $name;
	public $ingredients = array();
	public function hasIngredient($ingredient) {
		return in_array($ingredient, $this->ingredients);}
}

// СОЗДАНИЕ ЭКЗЕМПЛЯРА КЛАССА - ОБЪЕКТ
$soup              = new Entree;
$soup->name        = 'Chicken Soup';// для доступа к свойству объекта используется ->
$soup->ingredients = array('chicken', 'water');// для доступа к методу объекта используется ->

// СОЗДАНИЕ СТАТИЧЕСКОГО МЕТОДА КЛАССА
class Entree {
	public static function getSizes() {
		// статический метод создается внутри класса
		return array('small', 'medium', 'large');
	}
}

// ВЫЗОВ СТАТИЧЕСКОГО МЕТОДА
$sizes = Entree::getSizes();// обращение к статическому методу (который не принадлежит не одному конкретному объекту) осуществляется через "::"

// МЕТОД - КОНСТРУКТОР (__construct)
class Entree {
	public $name;
	public $ingredients = array();
	public function __construct($name, $ingredients) {
		$this->name        = $name;
		$this->ingredients = $ingredients;
	}
	public function hasIngredient($ingredient) {
		return in_array($ingredient, $this->ingredients);
	}
}

// СОЗДАНИЕ ОБЪЕКТА ПО СРЕДСТВУ __construct
$soup = new Entree('Chicken Soup', array('chicken', 'water'));// слово Entree рассматривается тут как обращение к методу __construct и в скобки помещются переменные которые надо внедрить в новый объект

// СОЗДАНИЕ РАСШИРЕННОГО КЛАССА ОТ ДРУГОГО КЛАССА
class ComboMeal extends Entree {
	// класс ComboMeal расширен от класса Entree
	// ВВОД КОНСТРУКТОРА В ПОДКЛАСС
	public function __construct($name, $entrees) {
		parent::__construct($name, $entrees);// parent означает ссылку на класс Entree от которого расширяется ComboMeal
		foreach ($entrees as $entree) {
			if (!$entree instanceof Entree) {
				throw new Exception('Elements of $entrees must be Entree objects');
			}
		}
	}

	public function hasIngredient($ingredient) {
		foreach ($this->ingredients as $entree) {
			if ($entree->hasIngredient($ingredient)) {
				return true;
			}
		}
		return false;
	}
}

// ИЗМЕНЕНИЕ ДОСТУПНОСТИ СВОЙСТВ
class Entree {
	private $name;// закрытое свойство
	protected $ingredients = array();// свойство открыто только для данного класса и для подклассов расширенных от данного класса
	public function getName() {
		// метод для чтения значения свойства $name
		return $this->name;
	}
	public function __construct($name, $ingredients) {
		if (!is_array($ingredients)) {
			throw new Exception('$ingredients must be an array');
		}
		$this->name        = $name;
		$this->ingredients = $ingredients;
	}
	public function hasIngredient($ingredient) {
		return in_array($ingredient, $this->ingredients);
	}
	/* На методы действуют те же самые ключевые слова доступности protected и private */
}
?>