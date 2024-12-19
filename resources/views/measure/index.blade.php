<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Measures') }}
        </h2>


    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">


                <div class="p-6 text-gray-900">
                <div class="new"> 
                    <form action="{{ route('bloodtest.store') }}" method="POST" >
                        @csrf
                        Name: <input name="name" required>
                        Unit: <input name="unit" required>
                        <x-primary-button>{{ __('Save') }}</x-primary-button>
                    </form>
                </div>
                </div>
                <div class="p-6 text-gray-900">
                    Measures list:
                    <table class="list">
                        <thead>
                            <tr class="item">
                                <td>Name</td>
                                <td>Unit</td>
                                <td>Normal Values</td>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($measures as $measure)
                            <tr class="item">
                                <td>{{$measure->description}}</td>
                                <td>{{$measure->unit}}</td>
                                <td>{{$measure->normalValuesText()}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>   
</x-app-layout>
