<?php
$PAGE_TITLE='Building Web Application using MySQL and PHP - W1tma BBK - amusso01';

//retrieve file template
$file= $TEMPLATE_URL.'header.html';
$tmpl=file_get_contents($file);

//create navigation bar
$navArray=dirFile($FILE_ROOT.'views');
$navigation.=makeNav($navArray);
$tmpl=str_replace('{{navigation}}',$navigation,$tmpl);
$tmpl=str_replace('{{lang[number]}}',$lang['number'],$tmpl);
echo $tmpl;