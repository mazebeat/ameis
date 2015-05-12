<?php

class Proyecto extends Eloquent
{

	public    $timestamps = false;
	protected $table      = 'AME_Ges_Proy';
	protected $primaryKey = 'Id_Proy';

	public function scopePendiente($query)
	{
		return $query->whereEstado('P');
	}
}
