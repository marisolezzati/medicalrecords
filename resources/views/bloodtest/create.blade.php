<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="new"> 
                        Add new blood test:
                        <form action="{{ route('bloodtest.store') }}" method="POST" >
                            @csrf
                            Date: <input name="date" type="date" required>
                            Measure <select name="measure_id" required>
                                <option value="">-</option>
                                @foreach ($measures as $measure)
                                    <option value="{{ $measure->id }}" {{ $measure->id == old('measure_id') ? 'selected' : '' }}>{{ $measure->description }}</option>
                                @endforeach
                            </select>
                            Value: <input name="value" required>
                            <x-primary-button>{{ __('Save') }}</x-primary-button>
                        </form>
                        <form action="{{ route('bloodtest.index') }}" method="GET" >
                            <x-primary-button>{{ __('Cancel') }}</x-primary-button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>   
</x-app-layout>
