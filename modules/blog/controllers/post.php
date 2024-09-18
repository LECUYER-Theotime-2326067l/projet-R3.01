<?php

require_once('modules/blog/views/homepage');

function post(string $identifier)
{
	$post = getPost($identifier);
	$comments = getComments($identifier);

	require('modules/blog/views/post.php');
}