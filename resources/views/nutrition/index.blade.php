<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Gizi MBG</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 font-sans">

    <div class="container mx-auto p-6 max-w-6xl">
        <header class="mb-8 text-center">
            <h1 class="text-3xl font-bold text-blue-700">Kalkulator Gizi Makan Bergizi Gratis (MBG)</h1>
            <p class="text-gray-600 mt-2">Uji standar kelayakan nutrisi kombinasi menu piring makan anak sekolah.</p>
        </header>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            
            <!-- FORM INPUT PAKET MENU -->
            <div class="lg:col-span-2 bg-white p-6 rounded-lg shadow">
                <h2 class="text-xl font-semibold mb-4 text-gray-700 border-b pb-2">Form Rencana Menu</h2>
                
                <form action="{{ route('nutrition.calculate') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Paket Menu</label>
                        <input type="text" name="menu_name" placeholder="Misal: Paket Komplit SD Clean" class="w-full border-gray-300 rounded-md p-2 border focus:ring-blue-500" required>
                    </div>

                    <h3 class="text-md font-medium text-gray-700 mb-2">Pilih Komponen Makanan & Atur Porsi (Gram)</h3>
                    
                    <div class="space-y-3 max-h-96 overflow-y-auto pr-2">
                        @foreach($foods as $food)
                            <div class="flex items-center justify-between p-3 border rounded-md hover:bg-gray-50">
                                <div class="flex items-center space-x-3">
                                    <input type="checkbox" name="selected_foods[]" value="{{ $food->id }}" id="food_{{ $food->id }}" class="rounded text-blue-600">
                                    <label for="food_{{ $food->id }}" class="font-medium text-sm">
                                        {{ $food->name }} <span class="text-xs text-gray-400">({{ $food->category }})</span>
                                    </label>
                                </div>
                                <div class="w-32 flex items-center space-x-2">
                                    <input type="number" name="weight[{{ $food->id }}]" placeholder="Porsi" min="0" class="w-20 text-right border rounded p-1 text-sm border-gray-300">
                                    <span class="text-xs text-gray-500">gram</span>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <button type="submit" class="mt-6 w-full bg-blue-600 text-white p-3 rounded-md font-semibold hover:bg-blue-700 transition">
                        Hitung & Simpan Kelayakan Gizi
                    </button>
                </form>
            </div>

            <!-- SIDEBAR RIWAYAT & TARGET -->
            <div class="space-y-6">
                <!-- BOX STANDAR AKG -->
                <div class="bg-blue-50 p-6 rounded-lg border border-blue-200">
                    <h2 class="text-lg font-bold text-blue-800 mb-3">Target Sekali Makan (MBG)</h2>
                    <ul class="text-sm space-y-2 text-blue-950">
                        <li><strong>Energi:</strong> ≥ 550 - 650 kkal</li>
                        <li><strong>Protein:</strong> ≥ 18 - 22 gram</li>
                        <li>Format acuan dihitung berdasarkan standardisasi porsi kecukupan makro nutrien esensial.</li>
                    </ul>
                </div>

                <!-- HISTORY LOG -->
                <div class="bg-white p-6 rounded-lg shadow">
                    <h2 class="text-lg font-semibold mb-4 text-gray-700 border-b pb-2">Kalkulasi Terakhir</h2>
                    <div class="space-y-4">
                        @forelse($history as $item)
                            <div class="p-3 border rounded-md text-sm shadow-sm">
                                <div class="flex justify-between items-start mb-2">
                                    <h4 class="font-bold text-gray-800">{{ $item->menu_name }}</h4>
                                    <span class="px-2 py-0.5 rounded text-xs font-bold {{ $item->status == 'Memenuhi Standar MBG' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                        {{ $item->status }}
                                    </span>
                                </div>
                                <div class="grid grid-cols-2 gap-x-2 gap-y-1 text-xs text-gray-600">
                                    <div>⚡ Energi: <strong>{{ $item->total_calories }} kkal</strong></div>
                                    <div>🍗 Protein: <strong>{{ $item->total_protein }} g</strong></div>
                                    <div>🥑 Lemak: <strong>{{ $item->total_fat }} g</strong></div>
                                    <div>🍞 Karbohidrat: <strong>{{ $item->total_carbohydrate }} g</strong></div>
                                </div>
                            </div>
                        @empty
                            <p class="text-gray-400 text-sm text-center">Belum ada riwayat perhitungan.</p>
                        @endforelse
                    </div>
                </div>
            </div>

        </div>
    </div>

</body>
</html>