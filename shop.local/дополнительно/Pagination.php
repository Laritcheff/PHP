<?php
// Класс для генерации постраничной навигации
class Pagination {

    // Свойства класса
    private $max = 10; // кол-во ссылок навигации на страницу
    private $index = 'page'; // ключ для GET, в который пишется номер страницы
    private $current_page; // текущая страница
    private $total; // общее количество записей
    private $limit; // кол-во записей на страницу

    // Инициализация свойств класса
    public function __construct($total, $currentPage, $limit, $index) {
        $this->total = $total; // Устанавливаем общее количество записей
        $this->limit = $limit; // Устанавливаем количество записей на страницу
        $this->index = $index; // Устанавливаем ключ в url
        $this->amount = $this->amount(); // Устанавливаем количество страниц
        $this->setCurrentPage($currentPage); // Устанавливаем номер текущей страницы
    } // end __construct

    // Генерация html-кода со ссылками навигации
    public function get() {
        $links = null; // Для записи ссылок
        $limits = $this->limits(); // Получаем ограничения для цикла

        $html = '<ul class="pagination">'; // в $html будет собираться весь html-код
        
        // Генерируем ссылки
        for ($page = $limits[0]; $page <= $limits[1]; $page++) {
            // Если это текущая страница, ссылки нет и добавляется класс active
            if ($page == $this->current_page) {
                $links .= '<li class="active"><a href="#">' . $page . '</a></li>';
            } else {                
                $links .= $this->generateHtml($page); // Иначе генерируем ссылку
            }
        } // end for

        // Если ссылки создались
        if (!is_null($links)) {            
            if ($this->current_page > 1) // Если текущая страница не первая
                $links = $this->generateHtml(1, '&lt;') . $links; // Создаём стрелку "На первую"
            if ($this->current_page < $this->amount) // Если текущая страница не последняя
                $links .= $this->generateHtml($this->amount, '&gt;'); // Создаём стрелку "На последнюю"
        }

        $html .= $links . '</ul>'; // Складываем все в $html

        return $html;
    } // end get()

    // Генерация HTML-кода ссылки
    private function generateHtml($page, $text = null) {
        // Если текст ссылки не указан
        if (!$text) {
            $text = $page; // Указываем, что текст - цифра страницы
        }
        
        // Из запроса в адресной строке формируем url
        $currentURI = rtrim($_SERVER['REQUEST_URI'], '/') . '/'; // удаляем из запроса справа все до знака /, добавляем /
        $currentURI = preg_replace('~/page[0-9]+~', '', $currentURI); // удаляем из полученного результата часть /page2
        
        // Формируем HTML код ссылки
        return '<li><a href="' . $currentURI . $this->index . $page . '">' . $text . '</a></li>';
    } // end generateHtml()

    
    //  Для получения, откуда стартовать
    private function limits() {
        // Вычисляем ссылки слева (чтобы активная ссылка была посередине)
        $left = $this->current_page - round($this->max / 2);

        // Вычисляем начало отсчёта
        if($left > 0) $start = $left;
        else $start = 1;        

        // Если впереди есть как минимум $this->max страниц
        if ($start + $this->max <= $this->amount)
        // Назначаем конец цикла вперёд на $this->max страниц или просто на минимум
            if($start > 1) $end =$start + $this->max;
            else $end =$this->max;
        else {
            // Конец - общее количество страниц
            $end = $this->amount;

            // Начало - минус $this->max от конца
            if($this->amount - $this->max > 0) $start = $this->amount - $this->max;
            else $start = 1;
        }

        return array($start, $end);
    } // end limits()

    // Установка текущей страницы
    private function setCurrentPage($currentPage) {        
        $this->current_page = $currentPage; // Получаем номер страницы

        // Если текущая страница больше нуля
        if ($this->current_page > 0) {
            // если текущая страница меньше общего количества страниц
            if ($this->current_page > $this->amount) {            
                $this->current_page = $this->amount; // Устанавливаем страницу на последнюю
            }
        } else {
            $this->current_page = 1; //Устанавливаем страницу на первую
        }
    } // end setCurrentPage()

    // Получение общего числа страниц
    private function amount() {        
        return round($this->total / $this->limit); // Делим и округляем
    } // end amount()

}
