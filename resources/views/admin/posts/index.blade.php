@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            <h1 class="text-center mb-5">Lista dei Post</h1>
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Slug</th>
                    <th scope="col" colspan="3">Altro</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($posts as $post)
                      <tr>
                          <td>{{ $post->id }}</td>
                          <td>{{ $post->title }}</td>
                          <td>{{ $post->slug }}</td>
                          <td>
                            <a class="btn btn-success" href="{{ route('admin.posts.show', $post->id) }}">SHOW</a>
                          </td>
                          <td>
                            <a class="btn btn-primary" href="">EDIT</a>
                          </td>
                          <td>
                            <a class="btn btn-danger" href="">DELETE</a>
                          </td>
                      </tr>
                  @endforeach
                </tbody>
            </table>
            {{ $posts->links() }}
        </div>
    </section>
@endsection