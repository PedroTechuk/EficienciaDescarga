<section>
    <x-app-layout>
        <div class="flex items-center justify-between mb-4">
            <div class="font-black text-3xl text-[#003CA2]">Relatório de Descargas</div>

            <x-button class="bg-green-500 text-white hover:bg-green-600 focus:ring-green-400 rounded-2xl p-2 flex justify-end items-center" title="Baixar CSV">
                <span class="ml-2">Baixar CSV</span>
                <x-icon name="o-arrow-down-tray" class="w-5 h-4" alt="Baixar CSV" />
            </x-button>
        </div>

        <div class="flex flex-col text-lg space-y-4">
            <div class="overflow-x-auto">
                <!-- Tabela -->
                <table class="min-w-full bg-white border border-gray-200">
                    <thead>
                    <tr>
                        <th class="py-2 px-4 bg-gray-100 border-b text-center text-gray-800">Placa</th>
                        <th class="py-2 px-4 bg-gray-100 border-b text-center text-gray-800">Início Descarga</th>
                        <th class="py-2 px-4 bg-gray-100 border-b text-center text-gray-800">Fim Descarga</th>
                        <th class="py-2 px-4 bg-gray-100 border-b text-center text-gray-800">Data</th>
                        <th class="py-2 px-4 bg-gray-100 border-b text-center text-gray-800"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($descargas as $descarga)
                        <tr class="border-b">
                            <td class="py-2 px-4 text-center">{{ $descarga->placa->placa }}</td>
                            <td class="py-2 px-4 text-center">{{ $descarga->hora_inicio }}</td>
                            <td class="py-2 px-4 text-center">{{ $descarga->hora_fim }}</td>
                            <td class="py-2 px-4 text-center">{{ \Carbon\Carbon::parse($descarga->data)->format('d/m/Y') }}</td>
                            <td class="py-2 px-4 text-right">
                                <div class="flex justify-end space-x-2">
                                    <x-button class="bg-red-500 text-white hover:bg-red-600 focus:ring-red-400 rounded-2xl p-2 flex items-center justify-center" title="Excluir">
                                        <x-icon name="o-trash" class="w-5 h-5" alt="Excluir" />
                                    </x-button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                @if (session()->has('message'))
                    <div class="alert alert-success mt-4">
                        {{ session('message') }}
                    </div>
                @endif
            </div>
        </div>
    </x-app-layout>
</section>
