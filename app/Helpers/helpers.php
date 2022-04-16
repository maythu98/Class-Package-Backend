<?php

if (! function_exists('generate_random_str')) {
	
	function generate_random_str()
	{
        return str_random(8).'-'.str_random(4).'-'.str_random(4).'-'.time().str_random(2);
	}
}