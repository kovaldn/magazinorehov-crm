<?php 

	error_reporting (E_ALL ^ E_NOTICE);

	$post = (!empty($_POST)) ? true : false;

	if($post)
	{
		
		require_once( '../includes/includes.php' );

		$name = stripslashes($_POST['name']);
		$priceOriginal = stripslashes($_POST['price-original']);
		$priceSale = stripslashes($_POST['price-sale']);
		$productAlias = Slugify($name);
		$profit = $priceSale - $priceOriginal;


		$query = "INSERT INTO `assortment`(`product_alias`, `product_name`, `price_original`, `price_sale`, `profit`) VALUES ( '$productAlias', '$name', $priceOriginal, $priceSale, $profit)";
		$queryParams->debug = TRUE;
		MysqlQuery( $query, $queryParams );

	}

	// из названия товара формирует alias
	function Slugify($stroka)
	{ 
		$rus=array('А','Б','В','Г','Д','Е','Ё','Ж','З','И','Й','К','Л','М','Н','О','П','Р','С','Т','У','Ф','Х','Ц','Ч','Ш','Щ','Ъ','Ы','Ь','Э','Ю','Я','а','б','в','г','д','е','ё','ж','з','и','й','к','л','м','н','о','п','р','с','т','у','ф','х','ц','ч','ш','щ','ъ','ы','ь','э','ю','я',' ');
		$lat=array('a','b','v','g','d','e','e','gh','z','i','y','k','l','m','n','o','p','r','s','t','u','f','h','c','ch','sh','sch','y','y','y','e','yu','ya','a','b','v','g','d','e','e','gh','z','i','y','k','l','m','n','o','p','r','s','t','u','f','h','c','ch','sh','sch','y','y','y','e','yu','ya',' ');
		  
		// подготавливаем название
		$stroka = str_replace($rus, $lat, $stroka); // перевеодим на английский
		var_dump($stroka);
		$stroka = strtolower($stroka); // переводим в нижний регистр
			  
	    return $stroka;
	}
	
?>