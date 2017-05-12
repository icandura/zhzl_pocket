<?php

//构建getallheaders函数(nginx不支持此函数需自行构建)
if (!function_exists('getallheaders')) {
    function getallheaders() {
        foreach ($_SERVER as $name => $value) {
            if (substr($name, 0, 5) == 'HTTP_') {
                $headers[str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', substr($name, 5)))))] = $value;
            }
        }
        return $headers;
    }
}

if (!isset($_GET["page"])) {
    echo "need page id.";
    exit;
}
 
$PAGE_ID = $_GET["page"];
$P_HEADERS = getallheaders();
 
if (array_key_exists("Referer", $P_HEADERS) || (isset($_GET["redirect"]) && $_GET["redirect"] == '1')) {
    header("Location: https://zhuanlan.zhihu.com/p/" . $PAGE_ID);
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="referrer" content="never"/>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<?php
$PAGE_DATA = file_get_contents("https://zhuanlan.zhihu.com/api/posts/" . $PAGE_ID);
$PAGE_OBJ = json_decode($PAGE_DATA);
echo '<title>' . $PAGE_OBJ->{"title"} . '</title>';
?>
<link rel="shortcut icon" href="https://static.zhihu.com/static/favicon.ico" type="image/x-icon">
</head>
<body>
<h1>
<?php
echo $PAGE_OBJ->{"title"};
?>
</h1>
<div>
<?php
echo $PAGE_OBJ->{"content"};
?>
<div>
</body>
</html>