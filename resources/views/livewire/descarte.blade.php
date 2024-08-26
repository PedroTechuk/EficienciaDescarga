<section class="flex justify-center items-center min-h-screen bg-gray-100">
    <x-app-layout>
        <div class="flex flex-col justify-center items-center bg-white p-6 rounded-lg shadow-md w-full ">
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

                <!-- Botões -->

                <div class="w-full max-w-md">
                    <button id="start-btn" wire:click.prevent="captureStart" class="bg-blue-500 text-lg text-white px-8 py-2.5 rounded-md hover:bg-blue-600 focus:ring-2 focus:ring-blue-400 w-full mt-4">Iniciar</button>
                </div>

                <div class="timer-display text-3xl" id="timer">00:00:00</div>

                <div class="w-full max-w-md">
                    <button id="stop-btn" type="submit" class="bg-green-500 text-lg text-white px-8 py-2.5 rounded-md hover:bg-green-600 w-full mt-4">Finalizar</button>
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                </div>

            </form>
            <hr class="my-4 border-gray-300 w-full">
            <script src="timer.js"></script>

            <!-- Script Instascan -->
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
            </script>
        </div>
    </x-app-layout>
</section>
