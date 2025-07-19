@extends('layouts.app')

@section('title', 'Edit Player')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-edit me-2"></i>Edit Player
                </h5>
            </div>
            <div class="card-body">
                <p>Please use the edit button on the players list page to edit this player.</p>
                <a href="{{ route('players') }}" class="btn btn-primary">
                    <i class="fas fa-arrow-left me-2"></i>Back to Players List
                </a>
            </div>
        </div>
    </div>
</div>
@endsection 