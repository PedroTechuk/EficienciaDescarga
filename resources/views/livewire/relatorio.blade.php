<section>
    <x-app-layout>
        <div class="flex items-center justify-between mb-4">
            <div class="font-black text-3xl text-[#003CA2]">Relatório de Descargas</div>

            <div class="flex items-center space-x-4">
                <!-- Filtro de Mês -->
                <div class="relative inline-block text-left">
                    <label for="monthFilter" class="sr-only">Mês</label>
                    <select id="monthFilter" wire:model="selectedMonth" class="bg-white border border-gray-300 text-gray-700 py-2 px-4 pr-8 rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                        <option value="">Todos os Meses</option>
                        @foreach (range(1, 12) as $month)
                            <option value="{{ $month }}">{{ \Carbon\Carbon::create()->month($month)->translatedFormat('F') }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Filtro de Dias -->
                <div class="relative inline-block text-left">
                    <label for="daysFilter" class="sr-only">Dias</label>
                    <select id="daysFilter" wire:model="selectedDays" class="bg-white border border-gray-300 text-gray-700 py-2 px-4 pr-8 rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                        <option value="">Dias</option>
                        <option value="0">Hoje</option>
                        <option value="7">Últimos 7 Dias</option>
                        <option value="15">Últimos 15 Dias</option>
                        <option value="30">Últimos 30 Dias</option>
                        <option value="60">Últimos 60 Dias</option>
                        <option value="90">Últimos 90 Dias</option>
                    </select>
                </div>

                <!-- Botão para Baixar CSV -->
                <x-button
                    class="bg-green-500 text-white hover:bg-green-600 focus:ring-green-400 rounded-2xl p-2 flex justify-end items-center"
                    title="Baixar CSV"
                    onclick="window.location='{{ route('descargas.csv') }}'"
                >
                    <span class="ml-2">Baixar CSV</span>
                    <x-icon name="o-arrow-down-tray" class="w-5 h-4" alt="Baixar CSV" />
                </x-button>
            </div>
        </div>

        <!-- Mensagem de sucesso -->
        @if (session()->has('message'))
            <mary-alert
                id="success-alert"
                type="success"
                dismissable="true"
                duration="5000"
                role="alert"
            >
                <strong>Sucesso!</strong> {{ session('message') }}
            </mary-alert>
        @endif

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
                            <td class="py-2 px-4 text-center">{{ $descarga->placa?->placa }}</td>
                            <td class="py-2 px-4 text-center">{{ $descarga->hora_inicio }}</td>
                            <td class="py-2 px-4 text-center">{{ $descarga->hora_fim }}</td>
                            <td class="py-2 px-4 text-center">{{ \Carbon\Carbon::parse($descarga->data)->format('d/m/Y') }}</td>
                            <td class="py-2 px-4 text-right">
                                <div class="flex justify-end space-x-2">
                                    <x-button
                                        class="bg-red-500 text-white hover:bg-red-600 focus:ring-red-400 rounded-2xl p-2 flex items-center justify-center"
                                        title="Excluir"
                                        wire:click="delete({{ $descarga->id }})"
                                        wire:confirm="Tem certeza que deseja excluir este relatório?"
                                    >
                                        <x-icon name="o-trash" class="w-5 h-5" alt="Excluir" />
                                    </x-button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </x-app-layout>
</section>
