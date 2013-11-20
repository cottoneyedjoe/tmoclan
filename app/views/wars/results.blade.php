@extends('layouts/main')
	@section('title')
		Search
	@stop
	@section('breadcrumbs')
	<div id="breadcrumbs">
        <div class="container">
          <ol class="breadcrumb">
              <li><a href="{{ URL::to('/') }}">Home</a></li>
			  <li><a href="#">Wars</a></li>
			  <li class="active">War search ({{ htmlspecialchars($search) }})</li>
          </ol>
        </div>
      </div>
	@stop
	@section('headline')
		Search results <span class="badge">{{ $result->count() }}</span>
	@stop
	@section('content')
		@if($result->isEmpty())
		<div class="text-center">
			<h4>There are no wars played with</h4>
			<h3>{{ htmlspecialchars($search) }} clan.</h3>
		</div>
		@else
		<table class="table table-hover text-center">
			<thead>
				<td>Clan name</td>
				<td>First map</td>
				<td>Second map</td>
				<td>TMO score</td>
				<td>Opponents score</td>
				<td>Author</td>
				<td>Date played</td>
				<td>Game</td>
			</thead>
			<tbody>
				@foreach($result as $obj)
				<tr>
					<td>{{ $obj->clan }}</td>
					<td>{{ $obj->map }}</td>
					<td>{{ $obj->map2 }}</td>
					<td>{{ $obj->tmoR1+$obj->tmoR2+$obj->tmoR3+$obj->tmoR4 }}</td>
					<td>{{ $obj->oppR1+$obj->oppR2+$obj->oppR3+$obj->oppR4 }}</td>
					<td>{{ $obj->author }}</td>
					<td>{{ substr($obj->created_at, 0, 10) }}</td>
					<td class="game">{{ $obj->game }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		@endif
		{{ $result->appends(array('search' => $search))->links() }}
	@stop
