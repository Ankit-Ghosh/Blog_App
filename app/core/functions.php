<?php

function query(string $query, array $data = []){
    $string = "mysql:host=".DBHOST.";dbname=".DBNAME;
    $con = new PDO($string, DBUSER, DBPASS);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $con->prepare($query); // prepare the query
    $stmt->execute($data); // execute the query with the data

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC); // fetch all the data from the query
    if (is_array($result)) {
        return $result;
    } else {
        return false;
    }
}

function remove_images_from_content($content, $folder = 'uploads/')
{
	preg_match_all("/<img[^>]+/", $content, $matches);

	if(is_array($matches[0]) && count($matches[0]) > 0)
	{
		foreach ($matches[0] as $img) {

			if(!strstr($img, "data:"))
			{
				continue;
			}

			preg_match('/src="[^"]+/', $img, $match);
			$parts = explode("base64,", $match[0]);

			preg_match('/data-filename="[^"]+/', $img, $file_match);

			$filename = $folder.str_replace('data-filename="', "", $file_match[0]);

			file_put_contents($filename, base64_decode($parts[1]));
			$content = str_replace($match[0], 'src="'.$filename, $content);
			

		}
	}
	return $content;
}


function add_root_to_images($content)
{

	preg_match_all("/<img[^>]+/", $content, $matches);

	if(is_array($matches[0]) && count($matches[0]) > 0)
	{
		foreach ($matches[0] as $img) {

			preg_match('/src="[^"]+/', $img, $match);
			$new_img = str_replace('src="', 'src="'.ROOT."/", $img);
			$content = str_replace($img, $new_img, $content);

		}
	}
	return $content;
}

function remove_root_from_content($content)
{
	
	$content = str_replace(ROOT, "", $content);

	return $content;
}

function query_row(string $query, array $data =[]){
    $string = "mysql:hostname=".DBHOST.";dbname=".DBNAME;
    $con = new PDO($string, DBUSER, DBPASS);

    $stmt = $con->prepare($query); // prepare the query
    $stmt->execute($data); // execute the query with the data

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC); // fetch all the data from the query
    if (is_array($result)) {
        return $result[0];
    } 
    return false;
} 

function redirect(string $url){
    header("Location: ".ROOT.'/'.$url);
    exit();
}

function old_value($key, $default = '')
{
	if(!empty($_POST[$key]))
		return $_POST[$key];

	return $default;
}

function old_checked($key, $default = '')
{
	if(!empty($_POST[$key]))
		return " checked ";
	
	return "";
}

function old_select($key, $value, $default = '')
{
	if(!empty($_POST[$key]) && $_POST[$key] == $value)
		return " selected ";
	
	if($default == $value)
		return " selected ";
	
	return "";
}

function get_image($image){
    $image = $image ?? '';
    
    if (file_exists($image)) {
        return ROOT.'/'.$image;
    }
    
    return ROOT.'/assets/images/default.jpg';
}


function str_to_url($url){
    $url = str_replace("'", '', $url);
    $url = preg_replace('~[^\\pL0-9_]+~u', '-', $url);
    $url = trim($url,"-");
    $url = iconv("utf-8","us-ascii//TRANSLIT",$url);
    $url = strtolower($url);
    $url = preg_replace('~[^-a-z0-9_]+~', '', $url);

    return $url;
}

function esc($string){
    return htmlspecialchars($string ?? '', ENT_QUOTES, 'UTF-8');
}

function authenticate($user){
    $_SESSION['USER'] = $user;
}

function user($key = ''){
    if (!empty($key)) {
        return $_SESSION['USER'][$key] ?? '';
    }
    return $_SESSION['USER'] ?? '';
}

function logged_in(){
    return isset($_SESSION['USER']);
}

