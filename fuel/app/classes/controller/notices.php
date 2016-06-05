<?php

class Controller_Notices extends Controller_Template
{
	public $template = 'template';
	
	public function action_index()
	{
		$notices = Model_Notice::find('all');
		
		$comment_links = array();
		foreach ($notices as $notice)
		{
			$results = DB::select()
				->from('comments')
				->where('notice_id', $notice->id)
				->execute();
			 
			$count = count($results);
			
			if ($count == 0)
			{
				$comment_links[$notice->id] = 'View';
			}
			else
			{
				$comment_links[$notice->id] = $count.' '.Inflector::pluralize('Comment', $count);
			}
		}
		
		$view = View::forge('notices/index');
		$view->set('comment_links', $comment_links);
		$view->set('notices', $notices);
		$this->template->title = "Notices";
		$this->template->content = $view;
	}

	public function action_view($id = null)
	{
		/*$new_template = 'template_old';
		$this->template = 'template';*/
		
		is_null($id) and Response::redirect('notices');

		if ( ! $notice = Model_Notice::find($id))
		{
			Session::set_flash('error', 'Could not find notice #'.$id);
			Response::redirect('notices');
		}
		
		$users = Model_User::get_user_of_comment($id);
		
		$data = array(
			'notice' => $notice,
			'comments' => $users,
		);

		$this->template->title = "Notice";
		$this->template->content = View::forge('notices/view', $data);

	}

	public function action_create($id = null)
	{		
		if (Input::post())
		{
			$notice = Model_Notice::forge(array(
				'nb_title' => Input::post('nb_title'),
				'nb_message' => Input::post('nb_message'),
				'user_id' => Auth::get('id'), // adds the currently logged in user's id
			));
	 
			if ($notice and $notice->save())
			{
				Session::set_flash('success', 'Added notice #'.$notice->id.'.');
				Response::redirect('notices');
			}
			else
			{
				Session::set_flash('error', 'Could not save notice.');
			}
		}
		else
		{
			$this->template->set_global('user', $id, false);
		}
		
		$data["subnav"] = array('create'=> 'active' );
		$this->template->title = 'Notices &raquo; Create';
		$data['form'] = View::forge('notices/_form');
		$this->template->content = View::forge('notices/create', $data);

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('notices');

		if ( ! $notice = Model_Notice::find($id))
		{
			Session::set_flash('error', 'Could not find notice #'.$id);
			Response::redirect('notices');
		}

		$val = Model_Notice::validate('edit');

		if ($val->run())
		{
			$notice->nb_title = Input::post('nb_title');
			$notice->nb_message = Input::post('nb_message');

			if ($notice->save())
			{
				Session::set_flash('success', 'Updated notice #' . $id);

				Response::redirect('notices');
			}

			else
			{
				Session::set_flash('error', 'Could not update notice #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$notice->nb_title = $val->validated('nb_title');
				$notice->nb_message = $val->validated('nb_message');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('notice', $notice, false);
		}

		$this->template->title = "Notices";
		$this->template->content = View::forge('notices/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('notices');

		if ($notice = Model_Notice::find($id))
		{
			$notice->delete();

			Session::set_flash('success', 'Deleted notice #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete notice #'.$id);
		}

		Response::redirect('notices');

	}

}
