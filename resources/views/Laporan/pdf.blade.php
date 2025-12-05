<div class="max-w-6xl mx-auto bg-white rounded-lg shadow overflow-hidden">
        <table class="w-full text-left text-sm">
            <thead class="bg-gray-100 text-gray-700 uppercase tracking-wider">
                <tr>
                    <th class="px-6 py-4 font-semibold">Produk</th>
                    <th class="px-6 py-4 font-semibold">Kategori</th>
                    <th class="px-6 py-4 font-semibold">Stok</th>
                    <th class="px-6 py-4 font-semibold">Harga</th>
                    <th class="px-6 py-4 font-semibold">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">

                @foreach($products as $product)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-5">
                        <div class="font-medium text-gray-900">{{$product->nama}}</div>
                        <div class="text-xs text-gray-500">Kode: {{$product->kode}}</div>
                    </td>
                    <td class="px-6 py-5 text-gray-700">{{$product->kategori}}</td>
                    <td class="px-6 py-5 text-gray-700">{{$product->stok}} {{$product->satuan}}</td>
                    <td class="px-6 py-5 text-gray-700">Rp {{ number_format($product->harga, 0, ',', '.') }}</td>
                    <td class="px-6 py-5">
                        @if($product->stok <= $product->stok_minim)
                <span class="px-3 py-1 bg-red-100 text-red-600 rounded-full text-xs font-semibold">Rendah</span>
              @else
                <span class="px-3 py-1 bg-green-100 text-green-600 rounded-full text-xs font-semibold">Cukup</span>
              @endif
                    </td>
                </tr>
                @endforeach

                

            </tbody>
        </table>
    </div>