@extends('layouts.app')
@section('content')
<div class="flex justify-center">
    <div class="w-8/12 bg-white p-6 rounded-lg">
<h4>My Essay</h4>

<form action="{{ route('students.update',$post) }}" method="POST">

    @csrf
    @method('PUT')
<div class="mt-4 ">
    <label for="title"></label>
    <input name="title" id="title" cols="30" rows="2" class="bg-gray-100 w-full rounded-lg  @error('title')
border-red-500
    @enderror" value="{{ $post->title }}">
    @error('title')
<div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
    @enderror
</div>
<div class="mt-4">
    <label for="description"></label>
    <textarea name="description" id="description" cols="30" rows="5" class="bg-gray-100 w-full rounded-lg @error('description')
border-red-500 text-sm
    @enderror" >{{ $post->description }}
</textarea>
@error('description')
<div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
@enderror
</div>
<div class="mb-4">
    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-lg">Submit Essay</button>
</div>
</form>
    </div>
</div>
@endsection