function get_pagination_vars(){
    // set pagination vars
    $page_number = $_GET['page'] ?? 1;
    $page_number = empty($page_number) ? 1 : (int)$page_number;
    $page_number = $page_number<1 ? 1 : $page_number;

    $current_link = $_GET['url'] ?? 'home';
    $current_link = ROOT . "/" . $current_link;
    $query_string = "";
    foreach ($_GET as $key => $value) 
    {
        if ($key != 'url') {
            $query_string .= '&' . $key . '=' . $value;
        }
    }
    if (!strstr($query_string,"page=")) {
        $query_string .= '&page=' . $page_number;
    }
    $query_string.trim($query_string,'&');
    $current_link .= "?".$query_string;

    $current_link = preg_replace("/page=.*/","page=".$page_number,$current_link);
    $next_link = preg_replace("/page=.*/","page=".($page_number+1),$current_link);
    $first_link = preg_replace("/page=.*/","page=1",$current_link);
    $prev_page_number = $page_number < 2 ? 1 : $page_number - 1;
    $prev_link = preg_replace("/page=.*/","page=".$prev_page_number,$current_link);

    $result = [
        'current_link' => $current_link,
        'next_link' => $next_link,
        'prev_link' => $prev_link,
        'first_link' => $first_link,
        'page_number' => $page_number,
    ];

    return $result;
}

create_tables();

function create_tables() {
    $string = "mysql:hostname=".DBHOST.";";
    $con = new PDO($string, DBUSER, DBPASS);

    $query = "CREATE DATABASE IF NOT EXISTS ".DBNAME;
    $con->exec($query);

    $query = "USE ".DBNAME;
    $con->exec($query);

    $query = "CREATE TABLE IF NOT EXISTS users(
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    image VARCHAR(1024) NOT NULL,
    date DATETIME DEFAULT CURRENT_TIMESTAMP,
    role varchar(20) NOT NULL,

    key username(username),
    key email(email)
    )";
    $con->exec($query);


    $query = "CREATE TABLE IF NOT EXISTS categories(
    id INT AUTO_INCREMENT PRIMARY KEY,
    category VARCHAR(50) NOT NULL,
    slug VARCHAR(100) NOT NULL,
    disabled VARCHAR(255) NOT NULL,

    key slug(slug),
    key category(category)
    )";
    $con->exec($query);


    $query = "CREATE TABLE IF NOT EXISTS posts(
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    category_id INT,
    title varchar(255) NOT NULL,
    content TEXT NOT NULL,
    image VARCHAR(1024) NOT NULL,
    date DATETIME DEFAULT CURRENT_TIMESTAMP,
    slug VARCHAR(100) NOT NULL,

    key user_id(user_id),
    key category_id(category_id),
    key title(title),
    key slug(slug),
    key date(date)
    )";
    $con->exec($query);
}


function resize_image($filename,$max_size = 1000){
    if (file_exists($filename)) {
        $type = mime_content_type($filename);
        switch ($type) {
            case 'image/jpeg':
                $image = imagecreatefromjpeg($filename);
                break;
            case 'image/png':
                $image = imagecreatefrompng($filename);
                break;
            case 'image/gif':
                $image = imagecreatefromgif($filename);
                break;
            case 'image/webp':
                $image = imagecreatefromwebp($filename);
                break;
            
            default:
                return;
        }
        $src_w = imagesx($image);
        $src_h = imagesy($image);
        if ($src_w > $src_h) {
            if($src_w <= $max_size){
                $max_size = $src_w;
            }
            $new_w = $max_size;
            $new_h = ($src_h / $src_w) * $max_size;
        } else {
            if($src_h <= $max_size){
                $max_size = $src_h;
            }
            $new_w = ($src_w / $src_h) * $max_size;
            $new_h = $max_size;
        }
        $new_h = round($new_h);
        $new_w = round($new_w);

        $image2 = imagecreatetruecolor($new_w, $new_h);
        imagecopyresampled($image2, $image, 0, 0, 0, 0, $new_w, $new_h, $src_w, $src_h);

        switch ($type) {
            case 'image/jpeg':
                imagejpeg($image2,$filename,100);
                break;
            case 'image/png':
                imagepng($image2,$filename,100);
                break;
            case 'image/webp':
                imagewebp($image2,$filename,100);
                break;
        }
    }
}