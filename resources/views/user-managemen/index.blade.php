@extends('auth.layouts')

@section('content')
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Image</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach($users as $user)
    <tr>
        <th scope="row">{{ $user->id }}</th>
        <td>{{ $user->name }}</td>
        <td><img src="{{asset('storage/photos/original/'.$user->photo )}}" width="150px"></td>
        <td><form action="{{ route('managemenUser.edit', $user->id) }}">
                @csrf
                <button type="submit" class="btn btn-primary">Update</button>
                </form>
        </td>
        <td><form action="{{ route('managemenUser.destroy', $user->id) }}" method="post">
             @csrf
             <button type="submit" class="btn btn-warning">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection