<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Champion extends CI_Controller {

	function index()
	{
		$this->load->view('champion_view');
	}

	function action()
	{
		if($this->input->post('data_action'))
		{
			$data_action = $this->input->post('data_action');

			if($data_action == "Delete")
			{
				$api_url = "http://localhost/restclient-1818007/api/delete";

				$form_data = array(
					'id_champion'		=>	$this->input->post('id_champion')
				);

				$client = curl_init($api_url);
				curl_setopt($client, CURLOPT_POST, true);
				curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
				curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
				$response = curl_exec($client);
				curl_close($client);
				echo $response;

			}
			if($data_action == "Edit")
			{
				$api_url = "http://localhost/restclient-1818007/api/update";
				$form_data = array(
					'nama'			=>	$this->input->post('nama'),
					'role'			=>	$this->input->post('role'),
					'lane'			=>	$this->input->post('lane'),
					'region'		=>	$this->input->post('region'),
					'gender'		=>	$this->input->post('gender'),
					'difficulty'	=>	$this->input->post('difficulty'),
					'id_champion'	=>	$this->input->post('id_champion')
				);
				$client = curl_init($api_url);
				curl_setopt($client, CURLOPT_POST, true);
				curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
				curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
				$response = curl_exec($client);
				curl_close($client);
				echo $response;
			}

			if($data_action == "fetch_single")
			{
				$api_url = "http://localhost/restclient-1818007/api/fetch_single";
				$form_data = array(
					'id_champion'		=>	$this->input->post('id_champion')
				);
				$client = curl_init($api_url);
				curl_setopt($client, CURLOPT_POST, true);
				curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
				curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
				$response = curl_exec($client);
				curl_close($client);
				echo $response;
			}

			if($data_action == "Insert")
			{
				$api_url = "http://localhost/restclient-1818007/api/insert";
				$form_data = array(
					'nama'			=>	$this->input->post('nama'),
					'role'			=>	$this->input->post('role'),
					'lane'			=>	$this->input->post('lane'),
					'region'		=>	$this->input->post('region'),
					'gender'		=>	$this->input->post('gender'),
					'difficulty'	=>	$this->input->post('difficulty')
				);

				$client = curl_init($api_url);
				curl_setopt($client, CURLOPT_POST, true);
				curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
				curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
				$response = curl_exec($client);
				curl_close($client);
				echo $response;
			}

			if($data_action == "fetch_all")
			{
				$api_url = "http://localhost/restclient-1818007/api";
				$client = curl_init($api_url);
				curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
				$response = curl_exec($client);
				curl_close($client);
				$result = json_decode($response);
				$output = '';
				if(count($result) > 0)
				{
					foreach($result as $row)
					{
						$output .= '
						<tr>
							<td>'.$row->nama.'</td>
							<td>'.$row->role.'</td>
							<td>'.$row->lane.'</td>
							<td>'.$row->region.'</td>
							<td>'.$row->gender.'</td>
							<td>'.$row->difficulty.'</td>
							<td><butto type="button" name="edit" class="btn btn-info btn-xs edit" id="'.$row->id_champion.'">Edit Data</button></td>
							<td><button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'.$row->id_champion.'">Hapus Data</button></td>
						</tr>

						';
					}
				}
				else
				{
					$output .= '
					<tr>
						<td colspan="4" align="center">No Data Found</td>
					</tr>
					';
				}

				echo $output;
			}
		}
	}
}
?>