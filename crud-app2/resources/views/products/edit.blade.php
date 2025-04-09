<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-md">
        <h1 class="text-2xl font-semibold text-center text-gray-800 mb-6">Edit a Product</h1>

        @if($errors->any())
        <ul class="mb-4 text-red-600 text-sm list-disc list-inside">
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
        @endif

        <form action="{{ route('product.update', ['product' => $product]) }}" method="POST" class="space-y-4">
            @csrf
            @method("PUT")
            
            <div>
                <label class="block text-sm font-medium text-gray-700" for="name">Name</label>
                <input type="text" name="name" placeholder="Name" value="{{ $product->name }}" class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700" for="qty">Qty</label>
                <input type="text" name="qty" placeholder="Qty" value="{{ $product->qty }}" class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700" for="price">Price</label>
                <input type="text" name="price" placeholder="Price" value="{{ $product->price }}" class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700" for="description">Description</label>
                <input type="text" name="description" placeholder="Description" value="{{ $product->description }}" class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition">Update Product</button>
            </div>
        </form>
    </div>
</body>
</html>
