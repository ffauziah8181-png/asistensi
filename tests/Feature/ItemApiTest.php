<?php

namespace Tests\Feature;

use App\Models\Item;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ItemApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_get_all_items(): void
    {
        Category::factory()->count(1)->create();
        Item::factory()->count(3)->create();

        $response = $this->getJson('/api/v1/items');

        $response->assertStatus(200);
    }

    public function test_can_create_an_item(): void
    {
        $category = Category::factory()->create();

        $payload = [
            'name'        => 'Item Test',
            'price'       => 50000,
            'stock'       => 10,
            'category_id' => $category->id,
        ];

        $response = $this->postJson('/api/v1/items', $payload);

        $response->assertStatus(201);
        $this->assertDatabaseHas('items', ['name' => 'Item Test']);
    }

    public function test_can_update_an_item(): void
    {
        $category = Category::factory()->create();
        $item = Item::factory()->create(['category_id' => $category->id]);

        $response = $this->putJson("/api/v1/items/{$item->id}", [
            'name'        => 'Nama Baru',
            'price'       => 75000,
            'stock'       => 5,
            'category_id' => $category->id,
        ]);

        $response->assertStatus(200);
        $this->assertDatabaseHas('items', ['name' => 'Nama Baru']);
    }

    public function test_can_delete_an_item(): void
    {
        $this->withoutMiddleware();
        $category = Category::factory()->create();
        $item = Item::factory()->create(['category_id' => $category->id]);

        $response = $this->deleteJson("/api/v1/items/{$item->id}");

        $response->assertStatus(200);
        $this->assertDatabaseMissing('items', ['id' => $item->id]);
    }
}