<?php

namespace App\Controllers;

use App\Entities\HobbyEntity;
use App\Models\HobbyModel;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class Hobbies extends ResourceController
{

    public function __construct()
    {
        helper('rest_api');
    }

    protected $modelName = HobbyModel::class;

    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        return send_success($this->model->findAll());
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $hobby = $this->model->find($id);
        if (is_null($hobby)) {
            return send_error(['Not found'], ResponseInterface::HTTP_NOT_FOUND);
        }


        return $this->respond([
            'success'   => true,
            'data'      => $hobby
        ]);
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        if (!$this->validate([
            'nama'  => 'required|is_unique[hobi.nama]|min_length[3]',
            'hobi'  => 'required|min_length[5]',
        ])) {
            return $this->respond([
                'success'   => false,
                'errors'    => $this->validator->getErrors()
            ], ResponseInterface::HTTP_BAD_REQUEST);
        }

        $json = $this->request->getJSON();


        $hobi = new HobbyEntity();
        $hobi->nama = $json->nama;
        $hobi->hobi = $json->hobi;
        $this->model->save($hobi);

        return $this->respond([
            'success'   => true,
            'message'   => 'Hobi telah ditambahkan'
        ]);
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        if (!$this->validate([
            'nama'  => 'required|min_length[3]',
            'hobi'  => 'required|min_length[5]',
        ])) {
            return $this->respond([
                'success'   => false,
                'errors'    => $this->validator->getErrors()
            ], ResponseInterface::HTTP_BAD_REQUEST);
        }

        $hobby = $this->model->find($id);
        if (is_null($hobby)) {
            return $this->respond([
                'success'   => false,
                'error'    => 'Not found'
            ], ResponseInterface::HTTP_NOT_FOUND);
        }

        $json = $this->request->getJSON();

        $hobby->nama = $json->nama;
        $hobby->hobi = $json->hobi;
        
        $this->model->save($hobby);

        return $this->respond([
            'success'   => true,
            'message'   => 'Hobi telah diperbaharui'
        ]);
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $hobby = $this->model->find($id);
        if (is_null($hobby)) {
            return $this->respond([
                'success'   => false,
                'error'    => 'Not found'
            ], ResponseInterface::HTTP_NOT_FOUND);
        }

        $this->model->delete($id);

        return $this->respond([
            'success'   => true,
            'message'   => 'Hobi telah dihapus'
        ]);
    }
}
