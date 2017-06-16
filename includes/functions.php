<?php
//@$id the name of the view to render
//@return the url to include in index.php
function url($id){
    switch ($id) {
        case 'home':
            return 'views/home.php';
            break;
        case 'artists':
            return 'views/artists.php';
            break;
        case 'songs':
            return 'views/songs.php';
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
//Make a navigation bar out of an array
//@parameter array of name for the navigation bar
//@return the escaped list in html tag of the given array
function makeNav($navArray, $view){
    $navigation='';
    foreach ($navArray as $index => $item) {
        if ($view==$item){
            $navigation.='<li class="active" ><a href="'.$index.'">'.htmlentities($item).'</a></li>'.PHP_EOL;
        }else{
        $navigation.='<li><a href="'.$index.'">'.htmlentities($item).'</a></li>'.PHP_EOL;
        }
    }
    return $navigation;
}
//Function to execute SELECT query
//@parameter name of the table to select
//@parameter name of the attribute to select default *
//@parameter connection object
//@return the number of row in mysqli::result object for the query
function selectQuery($table,$myDb,$attribute='*'){
    $sql='SELECT '.$attribute.' FROM '.$table;
    $row=0;
    $myDb->real_escape_string($sql);
    if($result=$myDb->query($sql)){
        $row=$result->num_rows;
    }else{
        return $myDb->error;
    }
    $result->free();
    return $row;
}
//@parameter SQL query
//@parameter database object connection
//@return $html string table of the result
function sqlResult($sql, $myDb){
    $html='';
//    $cleanSql=$myDb->real_escape_string($sql);
    if ($result=$myDb->query($sql)){
        $row = $result->fetch_fields();
        $html.= '<table>'.PHP_EOL.'<thead>'.PHP_EOL;
        foreach ($row as $key => $value){
            $html.='<th>'.htmlentities($row[$key]->name).'</th>'.PHP_EOL;
        }
        $html.='</thead>'.PHP_EOL;

        while($row=$result->fetch_row()){
         $html.='<tr>'.PHP_EOL;
         foreach ($row as $key => $value){
             $html.='<td>'.htmlentities($value).'</td>'.PHP_EOL;
         }
         $html.='</tr>'.PHP_EOL;
        }
        $html.='</table>'.PHP_EOL;
    }else{
        return $myDb->error;
    }
    $result->free();
    return $html;
}


//return date according to the language
//@param $config
//@return string
function makeDate($config){
    $today=getdate();
    if ($config['lang']=='it'){
        switch ($today['weekday']){
            case 'Monday':
                $today['weekday']='Lunedi';
                break;
            case 'Tuesday':
                $today['weekday']='Martedi';
                break;
            case 'Wednesday':
                $today['weekday']='Mercoledi';
                break;
            case 'Thursday':
                $today['weekday']='Giovedi';
                break;
            case 'Friday':
                $today['weekday']='Venerdi';
                break;
            case 'Saturday':
                $today['weekday']='Sabato';
                break;
            case 'Sunday':
                $today['weekday']='Domenica';
                break;
        }
        switch ($today['month']){
            case 'January':
                $today['month']='Gennaio';
                break;
            case 'February':
                $today['month']='Febbraio';
                break;
            case 'March':
                $today['month']='Marzo';
                break;
            case 'April':
                $today['month']='Aprile';
                break;
            case 'May':
                $today['month']='Maggio';
                break;
            case 'June':
                $today['month']='Giugno';
                break;
            case 'July':
                $today['month']='Luglio';
                break;
            case 'August':
                $today['month']='Agosto';
                break;
            case 'September':
                $today['month']='Settembre';
                break;
            case 'October':
                $today['month']='Ottobre';
                break;
            case 'November':
                $today['month']='Novembre';
                break;
            case 'December':
                $today['month']='Dicembre';
                break;
        }

    }
        return $today['weekday'].' '.$today['mday'].' '.$today['month'].' '.$today['year'];
}


//function autoloader to load the classes
function myAutoloader($className){
    include 'classes/'.$className.'.php';
}
//Register the function with php
spl_autoload_register('myAutoloader');

