<?php

class Cotizacion extends Eloquent
{

	public    $timestamps = false;
	protected $table      = 'AME_Ges_Cot';
	protected $primaryKey = 'Id_Cot';

	public function scopePendiente($query)
	{
			return $query->whereEstado('P')->lists('Descripcion', 'Id_Cot');
	}
}
