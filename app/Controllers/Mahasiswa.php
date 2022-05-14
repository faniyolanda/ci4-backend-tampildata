<?php namespace App\Controllers;

use App\Models\Modelmhs;
use CodeIgniter\API\ResponseTrait;
USE CodeIgniter\RESTful\ResourceController;


class Mahasiswa extends ResourceController
{
    use ResponseTrait;

    public function index()
    {
        $model = new Modelmhs();
        $data = $model->findAll();
        return $this->respond($data, 200);
    }

    public function show($nobp = null)
    {
        $model = new Modelmhs();
        $data = $model->getWhere(['nobp' => $nobp])->getResult();
        if ($data) {
            return $this->respond($data);
        } else {
            return $this->failNotFound('No Data Found with id '.$nobp);
        }
    }

    public function create()
    {
        $model = new Modelmhs();
        $data = [
            'nobp' => $this->request->getPost('nobp'),
            'nama' => $this->request->getPost('nama'),
            'alamat' => $this->request->getPost('alamat'),
            'nohp' => $this->request->getPost('nohp')
        ];
        $data = \json_decode(file_get_contents('php://input'), true);
        $model->insert($data);
        $respon = [
            'status' => 201,
            'error' => null,
            'message' => [
                'success' => 'Data berhasil disimpan'
            ],
        ];
        return $this->respond($respon, 201);
    }

    public function delete($nobp = null)
    {
        $modelMhs = new Modelmhs();
        $cekData = $modelMhs->find($nobp);
        if ($cekData){
            $modelMhs->delete($nobp);
            $response = [
                'status' => 200,
                'error' => null,
                'message' => [
                    'success' => 'Data berhasil dihapus'
                ]
            ];
            return $this->respondDeleted($response);
        }
    }

    public function update($nobp = null)
    {
        $modelMhs = new Modelmhs();
        $json =$this->request->getJSON();
        if ($json) {
            $data = [
                'nama' => $json-> nama,
                'alamat' => $json-> alamat,
                'nohp' => $json-> nohp
            ];
        }
        $modelMhs->update($nobp, $data);
        $response = [
            'status' => 200,
            'error' => null,
            'messages' => [
                'success' => 'Data Updated'
            ]
            ];
            return $this->respond($response);
    }

    public function tampil()
    {
        $model = new Modelmhs();
        $data['mahasiswa'] = $model->getMhs()->getResultArray();
        return view('view_home', $data);
    }

}
