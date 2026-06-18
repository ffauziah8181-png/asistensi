### Get Items dengan Filter Category
- Method: GET
- URL: /api/v1/items?category_id={id}
- Header: Authorization: Bearer {token}
- Query Parameter:
  - category_id (optional): filter item berdasarkan ID category
- Response 200 (dengan filter):
{
    "success": true,
    "message": "Berhasil menarik semua data Item",
    "data": [
        {
            "id": 1,
            "category_id": 1,
            "name": "Laptop",
            "price": 15000000,
            "stock": 10
        }
    ]
}
- Response 200 (tanpa hasil):
{
    "success": true,
    "message": "Berhasil menarik semua data Item",
    "data": []
}