<?php
use Illuminate\Support\MessageBag;

class BaseController extends Controller {

	//Message to other controller
	public $message;

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

	public function spam_prot($wait_time)
	{
		$timer = time() - Session::get('ajax_time');
		if(Session::has('ajax_time') AND $timer < $wait_time)
		{
			$time_left = $wait_time-$timer;
			$this->message = array("message" => "You have to wait ".($time_left == 1 ? $time_left." second" : $time_left." seconds")." more to send new message.");
			return FALSE;
		}
		else
		{
			Session::put('ajax_time', time());
			return TRUE;
		}
	}

}