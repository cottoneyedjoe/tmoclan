<?php

class War extends Eloquent {
	protected $guarded = array();

	public function search($data)
	{
		$query = DB::table('wars')
				->whereRaw("clan REGEXP :data", array('data' => $data))
				->paginate(20);
		return $query;
	}
}
