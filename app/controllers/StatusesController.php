<?php

use Larabook\Statuses\PublishStatusCommand;
use Larabook\Statuses\StatusRepository;
use Larabook\Form\PublishStatusForm;

class StatusesController extends \BaseController {

	protected $statusRepository;

	protected $publishStatusForm;

	function __construct(PublishStatusForm $publishStatusForm, StatusRepository $statusRepository)
	{
		$this->publishStatusForm = $publishStatusForm;
		$this->statusRepository = $statusRepository;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$statuses = $this->statusRepository->getFeedForUser(Auth::user());
		
		return View::make('statuses.index', compact('statuses'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::get();
		$input['userId'] = Auth::id();
		$this->publishStatusForm->validate($input);
		$this->execute(PublishStatusCommand::class, $input);
		Flash::message('Your status has been updated.');
		return Redirect::back();
	}

}
