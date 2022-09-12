<?php
function validateEmail($email = '')
{
	if(!preg_match("/^[a-zA-Z0-9]+@[a-zA-Z]+\.[a-z]+$/",$email))
	{
		return INPUT;
	}
}
function validatePassword($password = '')
{
	if(!preg_match("/^[a-zA-Z0-9]{8,30}$/",$password))
	{
		return INPUT;
	}
}
