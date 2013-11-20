<?php

use Magniloquent\Magniloquent\Magniloquent;

class Chat extends Magniloquent{
	protected $guarded = array('_token');

	protected $table = "chat";

	public static $rules = array(
	"save"	=>	array(
		"message"	=>	"required|digitsbetween:2,200",
		),
	"create"	=>	array(
		"message"	=>	"required|digitsbetween:2,200",
		),
	"update" => array()
	);

	public function users()
	{
		return $this->belongsTo('User', 'user_id');
	}
}
