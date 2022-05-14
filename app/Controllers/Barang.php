<?php namespace App\Controllers;

use App\Models\Modelbrg;
use CodeIgniter\API\ResponseTrait;
USE CodeIgniter\RESTful\ResourceController;


class Barang extends ResourceController
{
    use ResponseTrait;
    public function index()
    {
        $model = new Modelbrg();
        $data = $model->findAll();
        return $this->respond($data, 200);
    }

    public function show($kode = null)
    {
        $model = new Modelbrg();
        $data = $model->getWhere(['kode' => $kode])->getResult();
        if ($data) {
            return $this->respond($data);
        } else {
            return $this->failNotFound('No Data Found with id '.$kode);
        }
    }

    public function create()
    {
        $model = new Modelbrg();
        $data = [
            'kode' => $this->request->getPost('kode'),
            'nama' => $this->request->getPost('nama'),
            'jenis' => $this->request->getPost('jenis'),
            'satuan' => $this->request->getPost('satuan'),
            'stok' => $this->request->getPost('stok'),
            'harga' => $this->request->getPost('harga'),
            'supplier' => $this->request->getPost('supplier')
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

    public function delete($kode = null)
    {
        $modelMhs = new Modelbrg();
        $cekData = $modelMhs->find($kode);
        if ($cekData){
            $modelMhs->delete($kode);
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

    public function update($kode = null)
    {
        $modelMhs = new Modelbrg();
        $json =$this->request->getJSON();
        if ($json) {
            $data = [
                'nama' => $json-> nama,
                'jenis' => $json-> jenis,
                'satuan' => $json-> satuan,
                'stok' => $json-> stok,
                'harga' => $json-> harga,
                'supplier' => $json-> supplier
            ];
        }
        $modelMhs->update($kode, $data);
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
        $model = new Modelbrg();
        $data['barang'] = $model->getBarang()->getResultArray();
        return view('view_barang', $data);
    }
}
