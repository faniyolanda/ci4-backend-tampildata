<?php namespace App\Controllers;

use App\Models\Modelsepeda;
use CodeIgniter\API\ResponseTrait;
USE CodeIgniter\RESTful\ResourceController;


class Sepeda extends ResourceController
{
    use ResponseTrait;

    public function index()
    {
        $model = new Modelsepeda();
        $data = $model->findAll();
        return $this->respond($data, 200);
    }

    public function show($kode = null)
    {
        $model = new Modelsepeda();
        $data = $model->getWhere(['kode => $kode'])->getResult();
        if ($data) {
            return $this->respond($data);
        } else {
            return $this->failNotFound('No Data Found with id '.$kode);
        }
    }

    public function create()
    {
        $model = new Modelsepeda();
        $data = [
            'kode' => $this->request->getPost('kode'),
            'jenis' => $this->request->getPost('jenis'),
            'harga' => $this->request->getPost('harga'),
            'jumlah' => $this->request->getPost('jumlah')
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
    
    public function tampil()
    {
        $model = new Modelsepeda();
        $data['sepeda'] = $model->getSepeda()->getResultArray();
        return view('view_sepeda', $data);
    }

}
