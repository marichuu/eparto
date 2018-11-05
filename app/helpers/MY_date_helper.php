<?php

if ( ! function_exists('dateEn'))
{
	function dateEn($date )
	{
      $d = explode('/', $date);
      $d=  array_reverse($d);
      return implode('-', $d );
    }
    
}
if ( ! function_exists('dateFr'))
{
	function dateFr($date )
	{
      $d = explode('-', $date);
      $d=  array_reverse($d);
      return implode('/', $d );
        }
    
}
