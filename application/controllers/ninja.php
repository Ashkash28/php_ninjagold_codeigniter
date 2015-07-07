<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ninja extends CI_Controller {

	public function index()
	{
		// $this->session->sess_destroy();
		$this->load->view('gold');
	}

	public function process_money()
	{
		$building = $this->input->post('building');

		if($building == 'farm')
		{
			$gold = rand(10,20);
			$total = $this->session->userdata('gold')+$gold;
			$this->session->set_userdata('gold', $total);
			// $this->session->set_userdata('total', $total);	
		}
		elseif($building == 'cave')
		{
			$gold = rand(5,10);
			$total = $this->session->userdata('gold')+$gold;
			$this->session->set_userdata('gold', $total);
			// $this->session->set_userdata('total', $total);
			
		}	
		elseif($building == 'house')
		{
			$gold = rand(2, 5);
			$total = $this->session->userdata('gold')+$gold;
			$this->session->set_userdata('gold', $total);
			// $this->session->set_userdata('total', $total);
			
		}
		elseif($building == 'casino')
		{
			$gold = rand(-50, 50);
			$total = $this->session->userdata('gold')+$gold;
			$this->session->set_userdata('gold', $total);
			// $this->session->set_userdata('total', $total);

		}

		if(empty($this->session->userdata('activities')))
		{
			$activities = array();
		}

		// $this->session->set_userdata('building', $building);

		$activities = $this->session->userdata('activities');

		
		if($gold >= 0)
		{
			$activities[] = '<p class="green">You entered a '. $building. ' and earned '. $gold. ' golds '. date('F jS Y h'). '</p>';
		}
		elseif($gold < 0)
		{
			$activities[] = '<p class="red">You entered a '. $building. ' and lost '. $gold. ' golds... Ouch... '. date('F jS Y h'). '</p>';
		}

		$this->session->set_userdata('activities', $activities);
		
		redirect('Ninja/index');
	}

	public function reset()
	{

		if($this->input->post('submit') == 'Reset')
		{
			$this->session->sess_destroy();
		}
		redirect('/');
	}
	
}