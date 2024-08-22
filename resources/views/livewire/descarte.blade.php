<section class="flex justify-center items-center min-h-screen bg-gray-100">
    <x-app-layout>
        <div class="flex flex-col justify-center items-center bg-white p-6 rounded-lg shadow-md w-full ">
            <form method="post" wire:submit.prevent="create" class="space-y-5 w-full text-center">
                <label for="placa" class="block text-gray-800 text-lg font-semibold">Selecione a Placa: (Opcional)</label>

                <select name="placa" id="placa" class="form-select w-6/12 border-gray-300 rounded-md shadow-sm" wire:model="placa" required>
                    <option value="">Selecione</option>
                    @forelse($placas as $placa)
                        <option value="{{ $placa->id }}">{{ $placa->placa }}</option>
                    @empty
                        <option value="">Nenhuma placa encontrada</option>
                    @endforelse
                </select>

                <button id="start-btn" wire:click.prevent="captureStart" class="bg-blue-500 text-lg text-white px-8 py-2.5 rounded-md hover:bg-blue-600 w-6/12" required>Iniciar</button>
                <br>
                @error('placa') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror <br>

                <div class="timer-display" id="timer">00:00:00</div>

                <button id="stop-btn" type="submit"class="bg-green-500 text-lg text-white px-8 py-2.5 rounded-md hover:bg-green-600 w-6/12">Finalizar</button>
            </form>
            <hr class="my-4 border-gray-300 w-full">
            <script src="timer.js"></script>
        </div>
    </x-app-layout>
</section>
