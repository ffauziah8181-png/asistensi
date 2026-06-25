<?php

namespace App\Services;

use App\Models\Item;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;

class ItemService
{
    public function all(?int $categoryId = null): Collection
    {
        $query = Item::query();
        if ($categoryId) {
            $query->where('category_id', $categoryId);
        }
        return $query->get();
    }

    public function find(int $id): Item
    {
        return Item::findOrFail($id);
    }

    public function create(array $data): Item
    {
        Log::info('ItemService@create dipanggil', ['data' => $data]);
        $item = Item::create($data);
        Log::info('Item berhasil dibuat', ['item_id' => $item->id, 'item' => $item->toArray()]);
        return $item;
    }

    public function update(int $id, array $data): Item
    {
        Log::info('ItemService@update dipanggil', ['item_id' => $id, 'data' => $data]);
        $item = Item::findOrFail($id);
        $item->update($data);
        $item->refresh();
        Log::info('Item berhasil diupdate', ['item_id' => $item->id, 'item' => $item->toArray()]);
        return $item;
    }

    public function delete(int $id): bool
    {
        Log::info('ItemService@delete dipanggil', ['item_id' => $id]);
        $item = Item::findOrFail($id);
        $item->delete();
        Log::info('Item berhasil dihapus', ['item_id' => $id]);
        return true;
    }
}