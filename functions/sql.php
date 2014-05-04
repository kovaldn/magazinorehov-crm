<?php
function GetNow ()	//Ф-я, возвращающая текущее время на сервере
{
	$now = MysqlQuery( "SELECT NOW() AS NOW" ); return $now['NOW'];
}

function SetCharacterUTF8()	//Установка кодировки связи с базой данных UTF8
{
	mysql_query("set character set utf8");
	mysql_query("set character_set_client=utf8");
	mysql_query("set character_set_connection=utf8");
	mysql_query("set character_set_results=utf8");
}

function MysqlQuery( $query, $params = 0 )	//Ф-я выполнения запроса к базе данных
{
	$database = _DATABASE_;	//Если  на сайте всего одна база данных, то переменная $fdatabase берётся из дефайнов, в противном случае это ещё один параметр ф-и MysqlQuery()
	if( strtolower($query[0]) != 's' ) //Определяем тип запроса
		return MysqlQueryTF( $database, $query, $params );	//Если запрос не SELECT, то ответ от сервера ожидается в формате TRUE|FALSE, вызываем соответствующую функцию
	if( $db = @mysql_pconnect( _HOST_, _USER_, _PASSWORD_ ) ) :	//Если же запрос SELECT, то ожидаемый ответ от сервера - массив или многомерный массив
		SetCharacterUTF8();
		if( mysql_select_db( $database ) ) :
			if( $params->debug )	//Если в объекте $params свойство debug = TRUE, то выводим текст сгенерированного запроса на экран. Удобно при отладке кода
				echo "<br />".$query."<br />";
			$data_ = mysql_query( $query );
			if( $params->multi ) : //Если в объекте $params свойство multi = TRUE, то ожидаемый ответ от сервера - двумерный ассоциативный масив
				$counter = 0;
				while( $data = @mysql_fetch_assoc( $data_ ) ) :
					$list[$counter] = $data;
					$counter++;
				endwhile;
			else: //В противном случае - одномерный ассоциативный массив
				if( $params->alone ) : $list = @mysql_fetch_array( $data_ ); $list = $list[0];
				else : $list = @mysql_fetch_assoc( $data_ ); endif;
			endif;
			mysql_close( $db );
			return $list;
		else : mysql_close( $db ); $err = "DB: not open"; endif;
	else : $err = "Host: connect error"; endif;
	return $err;
}

function MysqlQueryTF( $database, $query, $params )
{
	if( $db = @mysql_pconnect( _HOST_, _USER_, _PASSWORD_ ) ) :
		SetCharacterUTF8();
		if( mysql_select_db( $database ) ) :
			if( $params->debug )
				echo "<br />".$query."<br />";
			$res = mysql_query( $query ); //Выполняем запрос
			mysql_close( $db );
			return $res;	//Возвращаем, успешно ли выполнен запрос
		else : mysql_close( $db ); $err = "DB: not open"; endif;
	else : $err = "Host: connect error"; endif;
	return $err;
}
?>