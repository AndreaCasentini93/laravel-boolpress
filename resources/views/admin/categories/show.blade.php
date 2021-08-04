@extends('layouts.app')

@section('title', 'WordPress | Categoria "' . $category->name . '"')

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
                    <th scope="col">Tecnologie</th>
                    <th scope="col" colspan="3">Altro</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($category->posts as $post)
                      <tr>
                          <td>{{ $post->id }}</td>
                          <td>{{ $post->title }}</td>
                          <td>{{ $post->slug }}</td>
                          <td>
                            @php
                                $count = 0;
                            @endphp
                            @foreach ($post->tags as $tag)
                                @php
                                    $count++;
                                @endphp
                                @if (count($post->tags) > $count)
                                  <span>{{ $tag->name }}, </span>
                                @else
                                  <span>{{ $tag->name }}</span>
                                @endif
                            @endforeach
                          </td>
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
                  @empty
                      <tr>
                        <td colspan="5">Nessun Post corrisponde alla categoria "{{ $category->name }}"</td>
                      </tr>
                  @endforelse
                </tbody>
            </table>
        </div>
    </section>
@endsection