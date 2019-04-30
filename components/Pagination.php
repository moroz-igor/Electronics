<?php
  	function connectDB() {
		$connect = @new mysqli("localhost", "root", "","electronics_db");
		if($connect->connect_errno) exist('Error connecting to database!');
        $connect->set_charset('utf8');
		return $connect;
	}
  	function closeDB($connect) {
		$connect->close();
	}
    function getAllArticles($start, $limit, $section) {
	    $connect = connectDB();
        switch($section)
        {
            case "catalog":
            $result = $connect->query("SELECT * FROM `product` LIMIT ".$start.", ".$limit);
            break;
            case "section":
            $result = $connect->query("SELECT * FROM `s1_product` LIMIT ".$start.", ".$limit);
            break;
        }

	closeDB($connect);
	return setResultToArray($result);
    }
  function getAllArticlesInCategory($start, $limit, $category, $section) {
	    $connect = connectDB();
        switch($section)
        {
            case "catalog" :
            $result = $connect->query("SELECT * FROM `product`
                WHERE status=1
                AND category_id = " .$category.
                " ORDER BY id LIMIT " .$start. ", " .$limit); break;
            case "section" :

            $result = $connect->query("SELECT * FROM `s1_product`
                WHERE s1_status=1
                AND s1_category_id = " .$category.
                " ORDER BY s1_id LIMIT " .$start. ", " .$limit); break;
        }
        closeDB($connect);
    return setResultToArray($result);
    }
   function setResultToArray($result) {
	$array = array();
	while ($row = mysqli_fetch_assoc($result)) $array[] = $row;
	return $array;
   }
  	function getStart($page, $limit) {
		return $limit * ($page - 1);
	}
  	function pagination($page, $limit, $url, $number_buttons, $number_articles) {
        //echo '<br>'.$page;
        //echo '<br>'.$limit;
        //echo '<br>'.$url;
        //echo '<br>'.$number_buttons;
        //echo '<br>'.$number_articles;
        //echo '<br>';
        $number_articles = intval($number_articles);
            if ($number_articles/$limit < $number_buttons && $number_articles/$limit <= 1) {
                echo '<p>стр 1</p>';
            }
            else if($number_articles/$limit < $number_buttons )
            {
                $number_buttons = (floor($number_articles/$limit)-2);
            }
            else
            {
                $number_buttons = $number_buttons - 2;
            }
		$first_page = $page;
		// общее количество стр.
		$count_pages = ceil($number_articles / $limit);
		//echo '<br>count_pages: - '.$count_pages.'<br>';
		if ($page > $count_pages) $page = $count_pages;
		$prev = $page - 1;
		$next = $page + 1;
		if ($prev < 1) $prev = 1;
		if ($next > $count_pages) $next = $count_pages;

		$pagination = "";
		$class_button = "<div class=\"buttons-pagination\">";
		if ($count_pages > 1) {

			if ($page != 1){
				$pagination .= "<a href='".$url."'><div class=\"buttons-pagination\"><i class=\"fa fa-chevron-left\"></i><i class=\"fa fa-chevron-left\"></i></div></a>";
				$pagination .= "<a href='".$url."?page=".$prev."'><div class=\"buttons-pagination\"><i class=\"fa fa-chevron-left\"></i></div></a>";
			}
			if(($first_page + $number_buttons) <= $count_pages)
			{
				 $last_button = $first_page + $number_buttons;
				 $begin = $first_page -1;
				 if($begin == 0) {
					$begin = 1; $last_button++;
				 }
			}
			if(($first_page + $number_buttons) > $count_pages)
			{
				$last_button = $count_pages;
				$begin = $count_pages - $number_buttons-1;
			}
			for ($i = $begin; $i <= $last_button; $i++) {
				($i == $page) ?
							$class_button = "<div class=\"buttons-pagination _pagination-active\">" :
				 											$class_button = "<div class=\"buttons-pagination\">";
				$pagination .= "<a href='".$url."?page=".$i."'>" . $class_button .$i. "</div>"."</a>";
			}

			if ($page != $count_pages) {
				$pagination .= "<a href='".$url."?page=".$next."'><div class=\"buttons-pagination\"><i class=\"fa fa-chevron-right\"></i></div></a>";
				$pagination .= "<a href='".$url."?page=".$count_pages."'><div class=\"buttons-pagination\"><i class=\"fa fa-chevron-right\"></i><i class=\"fa fa-chevron-right\"></i></div></a>";
			}
		}
		return $pagination;
	}
 ?>
