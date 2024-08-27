<section>
    <x-app-layout>

        <!--Titulo-->
        <div class="flex items-center justify-between mb-4">
            <div class="font-black text-3xl text-[#003CA2]">Placas</div>

            <!-- Botão para abrir o modal -->
            <x-button class="bg-green-500 text-white hover:bg-green-600 focus:ring-green-400 rounded-2xl p-2 flex items-center" title="Adicionar" wire:click="openModal">
                <span class="ml-2">Adicionar</span>
                <x-icon name="o-plus" class="w-5 h-4" alt="Adicionar" />
            </x-button>

            <!-- Modal -->
            @if($isOpen)
                <div class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                        <!-- Background overlay -->
                        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" wire:click="closeModal"></div>

                        <!-- Modal content -->
                        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                <div class="sm:flex sm:items-start">
                                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                            Adicionar Placa
                                        </h3>
                                        <div class="mt-2 flex items-center">
                                            <label for="placa" class="block text-md font-medium text-gray-700">Placa:</label>
                                            <input type="text" id="placa" wire:model="placa" class="mt-1 ms-1 block w-40 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">

                                            @error('placa')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                            @enderror

                                            <div class="ml-4 flex items-center space-x-2">
                                                <span class="text-md font-medium text-gray-700">Mercosul</span>
                                                <label for="mercosul" class="inline-flex items-center cursor-pointer relative">
                                                    <input type="checkbox" id="mercosul" wire:model="mercosul" class="sr-only peer" />
                                                    <div class="w-11 h-6 bg-gray-200 rounded-full peer-checked:bg-blue-500 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-blue-300 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-0.5 after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:after:transition-all"></div>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="mt-4">
                                            <label for="frota" class="block text-md font-medium text-gray-700">Frota:</label>
                                            <select id="frota" wire:model="frota" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md">
                                                <option value="">Selecione</option>
                                                <option value="Fixa">Fixa</option>
                                                <option value="Freteiro">Freteiro</option>
                                            </select>

                                            @error('frota')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                <button type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm" wire:click="save">
                                    Adicionar
                                </button>
                                <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:mt-0 sm:w-auto sm:text-sm" wire:click="closeModal">
                                    Cancelar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

        </div>

        <!--layout-->
        <div class="flex flex-col text-lg space-y-4">
            <div class="overflow-x-auto">
                <!-- Tabela -->
                <table class="min-w-full bg-white border border-gray-200">
                    <thead>
                    <tr>
                        <th class="py-2 px-4 bg-gray-100 border-b text-left text-gray-800">Placa</th>
                        <th class="py-2 px-4 bg-gray-100 border-b text-left text-gray-800">Frota</th>
                        <th class="py-2 px-4 bg-gray-100 border-b text-right text-gray-800"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($placas as $placa)
                        <tr class="border-b">
                            <td class="py-2 px-4">{{ $placa->placa }}</td>
                            <td class="py-2 px-4">{{ $placa->frota }}</td>
                            <td class="py-2 px-4 text-right">
                                <div class="flex justify-end space-x-2">
                                    <x-button class="bg-gray-200 text-gray-800 hover:bg-gray-300 focus:ring-gray-400 rounded-2xl p-2 flex items-center justify-center" title="Gerar QrCode">
                                        <x-icon name="o-qr-code" class="w-6 h-5" alt="Gerar QrCode" />
                                    </x-button>
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
