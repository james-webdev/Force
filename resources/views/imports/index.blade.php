@extends('layouts.app')
@section('content')
<h2>Import File</h2>

<p class="mt-4 text-2xl"> Import your Excel files to Force here:</p>
<p>Select import type and file</p>
<form name="imports"
    action="{{route('import.store')}}"
    method="post"
    enctype="multipart/form-data">
    @csrf
    <div class="flex flex-col mb-4 md:w-full">
        <label class="mb-2 uppercase font-bold text-lg text-grey-darkest" for="status">Type</label>
        <select required class="border py-2 px-3 text-grey-darkest" name="type" id="type">
          @foreach ($imports as $import)
            <option value="{{$import}}">{{$import}}</option>

          @endforeach
        </select>
    </div>
    <div class="flex flex-col mb-4 md:w-full">
       <label for="input-file-import">Upload  File</label>
       <input type="file"
        id="input-file-import"
         name="file_import"
         ref="import_file"
         >
        <button class="bg-teal-400  hover:bg-teal-700 text-white font-bold py-2 px-4 rounded ml-4 mt-3 mr-15" type="submit">Submit</button>
    </div>
@endsection