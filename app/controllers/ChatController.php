<?php

class ChatController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return View::make('chats.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('chats.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		if(!$this->spam_prot(7))
		{
			if(Request::ajax())
			{
				echo json_encode($this->message);	
				return;
			}
			else
			{
				return Redirect::to('/')
				->withInput()
				->withErrors($this->message);
			}
		}

		//Model data
		$data = array('ip_address' => Request::getClientIp());

		if(Auth::user())
			$data['user_id'] = Auth::user()->id;
		else
			$data['user_id'] = 0;

		$save = Chat::create(array_merge(Input::all(), $data));

		if($save->isSaved())
		{
			if(Request::ajax())
			{
				echo json_encode(array("success" => TRUE));
				return;
			}
			return Redirect::to('/')
				->with('flash', 'Your message was sent.');
		}

		if(Request::ajax())
		{
			echo json_encode(array("message" => $save->errors()->get('message')));	
			return;
		}

		return Redirect::to('/')
				->withInput()
				->withErrors($save->errors());
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return View::make('chats.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return View::make('chats.edit');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
