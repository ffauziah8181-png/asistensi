# Dokumentasi API Inventory

Base URL: http://127.0.0.1:8000/api/v1

## Autentikasi

### Register
- Method: POST
- URL: /api/v1/register
- Header: Content-Type: application/json
- Body:
{
    "name": "Zia",
    "email": "zia@example.com",
    "password": "password123",
    "password_confirmation": "password123"
}
- Response 201:
{
    "success": true,
    "message": "User registered",
    "data": {
        "user": {...},
        "token": "1|xxxx"
    }
}

### Login
- Method: POST
- URL: /api/v1/login
- Header: Content-Type: application/json
- Body:
{
    "email": "john@example.com",
    "password": "password123"
}
- Response 200:
{
    "success": true,
    "message": "User logged in",
    "data": {
        "user": {...},
        "token": "2|xxxx"
    }
}

## Items

### Get All Items
- Method: GET
- URL: /api/v1/items
- Header: Authorization: Bearer {token}
- Response 200:
{
    "success": true,
    "message": "Berhasil menarik semua data Item",
    "data": [...]
}

### Create Item
- Method: POST
- URL: /api/v1/items
- Header: Authorization: Bearer {token}
- Body:
{
    "name": "Laptop",
    "description": "Laptop gaming",
    "price": 15000000,
    "category_id": 1
}
- Response 201:
{
    "success": true,
    "message": "Item berhasil dibuat",
    "data": {...}
}

### Get Item by ID
- Method: GET
- URL: /api/v1/items/{id}
- Header: Authorization: Bearer {token}
- Response 200:
{
    "success": true,
    "message": "Berhasil menarik satu data Item",
    "data": {...}
}
- Response 404:
{
    "success": false,
    "message": "Item not found",
    "data": null
}

### Update Item
- Method: PUT
- URL: /api/v1/items/{id}
- Header: Authorization: Bearer {token}
- Body:
{
    "name": "Laptop Updated",
    "price": 16000000
}
- Response 200:
{
    "success": true,
    "message": "Item berhasil diperbarui",
    "data": {...}
}

### Delete Item
- Method: DELETE
- URL: /api/v1/items/{id}
- Header: Authorization: Bearer {token} (role: admin)
- Response 200:
{
    "success": true,
    "message": "Item berhasil dihapus",
    "data": null
}

## Categories

### Get All Categories
- Method: GET
- URL: /api/v1/categories
- Header: Authorization: Bearer {token}
- Response 200:
{
    "success": true,
    "message": "Berhasil menarik semua data Category",
    "data": [...]
}

### Create Category
- Method: POST
- URL: /api/v1/categories
- Header: Authorization: Bearer {token}
- Body:
{
    "name": "Electronics"
}
- Response 201:
{
    "success": true,
    "message": "Category berhasil dibuat",
    "data": {...}
}

### Get Category by ID
- Method: GET
- URL: /api/v1/categories/{id}
- Header: Authorization: Bearer {token}
- Response 200:
{
    "success": true,
    "message": "Berhasil menarik satu data Category",
    "data": {...}
}

### Update Category
- Method: PUT
- URL: /api/v1/categories/{id}
- Header: Authorization: Bearer {token}
- Body:
{
    "name": "Electronics Updated"
}
- Response 200:
{
    "success": true,
    "message": "Category berhasil diperbarui",
    "data": {...}
}

### Delete Category
- Method: DELETE
- URL: /api/v1/categories/{id}
- Header: Authorization: Bearer {token} (role: admin)
- Response 200:
{
    "success": true,
    "message": "Category berhasil dihapus",
    "data": null
}