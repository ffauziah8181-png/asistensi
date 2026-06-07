<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\BaseController;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Services\CategoryService;
use Exception;

class CategoryController extends BaseController
{
    protected CategoryService $svc;

    public function __construct(CategoryService $svc)
    {
        $this->svc = $svc;
    }

    public function index()
    {
        return $this->success($this->svc->all(), 'Berhasil menarik semua data Category');
    }

    public function store(StoreCategoryRequest $req)
    {
        $category = $this->svc->create($req->validated());
        return $this->success($category, 'Category berhasil dibuat', 201);
    }

    public function show($id)
    {
        try {
            $category = $this->svc->find($id);
            return $this->success($category, 'Berhasil menarik satu data Category');
        } catch (Exception $e) {
            return $this->error($e->getMessage(), null, 404);
        }
    }

    public function update(UpdateCategoryRequest $req, $id)
    {
        $category = $this->svc->update($id, $req->validated());
        return $this->success($category, 'Category berhasil diperbarui');
    }

    public function destroy($id)
    {
        $this->svc->delete($id);
        return $this->success(null, 'Category berhasil dihapus');
    }
}