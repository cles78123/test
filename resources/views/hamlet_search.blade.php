@extends('layouts.adminLTE_hamlet') 
@section('title','人口統計') 
@section('main')


</tr>
@foreach ($data_search as $key)
<tr>
<td>{{$key->location}}</td>
<td>{{$key->created_at}}</td>
<td>{{$key->number_neighbors}}</td>
<td>{{$key->number_households}}</td>
<td>{{$key->boy}}</td>
<td>{{$key->girl}}</td>
<td>{{$key->population}}</td>
<td>{{$key->born_population}}</td>
<td>{{$key->death_population}}</td>
<td>{{$key->marriages}}</td>
<td>{{$key->divorce}}</td>
<td>{{$key->move_in}}</td>
<td>{{$key->move_out}}</td>
</tr>
@endforeach              
</table> 
 @endsection
