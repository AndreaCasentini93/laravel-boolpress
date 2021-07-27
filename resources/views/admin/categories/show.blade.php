@extends('layouts.app')

@section('title', 'WordPress | Categoria')

@section('content')
    <section>
        <div class="container">
            <h1 class="title text-center mb-5">Categoria "<span class="text-secondary">{{ $category->name }}</span>"</h1>
            <table class="table table-striped table-dark">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Titolo</th>
                    <th scope="col">Slug</th>
                    <th scope="col" colspan="3">Altro</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($category->posts as $post)
                      <tr>
                          <td>{{ $post->id }}</td>
                          <td>{{ $post->title }}</td>
                          <td>{{ $post->slug }}</td>
                          <td>
                            <a class="btn btn-success" href="{{ route('admin.posts.show', $post->id) }}">SHOW</a>
                          </td>
                          <td>
                            <a class="btn btn-primary" href="{{ route('admin.posts.edit', $post->id) }}">EDIT</a>
                          </td>
                          <td>
                            <form action="{{ route('admin.posts.destroy', $post->id) }}" onsubmit="return confirm('Sei sicuro di voler eliminare il post \'{{ $post->title }}\'')" method="POST">
                              @csrf
                              @method('DELETE')
                              <input type="submit" class="btn btn-danger" value="DELETE">
                            </form>
                          </td>
                      </tr>
                  @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection