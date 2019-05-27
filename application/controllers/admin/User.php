<?php

/**
 *
 */
class User extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}

	public function index(){
		$user = $this->user_model->listing();
		$data = array('title' 			=> 'Daftar User ('.count($user).') data',
									'user'				=> $user,
								  'isi'					=> 'admin/user/list'
		);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function tambah(){

		$valid = $this->form_validation;

		$valid->set_rules('nama', 'Nama', 'required',
								array('required' 	=> '%s harus diisi'));
		$valid->set_rules('username', 'Username', 'required|is_unique[user.username]',
								array('required' 	=> '%s harus diisi',
											'is_unique'		=> '%s <strong>'.$this->input->post('nama').'</strong> sudah ada. Buat username baru'));
		$valid->set_rules('email', 'Email', 'required',
								array('required' 	=> '%s harus diisi',
											'is_unique'		=> ' %s <strong>'.$this->input->post('email').'</strong> sudah ada. masukkan email lain'));
		$valid->set_rules('password', 'Password', 'required',
								array('required' 	=> '%s harus diisi'));
		$valid->set_rules('re_password', 'Retype Password', 'required|matches[password]',
								array('required' 	=> '%s harus diisi',
											'match'			=> ' Password yang dimasukkan tidak sama'));
		$valid->set_rules('akses_level', 'Akses Level', 'required',
								array('required' 	=> '%s belum dipilih'));

		if($valid->run()){
			if(!empty($_FILES['foto']['name'])){
				$config['upload_path']   = './assets/uploads/images/';
				$config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
				$config['max_size']      = '12000'; // KB
				$this->upload->initialize($config);

				if(!$this->upload->do_upload('foto')){
					$data = array('title' 			=> 'Tambah User',
												'error'				=> $this->upload->display_errors(),
												'isi'					=> 'admin/user/tambah'
					);
					$this->load->view('admin/layout/wrapper', $data, FALSE);
				}else{
					$upload_data = array('uploads' => $this->upload->data());
					// Image Editor
					$config['image_library']  	= 'gd2';
					$config['source_image']   	= './assets/uploads/images/'.$upload_data['uploads']['file_name'];
					$config['new_image']     		= './assets/uploads/images/thumbs/';
					$config['create_thumb']   	= TRUE;
					$config['quality']       		= "100%";
					$config['maintain_ratio']   = TRUE;
					$config['width']       			= 360; // Pixel
					$config['height']       		= 360; // Pixel
					$config['x_axis']       		= 0;
					$config['y_axis']       		= 0;
					$config['thumb_marker']   	= '';

					$this->load->library('image_lib', $config);
					$this->image_lib->resize();

					$i = $this->input;

					$nama 				=	$i->post('nama');
					$username 		=	$i->post('username');
					$email				= $i->post('email');
					$password			= $i->post('password');
					$akses_level	=	$i->post('akses_level');
					$foto 				=	$upload_data['uploads']['file_name'];

					$this->user_model->tambah($nama, $username, $email, $password, $akses_level, $foto);
					$this->session->set_flashdata('msg', ' Data telah disimpan');
					redirect(base_url('admin/user'),'refresh');
				}

			}else{
				$i = $this->input;

					$nama 				=	$i->post('nama');
					$username 		=	$i->post('username');
					$email				= $i->post('email');
					$password			= $i->post('password');
					$akses_level	=	$i->post('akses_level');
					$foto 				=	$i->post('foto');

					$this->user_model->tambah($nama, $username, $email, $password, $akses_level, $foto);
					$this->session->set_flashdata('msg', ' Data telah disimpan');
					redirect(base_url('admin/user'),'refresh');
				}
			}
			$data = array('title' 			=> 'Tambah User',
										'isi'					=> 'admin/user/tambah'
			);
			$this->load->view('admin/layout/wrapper', $data, FALSE);
	}


	// edit
	public function edit($id_user){
		$user = $this->user_model->detail($id_user);

		$valid = $this->form_validation;

		$valid->set_rules('nama', 'Nama', 'required',
								array('required' 	=> '%s harus diisi'));
		$valid->set_rules('username', 'Username', 'required',
								array('required' 	=> '%s harus diisi'));
		$valid->set_rules('email', 'Email', 'required',
								array('required' 	=> '%s harus diisi'));
		$valid->set_rules('akses_level', 'Akses Level', 'required',
								array('required' 	=> '%s belum dipilih'));

		if($valid->run()){
			if(!empty($_FILES['foto']['name'])){
				$config['upload_path']   = './assets/uploads/images/';
				$config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
				$config['max_size']      = '12000'; // KB
				$this->upload->initialize($config);

				if(!$this->upload->do_upload('foto')){
					$data = array('title' 			=> 'Edit '.$user->nama,
												'user'				=> $user,
												'error'				=> $this->upload->display_errors(),
												'isi'					=> 'admin/user/edit'
					);
					$this->load->view('admin/layout/wrapper', $data, FALSE);
				}else{
					$upload_data = array('uploads' => $this->upload->data());
					// Image Editor
					$config['image_library']  	= 'gd2';
					$config['source_image']   	= './assets/uploads/images/'.$upload_data['uploads']['file_name'];
					$config['new_image']     		= './assets/uploads/images/thumbs/';
					$config['create_thumb']   	= TRUE;
					$config['quality']       		= "100%";
					$config['maintain_ratio']   = TRUE;
					$config['width']       			= 360; // Pixel
					$config['height']       		= 360; // Pixel
					$config['x_axis']       		= 0;
					$config['y_axis']       		= 0;
					$config['thumb_marker']   	= '';

					$this->load->library('image_lib', $config);
					$this->image_lib->resize();

					if(empty($user->foto)){
						unlik('./assets/uploads/images/'.$user->foto);
						unlik('./assets/uploads/images/thumbs/'.$user->foto);
					}

					$i = $this->input;

					if(empty($i->post('password'))){
						$data = array('id_user' 			=> $user->id_user,
													'nama'					=> $i->post('nama'),
													'username'			=> $i->post('username'),
													'email'					=> $i->post('email'),
													'password'			=> $user->password,
													'akses_level'		=> $i->post('akses_level'),
													'foto'					=> $upload_data['uploads']['file_name'],
												);
						$this->user_model->edit($data);
						$this->session->set_flashdata('msg', ' Data telah disimpan');
						redirect(base_url('admin/user'),'refresh');
					}else{
						$data = array('id_user' 			=> $user->id_user,
													'nama'					=> $i->post('nama'),
													'username'			=> $i->post('username'),
													'email'					=> $i->post('email'),
													'password'			=> md5($i->post('password')),
													'akses_level'		=> $i->post('akses_level'),
													'foto'					=> $upload_data['uploads']['file_name'],
												);
						$this->user_model->edit($data);
						$this->session->set_flashdata('msg', ' Data telah disimpan');
						redirect(base_url('admin/user'),'refresh');
					}

				}

			}else{
				$i = $this->input;
				if(empty($i->post('password'))){
						$data = array('id_user' 			=> $user->id_user,
													'nama'					=> $i->post('nama'),
													'username'			=> $i->post('username'),
													'email'					=> $i->post('email'),
													'password'			=> $user->password,
													'akses_level'		=> $i->post('akses_level')
												);

						$this->user_model->edit($data);
						$this->session->set_flashdata('msg', ' Data telah disimpan');
						redirect(base_url('admin/user'),'refresh');
					}else{
						$data = array('id_user' 			=> $user->id_user,
													'nama'					=> $i->post('nama'),
													'username'			=> $i->post('username'),
													'email'					=> $i->post('email'),
													'password'			=> md5($i->post('password')),
													'akses_level'		=> $i->post('akses_level')
												);

						$this->user_model->edit($data);
						$this->session->set_flashdata('msg', ' Data telah disimpan');
						redirect(base_url('admin/user'),'refresh');
					}
				}
			}
			$data = array('title' 			=> 'Edit '.$user->nama,
										'user'				=> $user,
										'isi'					=> 'admin/user/edit'
			);
			$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function delete($id_user){
		if($this->session->userdata('id_user') == "" && $this->session->userdata('username')==""){
			$this->session->set_flashdata('msg', ' Anda harus login lebih dulu');
			redirect(base_url('login'),'refresh');
		}else{
			$user = $this->user_model->detail($id_user);
			if($user->foto != ""){
				unlik('assets/uploads/images/'.$user->foto);
				unlik('assets/uploads/images/thumbs/'.$user->foto);
			}
			$this->user_model->hapus($id_user);
			$this->session->set_flashdata('msg', ' Data telah dihapus');
			redirect(base_url('admin/user'),' refresh');
		}
	}

}
