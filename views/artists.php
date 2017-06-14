<?php
//retrieve file template
$file= $TEMPLATE_URL.'header.html';
$tmplHead=file_get_contents($file);
$file=$TEMPLATE_URL.'main.html';
$tmplMain=file_get_contents($file);

//create navigation bar
$navArray=dirFile($FILE_ROOT.'views');
$navigation.=makeNav($navArray);



//replace template
$tmplHead=str_replace('{{lang[title]}}',$lang['title_artist'],$tmplHead);
$tmplHead=str_replace('{{navigation}}',$navigation,$tmplHead);





echo $tmplHead;