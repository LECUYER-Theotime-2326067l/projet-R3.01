<?php

require_once __DIR__ . '/../views/homepage.php';

function post(string $identifier)
{
	$post = getPost($identifier);
	$comments = getComments($identifier);

	require_once __DIR__ . '/../views/homepage.php'; 
}