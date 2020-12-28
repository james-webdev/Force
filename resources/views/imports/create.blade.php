@extends('layouts.app')
@section('content')

<form

    method="post"
    name="importMapping"
    action="{{route('import.mapping', $data->id)}}"
    >
    @csrf
    
<table class="table-fixed">
    <thead>
        <th class="w-1/4">Field</th>
        <th class="w-1/4">Mapping</th>
        <th class="w-1/2" colspan="3">Example Data</th>
    </thead>
    <tbody>

        @foreach ($fileData[0] as $dataid=>$importField)
            <tr>
                <td>{{strtolower($importField)}}</td>
                <td>
                    <select name="{{strtolower($importField)}}">
                        <option value="ignore">Ignore</option>
                        @foreach ($fields as $field)
                            <option @if(strtolower($field) == strtolower($importField)) selected @endif
                                value="{{$field}}">
                                {{$field}}
                            </option>
                        @endforeach
                    </select>
                </td>
                @for ($i=2; $i < 5; $i++)
                    
                    <td>{{$fileData[$i][$dataid]}}</td>
                 
                @endfor
            </tr>
        @endforeach
    </tbody>
</table>

<input type="submit" class="button" name="submit" value= "Map Fields" />
</form>
@endsection