<?php
$PAGE_TITLE='Building Web Application using MySQL and PHP - W1tma BBK - amusso01';

//retrieve file template
$file= $TEMPLATE_URL.'header.html';
$tmpl=file_get_contents($file);

//create navigation bar
$navArray=dirFile($FILE_ROOT.'views');
$navigation.=makeNav($navArray);



//replace template
$tmpl=str_replace('{{navigation}}',$navigation,$tmpl);
$tmpl=str_replace('{{lang[number]}}',$lang['number'],$tmpl);
$tmpl=str_replace('{{songs}}',$mysqli->getSong(),$tmpl);
$tmpl=str_replace('{{artists}}',$mysqli->getArtist(),$tmpl);
$tmpl=str_replace('{{date}}',$lang['date'],$tmpl);


echo $tmpl;