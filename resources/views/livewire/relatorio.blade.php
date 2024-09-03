<section>
    <x-app-layout>
        <div class="flex flex-col lg:flex-row items-center justify-between mb-4">
            <div class="font-black text-3xl text-[#003CA2] mb-4 lg:mb-0">Relatório de Descargas</div>

            <div class="flex flex-col lg:flex-row lg:space-x-4 space-y-4 lg:space-y-0 items-center w-full">
                <!-- Formulário de Filtro e Botões -->
                <div class="flex flex-col lg:flex-row justify-center space-y-4 lg:space-y-0 lg:space-x-4 items-center w-full">
                    <!-- Seleção de Ano -->
                    <div class="w-full lg:w-1/4">
                        <label for="year" class="block text-sm font-medium text-gray-700">Ano</label>
                        <select id="year" class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option value="">Todos os Anos</option>
                            @foreach($years as $year)
                                <option value="{{ $year }}">{{ $year }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Seleção de Mês -->
                    <div class="w-full lg:w-1/4">
                        <label for="month" class="block text-sm font-medium text-gray-700">Mês</label>
                        <select id="month" wire:model="selectedMonth" class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option value="">Todos os Meses</option>
                            @foreach($months as $index => $month)
                                <option value="{{ $index }}">{{ $month }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Seleção de Dia -->
                    <div class="w-full lg:w-1/4">
                        <label for="day" class="block text-sm font-medium text-gray-700">Dia</label>
                        <select id="day" wire:model="selectedDay" class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option value="">Todos os Dias</option>
                            @for($i = 1; $i <= 31; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>

                    <!-- Botões de Filtro -->
                    <div class="flex space-x-4">
                        <!-- Botão para Filtrar -->
                        <button type="button" id="filter-btn" wire:click.prevent="applyFilters" class="border border-gray-300 text-gray-700 hover:text-blue-500 rounded-md p-2 mt-4 lg:mt-0">
                            <x-icon name="o-magnifying-glass" class="w-5 h-5" alt="Filtrar" />
                        </button>

                        <!-- Botão para Limpar Filtros -->
                        <button type="button" id="clear-btn" wire:click.prevent="clearFilters" class="border border-gray-300 text-gray-700 hover:text-red-500 rounded-md p-2 mt-4 lg:mt-0">
                            <x-icon name="o-x-circle" class="w-5 h-5" alt="Limpar" />
                        </button>
                    </div>
                </div>
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
                    <tbody id="descargas-table-body">
                    @foreach($descargas as $descarga)
                        <tr data-date="{{ \Carbon\Carbon::parse($descarga->data)->format('Y-m-d') }}" class="border-b">
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

        <!-- Script para filtro -->
        <script>
            document.getElementById('filter-btn').addEventListener('click', function() {
                const year = document.getElementById('year').value;
                const month = document.getElementById('month').value.padStart(2, '0');  // Garantir que o mês tenha dois dígitos
                const day = document.getElementById('day').value.padStart(2, '0');  // Garantir que o dia tenha dois dígitos

                const rows = document.querySelectorAll('#descargas-table-body tr');

                rows.forEach(row => {
                    const date = row.getAttribute('data-date');
                    const [rowYear, rowMonth, rowDay] = date.split('-');

                    // Mostrar a linha se todos os filtros corresponderem ou não estiverem selecionados
                    if ((year === "" || year === rowYear) &&
                        (month === "" || month === rowMonth) &&
                        (day === "" || day === rowDay)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });

            document.getElementById('clear-btn').addEventListener('click', function() {
                document.getElementById('year').value = '';
                document.getElementById('month').value = '';
                document.getElementById('day').value = '';

                // Mostrar todas as linhas
                const rows = document.querySelectorAll('#descargas-table-body tr');
                rows.forEach(row => {
                    row.style.display = '';
                });
            });
        </script>
    </x-app-layout>
</section>
