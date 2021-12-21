@extends('layouts.app')
@section('content')
<div class="flex justify-center">
    <div class="w-8/12 bg-white p-6 rounded-lg">
<h4>My Posts</h4>

<form action="{{ route('posts') }}" method="POST">
@csrf
<div class="mt-4 ">
    <label for="title"></label>
    <textarea name="title" id="title" cols="30" rows="2" class="bg-gray-100 w-full rounded-lg  @error('title')
border-red-500
    @enderror" placeholder="Please Input title"></textarea>
    @error('title')
<div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
    @enderror
</div>
<div class="mt-4">
    <label for="description"></label>
    <textarea name="description" id="description" cols="30" rows="5" class="bg-gray-100 w-full rounded-lg @error('description')
border-red-500 text-sm
    @enderror" placeholder="Write your esssay">
</textarea>
@error('description')
<div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
@enderror
</div>
<div class="mb-4">
    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-lg">Submit Essay</button>
</div>
</form>
@if ($posts->count())
<h3>You have {{ $posts->count() }} posts</h3>

<div class="container flex justify-center mx-auto">
<div class="flex flex-col">
<div class="w-full">
    <div class="border-b border-gray-200 shadow">
    <table>
<thead bg-gray-50>
    <th cass="py-2 text-xs text-gray-500"> Email</th>
    <th cass="py-2 text-xs text-gray-500"> Class</th>
    <th cass="py-2 text-xs text-gray-500">&nbsp;</th>
    <th cass="py-2 text-xs text-gray-500">&nbsp;</th>
    <th cass="py-2 text-xs text-gray-500">&nbsp;</th>
</thead>
<tbody class="bg-white">
    @foreach ($posts as $post )
    <tr class="whitespace-nowrap">
      <td class="px-6 py-4 text-bold text-gray-900">
          <div class="">{{ $post->title }}</div>
      </td>
      <td class="px-6 py-4"><div class="text-sm text-gray-500">{{$post->created_at->diffForHumans() }}</div></td>

        <!-- Delete Button -->
        <td class="px-6 py-4">
            <form action="{{ route('posts.destroy',$post) }}" method="POST">
                @csrf
                @method('DELETE')

                <button class="px-4 py-1 text-sm text-white bg-red-800 rounded">Delete Essay</button>
            </form>
            </td>
            {{-- update Task --}}
            <td class="px-6 py-4">
                <a href="{{ route('posts.editPost',$post) }}">
                    <button class="px-4 py-1 text-sm text-white bg-blue-800 rounded" >Update Essay</button></a>
                </td>
                {{-- View Task --}}
            <td class="px-6 py-4">
                <a href="{{ route('posts.editPost',$post) }}">
                    <button class="px-4 py-1 text-sm text-white bg-blue-800 rounded" >View Essay</button></a>
                </td>

    </tr>
    @endforeach
</tbody>
    </table>
</div>
</div>


@else
Post an essay to get started
@endif
    </div>
</div>
@endsection
