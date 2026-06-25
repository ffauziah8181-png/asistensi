<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\BaseController;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Services\ItemService;
use Illuminate\Http\Request;
use Exception;

class ItemController extends BaseController
{
    protected ItemService $svc;

    public function __construct(ItemService $svc)
    {
        $this->svc = $svc;
    }

    public function index(Request $req)
    {
        $items = $this->svc->all($req->query('category_id'));
        return $this->success($items, 'Berhasil menarik semua data Item');
    }

public function store(StoreItemRequest $req)
{
    $data = $req->validated();

    $item = $this->svc->create($data);
    return $this->success($item, 'Item berhasil dibuat', 201);
}

    public function show($id)
    {
        try {
            $item = $this->svc->find($id);
            return $this->success($item, 'Berhasil menarik satu data Item');
        } catch (Exception $e) {
            return $this->error($e->getMessage(), null, 404);
        }
    }

    public function update(UpdateItemRequest $req, $id)
    {
        $item = $this->svc->update($id, $req->validated());
        return $this->success($item, 'Item berhasil diperbarui');
    }

    public function destroy($id)
    {
        $this->svc->delete($id);
        return $this->success(null, 'Item berhasil dihapus');
    }
}