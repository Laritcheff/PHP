<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Рискованные работы - Поиск</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body class="page">
  <img src="images/riskyjobs_title.gif" alt="Risky Jobs">
  <img src="images/riskyjobs_fireman.jpg" alt="Risky Jobs" style="float:right">
  <h3>Рискованные работы - Результат поиска</h3>

<?php
// Получаем данные из формы
$user_search = $_GET['usersearch'];
$sort=$_GET['sort'];
//для разбиения на страницы
if(isset($_GET['page'])){//Tекунщая страница
$cur_page=$_GET['page'];
}else{
$cur_page=1;
}
$results_page=5;//кол-во записей на странице.
$skip = (($cur_page-1)*$results_page);

// Создаем таблицу с результатами
echo '<table border="0" cellpadding="2">';
echo '<tr class="heading">';
echo generate_links($user_search, $sort);
echo '</tr>';

// Подключение к БД
require_once 'app_config.php';
$connect = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
	or handle_error("Возникла проблема с подключением к базе данных.", error_get_last()); 
mysqli_set_charset($connect, 'UTF8');
/*построение запроса к БД
$user_search - запрос пользователя из $_GET
$sort - порядок сортировки
Возвращает $query - текст запроса
*/
function build_query($user_search, $sort){
// Предварит. обработка запроса пользователя
$user_search = str_replace(',', ' ', $user_search);
// Получение результата запроса
$search_words = explode(' ', $user_search);  // ['матадор','победитель', '', 'быков']
$final_search_words = array();
foreach($search_words as $element) {
	if(!empty($element)) {
		$final_search_words[] = $element;    // ['матадор','победитель', 'быков']
	}
}
$query = "SELECT * FROM riskyjobs ";
$search = array();
foreach($final_search_words as $word) {
	$search[] =  " title LIKE '%$word%' ";	// title LIKE '%%'
}
if(!empty($search)){
$query = $query . " WHERE ".implode(' OR ', $search);
  }
//сортировка
    switch($sort){
      case 1:
        $query.=" ORDER BY title ";
          break;
      case 2:
        $query.=" ORDER BY title DESC";
          break;
      case 3:
        $query.=" ORDER BY city ";
          break;
      case 4:
        $query.=" ORDER BY city DESC";
          break;
      case 5:
        $query.=" ORDER BY date_posted ";
          break;
      case 6:
        $query.=" ORDER BY date_posted DESC";
          break;
        default:
  }  
  return $query;
}

/*
формирует гиперссылки для сортировки
$user_search - запрос пользователя из $_GET
Ssort - порядок сортировки из $_GET
Возвращает HTML со ссылками
*/
function generate_links($user_search, $sort){
 $sort_links = '';
    switch($sort){
      case 1:
          $sort_links='<td><a href="'.$_SERVER['PHP_SELF'].'?usersearch='. $user_search.'&sort=2">Название работы</a></td>
              <td>Описание</td>
              <td><a href="'.$_SERVER['PHP_SELF'] . '?usersearch='. $user_search. '&sort=3">Город</a></td>
              <td><a href="'.$_SERVER['PHP_SELF']. '?usersearch=' . $user_search. '&sort=5">Дата размещения вакансии</a></td>';
        break;
      case 3:
          $sort_links='<td><a href="'.$_SERVER['PHP_SELF'].'?usersearch='. $user_search.'&sort=1">Название работы</a></td>
              <td>Описание</td>
              <td><a href="'.$_SERVER['PHP_SELF'] . '?usersearch='. $user_search. '&sort=4">Город</a></td>
              <td><a href="'.$_SERVER['PHP_SELF']. '?usersearch=' . $user_search. '&sort=5">Дата размещения вакансии</a></td>';
        break;
      case 5:
          $sort_links='<td><a href="'.$_SERVER['PHP_SELF'].'?usersearch='. $user_search.'&sort=1">Название работы</a></td>
              <td>Описание</td>
              <td><a href="'.$_SERVER['PHP_SELF'] . '?usersearch='. $user_search. '&sort=3">Город</a></td>
              <td><a href="'.$_SERVER['PHP_SELF']. '?usersearch=' . $user_search. '&sort=6">Дата размещения вакансии</a></td>';
        break;  
    default:
          $sort_links='<td><a href="'.$_SERVER['PHP_SELF'].'?usersearch='. $user_search.'&sort=1">Название работы</a></td>
              <td>Описание</td>
              <td><a href="'.$_SERVER['PHP_SELF'] . '?usersearch='. $user_search. '&sort=3">Город</a></td>
              <td><a href="'.$_SERVER['PHP_SELF']. '?usersearch=' . $user_search. '&sort=5">Дата размещения вакансии</a></td>';
          }
       return $sort_links; 
      }

  /*
создает навигацию по странице
*/
function generate_pages($user_search, $sort, $cur_page, $num_pages){
    $page_links='';
if($cur_page>1){
$page_links='<a href=" '.$_SERVER['PHP_SELF'].'?usersearch='.$user_search.'&sort='.$sort.'&page='.($cur_page-1).'"> << </a>';
}
for($i=1;$i<=$num_pages;$i++){
      if($i==$cur_page){
       $page_links.=" $i"; 
}else{
    $page_links.='<a href=" '.$_SERVER['PHP_SELF'].'?usersearch='.$user_search.'&sort='.$sort.'&page='.$i.'"> '. $i.' </a>';
          }
      }
if($cur_page<$num_pages){
$page_links.='<a href=" '.$_SERVER['PHP_SELF'].'?usersearch='.$user_search.'&sort='.$sort.'&page='.($cur_page+1).'"> >> </a>';
}
return $page_links;
}


$query=build_query($user_search, $sort);

$result = mysqli_query($connect, $query);
$total= mysqli_num_rows($result);
$num_pages = ceil($total/$results_page);
$query.=" LIMIT $skip, $results_page";
$result = mysqli_query($connect, $query);

while ($row = mysqli_fetch_array($result)) {
  
    echo '<tr class="results">';
    echo '<td valign="top" width="20%">' . '<a href="showjob.php?job_id='.$row['job_id'].'">'.$row['title'].'</a>' . '</td>';    
    echo '<td valign="top" width="50%">' . substr($row['description'], 0, 150).'...' . '</td>';
    echo '<td valign="top" width="10%">' . $row['city'] . '</td>';
    echo '<td valign="top" width="20%">' . substr($row['date_posted'],0,10) .'...'.'</td>';
    echo '</tr>';
    
} 
echo '</table>';
  if($num_pages>1) echo generate_pages($user_search,$sort,$cur_page,$num_pages);
mysqli_close($connect);
?>
</body>
</html>
