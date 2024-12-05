<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My tests') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="new"> 
                        Filter by:
                        <form action="{{ route('bloodtest.index') }}" method="GET" >
                            @csrf
                            Date: <input name="date" type="date">
                            Measure <select name="measure_id" >
                                <option value="">-</option>
                                @foreach ($measures as $measure)
                                    <option value="{{ $measure->id }}" {{ $measure->id == old('measure_id') ? 'selected' : '' }}>{{ $measure->description }}</option>
                                @endforeach
                            </select>
                            <x-primary-button>{{ __('Apply') }}</x-primary-button>
                        </form>
                    </div>
                </div>
                <div class="p-6 text-gray-900">
                    Tests list:
                    <table class="list">
                        <thead>
                            <tr class="item">
                                <td>Date</td>
                                <td>Measure</td>
                                <td>Value</td>
                                <td>Unit</td>
                                <td>Range</td>
                                <td>Evaluation*</td>
                            </tr>
                        </thead>
                        <tbody>
                        @php
                            $total=0;
                        @endphp
                        @foreach($bloodtests as $bloodtest)
                            <tr class="item">
                                <td>{{$bloodtest->date}}</td>
                                <td>{{$bloodtest->description()}}</td>
                                <td class="numericItem">{{$bloodtest->value}}</td>
                                <td>{{$bloodtest->unit()}}</td>
                                <td>
                                   @php
                                   $minValue = $bloodtest->minValue();
                                   $maxValue = $bloodtest->maxValue();
                                   if(is_null($minValue)){
                                        echo "<".$maxValue;
                                   }
                                   else{
                                        if(is_null($maxValue)){
                                            echo ">".$minValue;
                                        }
                                        else{
                                            echo $minValue." - ".$maxValue;
                                        }
                                   }
                                   @endphp 
                                </td>
                                <td class="numericItem"> 
                                    @php
                                    $evaluation = "in range";
                                    if(!is_null($maxValue) && $bloodtest->value > $maxValue){
                                        $evaluation = "HIGH";
                                    }
                                    else if(!is_null($minValue) && $bloodtest->value < $minValue){
                                        $evaluation = "LOW";
                                    }
                                    echo $evaluation;
                                    @endphp              
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>   
</x-app-layout>
