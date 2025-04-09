<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen p-6">
    <div class="max-w-6xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Product List</h1>
            <a href="{{ route('product.create') }}">
                <button class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">Create a Product</button>
            </a>
        </div>

        @if(session()->has('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-md shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto bg-white rounded-lg shadow-md">
            <table class="min-w-full divide-y divide-gray-200 text-sm text-left">
                <thead class="bg-gray-50 text-gray-700 uppercase">
                    <tr>
                        <th class="px-6 py-3">ID</th>
                        <th class="px-6 py-3">Name</th>
                        <th class="px-6 py-3">Qty</th>
                        <th class="px-6 py-3">Price</th>
                        <th class="px-6 py-3">Description</th>
                        <th class="px-6 py-3">Edit</th>
                        <th class="px-6 py-3">Delete</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($products as $product)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4">{{ $product->id }}</td>
                        <td class="px-6 py-4">{{ $product->name }}</td>
                        <td class="px-6 py-4">{{ $product->qty }}</td>
                        <td class="px-6 py-4">${{ $product->price }}</td>
                        <td class="px-6 py-4">{{ $product->description }}</td>
                        <td class="px-6 py-4">
                            <a href="{{ route('product.edit', ['product' => $product]) }}" class="text-blue-600 hover:underline">Edit</a>
                        </td>
                        <td class="px-6 py-4">
                            <form action="{{ route('product.delete', ['product' => $product]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
