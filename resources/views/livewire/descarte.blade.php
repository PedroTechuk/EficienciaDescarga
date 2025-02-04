<section>
    <x-app-layout>
        <div class="flex flex-col justify-center items-center bg-white p-6 rounded-lg shadow-md ">
            <form method="post" wire:submit.prevent="create" class="space-y-5 w-full flex flex-col items-center">

                <!-- Container do Leitor de QR Code -->
                <div class="p-6 rounded-lg border-blue-800 w-full max-w-md">
                    <h1 class="text-xl font-semibold text-gray-800 mb-4 text-center">Leitor de QR Code</h1>
                    <video id="reader" class="border-2 border-gray-700 rounded-lg bg-white" style="width: 100%; height: 100%;"></video>
                </div>

                <!-- Seletor de Placa -->
                <div class="w-full max-w-md mt-4">
                    <label for="placa" class="block text-gray-800 text-lg font-semibold mb-2">Selecione a Placa: (Opcional)</label>
                    <select name="placa" id="placa" class="form-select w-full border-gray-300 rounded-md shadow-sm" wire:model="placa">
                        <option value="">Selecione</option>
                        @forelse($placas as $placa)
                            <option value="{{ $placa->id }}">{{ $placa->placa }}</option>
                        @empty
                            <option value="">Nenhuma placa encontrada</option>
                        @endforelse
                    </select>
                    @error('placa') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Botão Finalizar -->

                <div class="w-full max-w-md">
                    <button id="stop-btn" type="button"
                            class="bg-green-500 text-lg text-white px-8 py-2.5 rounded-md hover:bg-green-600 w-full mt-4"
                            wire:click="create">
                        Finalizar Descarga
                    </button>
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                </div>

            </form>
            <hr class="my-4 border-gray-300 w-full">

            <!-- Scripts do QR Code -->

            <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
            <script type="text/javascript">
                let scanner = new Instascan.Scanner({ video: document.getElementById('reader'), mirror: false });
                scanner.addListener('scan', function (content) {
                    console.log('Scanned content: ' + content);
                @this.call('handleQrCodeScanned', content);
                });
                Instascan.Camera.getCameras().then(function (cameras) {
                    if (cameras.length > 0) {
                        scanner.start(cameras[0]);
                    } else {
                        console.error('Nenhuma câmera encontrada.');
                    }
                }).catch(function (e) {
                    console.error(e);
                });
                // Preencher o campo Placa
                scanner.addListener('scan', function (content) {
                    console.log('Scanned content: ' + content);
                @this.call('handleQrCodeScanned', content);

                    // Preencher o campo de seleção de placa
                    let selectElement = document.getElementById('placa');
                    let optionExists = false;

                    // Verificar se a opção já existe
                    for (let i = 0; i < selectElement.options.length; i++) {
                        if (selectElement.options[i].value === content) {
                            selectElement.selectedIndex = i;  // Selecionar a opção
                            optionExists = true;
                            break;
                        }
                    }

                    // Se a opção não existir, adicionar uma nova
                    if (!optionExists) {
                        let newOption = document.createElement('option');
                        newOption.value = content;
                        newOption.text = content;
                        selectElement.add(newOption);
                        selectElement.value = content;  // Selecionar a nova opção
                    }

                    // Atualizar o valor da variável Livewire
                @this.set('placa', content);
                });
            </script>

        </div>
    </x-app-layout>
</section>
