<?php
//retrieve file template
$file= $TEMPLATE_URL.'header.html';
$tmplHead=file_get_contents($file);
$file=$TEMPLATE_URL.'main.html';
$tmplMain=file_get_contents($file);

//create navigation bar
$navArray=dirFile($FILE_ROOT.'views');
$navigation.=makeNav($navArray,$view);
//create main content for song view
$content.=sqlResult($song_artist_duration,$mysqli);

//replace template
$tmplHead=str_replace('{{lang[song]}}',$lang['song'],$tmplHead);
$tmplHead=str_replace('{{lang[artist]}}',$lang['artist'],$tmplHead);
$tmplHead=str_replace('{{lang[title]}}',$lang['title_song'],$tmplHead);
$tmplHead=str_replace('{{navigation}}',$navigation,$tmplHead);
$tmplHead=str_replace('{{lang[number]}}',$lang['number'],$tmplHead);
$tmplHead=str_replace('{{songs}}',htmlentities($mysqli->getSong()),$tmplHead);
$tmplHead=str_replace('{{artists}}',htmlentities($mysqli->getArtist()),$tmplHead);
$tmplHead=str_replace('{{date}}',$lang['date'],$tmplHead);
$tmplMain=str_replace('{{lang[welcome]}}',$lang['welcome_song'],$tmplMain);
$tmplMain=str_replace('{{lang[mainContent]}}',$content,$tmplMain);

//echo html
echo $tmplHead;
echo $tmplMain;