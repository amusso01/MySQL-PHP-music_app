<?php
//@$id the name of the view to render
//@return the url to include in index.php
function url($id){
    switch ($id) {
        case 'home':
            return 'views/home.php';
            break;
        case 'authors':
            return 'views/authors.php';
            break;
        case 'books':
            return 'views/books.php';
            break;
        default:
            return 'views/404.php';
            break;
    }
}
//Function to read file name in a dir and store it in an array
//@$dirPath the path of the dir to read
//@return array of file name in specific dir
function dirFile($dirPath){
    $navArray=array();
    $fileName='';
    if (file_exists($dirPath)){
        $dir=opendir($dirPath);
        while(false!==($file=readdir($dir))){
            if(($file=='.')||($file=='..')||($file=='404.php')){
                continue;
            }else{
                $fileName=explode('.',$file);
                $navArray['index.php?page='.$fileName[0]]=$fileName[0];
            }
        }
        closedir($dir);
        return $navArray;
    }else{
        echo '<p>{{lang[dir_error]}}</p>';
    }
}
function makeNav($navArray){
    $navigation='';
    foreach ($navArray as $index => $item) {
        $navigation.='<li><a href="'.$index.'">'.$item.'</a></li>'.PHP_EOL;
    }
    return $navigation;
}


//function autoloader to load the classes
function myAutoloader($className){
    include 'classes/'.$className.'.php';
}
//Register the function with php
spl_autoload_register('myAutoloader');

