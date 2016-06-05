<?php

/**
 * The View Notice presenter.
 *
 * @package  app
 * @extends  Presenter
 */
class Presenter_viewNotice_index extends Presenter
{
	/**
	 * Prepare the view data, keeping this in here helps clean up
	 * the controller.
	 *
	 * @return void
	 */
	public function view()
	{
		//$this->name = $this->request()->param('name', 'World');
		
		$this->title = 'Testing this Presenter thing';
		
		$this->articles = 
	}
}
