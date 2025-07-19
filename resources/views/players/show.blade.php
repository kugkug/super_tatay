@extends('layouts.app')

@section('title', 'View Player')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-eye me-2"></i>View Player
                </h5>
            </div>
            <div class="card-body">
                <p>Please use the view button on the players list page to view this player's details.</p>
                <a href="{{ route('players.index') }}" class="btn btn-primary">
                    <i class="fas fa-arrow-left me-2"></i>Back to Players List
                </a>
            </div>
        </div>
    </div>
</div>
@endsection 