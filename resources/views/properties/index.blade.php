@extends('layouts.app')
@section('content')

<div class="row">
    <h4>Property List</h4>
    <table  class="table table-responsive" >
        <thead>
            <tr>
                <th>UUID</th>
                <th>Property Type</th>
                <th>Description</th>
                <th>Address</th>
                <th>Price</th>
                <th>Type</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($property as $v)
                <tr>
                    <td>
                        {{$v->uuid}}
                    </td>
                    <td>
                        {{$v->PropertyType->title}}
                    </td>
                    <td >
                        {{substr($v->description, 0, 50)}} ...
                    </td>
                    <td>
                        {{$v->address}}
                    </td>
                    <td>
                        {{$v->price}}
                    </td>
                    <td>
                        {{$v->type}}
                    </td>
                    <td>
                        <a class="btn btn-success btn-sm mb-2" href="{{route('property.edit', $v->id)}}"  >Edit</a>
                        
                        <form method="POST" action="{{route('property.destroy', $v->id)}}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <div class="form-group">
                                <input type="submit" class="btn btn-danger delete-user" value="Delete">
                            </div>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
        {{$property->links()}}
</div>

<style>
    svg{
        width:14px;
    }
    nav .flex.justify-between.flex-1.sm\:hidden {
    display: none;
}
.hidden.sm\:flex-1.sm\:flex.sm\:items-center.sm\:justify-between div {
    margin: 15px;
}
</style>
@endsection