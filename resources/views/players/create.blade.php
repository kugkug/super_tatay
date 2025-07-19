@extends('layouts.app')

@section('title', 'Create Player')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-plus me-2"></i>Create New Player
                </h5>
            </div>
            <div class="card-body">
                <p>Please use the "Add New Player" button on the players list page to create a new player.</p>
                <a href="{{ route('players.index') }}" class="btn btn-primary">
                    <i class="fas fa-arrow-left me-2"></i>Back to Players List
                </a>
            </div>
        </div>
    </div>
</div>
@endsection 