@if($errors->any())
    <div class="bg-red-900/40 border border-red-700 text-red-300 px-4 py-3 rounded mb-6">
        <ul class="list-disc list-inside text-sm">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="space-y-5">
    <div>
        <label class="block text-sm text-gray-400 mb-1">Nome do Evento</label>
        <input type="text" name="nome" value="{{ old('nome', $evento->nome ?? '') }}"
               class="w-full bg-gray-800 border border-gray-700 text-white rounded-lg px-4 py-2 focus:border-red-500 focus:outline-none">
    </div>

    <div>
        <label class="block text-sm text-gray-400 mb-1">Descrição</label>
        <textarea name="descricao" rows="4"
                  class="w-full bg-gray-800 border border-gray-700 text-white rounded-lg px-4 py-2 focus:border-red-500 focus:outline-none">{{ old('descricao', $evento->descricao ?? '') }}</textarea>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label class="block text-sm text-gray-400 mb-1">Data</label>
            <input type="date" name="data"
                   value="{{ old('data', isset($evento) && $evento->data ? $evento->data->format('Y-m-d') : '') }}"
                   class="w-full bg-gray-800 border border-gray-700 text-white rounded-lg px-4 py-2 focus:border-red-500 focus:outline-none">
        </div>
        <div>
            <label class="block text-sm text-gray-400 mb-1">Turno</label>
            <select name="turno" class="w-full bg-gray-800 border border-gray-700 text-white rounded-lg px-4 py-2 focus:border-red-500 focus:outline-none">
                @foreach(['Manhã','Tarde','Noite'] as $turno)
                    <option value="{{ $turno }}" {{ old('turno', $evento->turno ?? '') == $turno ? 'selected' : '' }}>
                        {{ $turno }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label class="block text-sm text-gray-400 mb-1">Local</label>
            <input type="text" name="local" value="{{ old('local', $evento->local ?? '') }}"
                   class="w-full bg-gray-800 border border-gray-700 text-white rounded-lg px-4 py-2 focus:border-red-500 focus:outline-none">
        </div>
        <div>
            <label class="block text-sm text-gray-400 mb-1">Vagas <span class="text-gray-600">(opcional)</span></label>
            <input type="number" name="vagas" value="{{ old('vagas', $evento->vagas ?? '') }}" min="1"
                   class="w-full bg-gray-800 border border-gray-700 text-white rounded-lg px-4 py-2 focus:border-red-500 focus:outline-none">
        </div>
    </div>

    <div>
        <label class="block text-sm text-gray-400 mb-1">Imagem</label>
        @if(isset($evento) && $evento->imagem)
            <img src="{{ Storage::url($evento->imagem) }}" class="h-24 rounded mb-2 object-cover">
        @endif
        <input type="file" name="imagem" accept="image/*"
               class="w-full bg-gray-800 border border-gray-700 text-gray-400 rounded-lg px-4 py-2 focus:outline-none">
    </div>
</div>