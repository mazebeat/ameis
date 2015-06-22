<?php

class Cotizacion extends Eloquent
{

	public    $timestamps = false;
	protected $table      = 'AME_Ges_Cot';
	protected $primaryKey = 'Id_Cot';

	public function scopePendiente($query)
	{
		return $query->select(array('Nro_Cot', 'Descripcion', 'Id_Cot'))->whereEstado('P')->orderBy('Nro_Cot', 'asc')->get();
	}
}
