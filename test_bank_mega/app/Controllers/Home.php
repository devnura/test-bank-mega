<?php

namespace App\Controllers;
use App\Models\KaryawanModel;

use CodeIgniter\Controller;

class Home extends BaseController
{

	protected $PegawaiModel;

	public function __construct()
	{
		$this->KaryawanModel = new KaryawanModel();
	}

    public function index()
    {
        return view('welcome_message');
    }

    public function fetchData(){
        try {

            $data = $this->KaryawanModel->findAll();

            $response = [
                'status' => 200,
                'Message'  => 'Success',
                'data' => $data,
            ];

            return $this->response->setJSON($response);

        } catch(\Exception $e){
            $response = [
                'status' => 500,
                'Message' => $e->getMessage(),
                'data' => [],
            ];

            return $this->response->setJSON($response);
        }
    }

    public function getKaryawan($id){
        try {

            $data = $this->KaryawanModel->find($id);

            $response = [
                'status' => 200,
                'Message'  => 'Success',
                'data' => $data,
            ];

            return $this->response->setJSON($response);

        } catch(\Exception $e){
            $response = [
                'status' => 500,
                'Message' => $e->getMessage(),
                'data' => [],
            ];

            return $this->response->setJSON($response);
        }
    }

    public function save($id){
        try {

            if(!$this->validate([
                    'nip' => [
                        'rules' => 'required|numeric',
                        'errors' => [
                            'required' => '{field} harus diisi',
                            'is_unique' => '{field} sudah terdaftar'
                        ]
                    ],
                    'nama' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} harus diisi'
                        ]
                    ],
                    'division' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} harus diisi'
                        ]
                    ]
            ])){

                $validation = \config\Services::validation();
                // dd($validation->getErrors());implode(" ",$arr)
                $response = [
                    'status' => 400,
                    'Message'  => 'Bad request',
                    'data' => implode("<br>", $validation->getErrors()),
                ];

                return $this->response->setJSON($response);

            }

            $data = [
                "nip" => str_pad($this->request->getPost('nip'), 3, "0", STR_PAD_LEFT),
                "nama" => $this->request->getPost('nama'),
                "division" => $this->request->getPost('division')
            ];

            if($id > 0){
                $data["id"] = $id;
            }

            $data = $this->KaryawanModel->save($data);

            $response = [
                'status' => 200,
                'Message'  => 'Success',
                'data' => [],
            ];

            return $this->response->setJSON($response);

        } catch(\Exception $e){
            $response = [
                'status' => 500,
                'Message' => $e->getMessage(),
                'data' => [],
            ];

            return $this->response->setJSON($response);
        }
    }

    public function delete($id){
        try {

            $data = $this->KaryawanModel->delete($id);

            $response = [
                'status' => 200,
                'Message'  => 'Success',
                'data' => [],
            ];

            return $this->response->setJSON($response);

        } catch(\Exception $e){
            $response = [
                'status' => 500,
                'Message' => $e->getMessage(),
                'data' => [],
            ];

            return $this->response->setJSON($response);
        }
    }
}
