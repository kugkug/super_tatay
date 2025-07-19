@extends('layouts.app')

@section('title', 'Players List')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">
                    <i class="fas fa-users me-2"></i>Players List
                </h5>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createPlayerModal">
                    <i class="fas fa-plus me-2"></i>Add New Player
                </button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="playersTable">
                        <thead class="table-dark">
                            <tr>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Age</th>
                                <th>Contact</th>
                                <th>Jersey #</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($players as $player)
                            <tr data-player-id="{{ $player->id }}">
                                <td>
                                    @if($player->photo)
                                        <img src="{{ asset('storage/' . $player->photo) }}" alt="Player Photo" class="player-photo">
                                    @else
                                        <div class="player-photo bg-secondary d-flex align-items-center justify-content-center text-white">
                                            <i class="fas fa-user"></i>
                                        </div>
                                    @endif
                                </td>
                                <td>{{ $player->full_name }}</td>
                                <td>{{ $player->age }}</td>
                                <td>{{ $player->contact_number }}</td>
                                <td>{{ $player->jersey_number }}</td>
                                <td>
                                    <button class="btn btn-sm btn-info btn-action view-player" data-player-id="{{ $player->id }}">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-sm btn-warning btn-action edit-player" data-player-id="{{ $player->id }}">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-danger btn-action delete-player" data-player-id="{{ $player->id }}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted">
                                    <i class="fas fa-info-circle me-2"></i>No players found. Add your first player!
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Create Player Modal -->
<div class="modal fade" id="createPlayerModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-plus me-2"></i>Add New Player
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="createPlayerForm" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="first_name" class="form-label">First Name *</label>
                                <input type="text" class="form-control" id="first_name" name="first_name" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="last_name" class="form-label">Last Name *</label>
                                <input type="text" class="form-control" id="last_name" name="last_name" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="age" class="form-label">Age *</label>
                                <input type="number" class="form-control" id="age" name="age" min="1" max="150" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="jersey_number" class="form-label">Jersey Number *</label>
                                <input type="number" class="form-control" id="jersey_number" name="jersey_number" min="1" max="999" required>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="contact_number" class="form-label">Contact Number *</label>
                        <input type="text" class="form-control" id="contact_number" name="contact_number" required>
                    </div>
                    <div class="mb-3">
                        <label for="photo" class="form-label">Photo</label>
                        <input type="file" class="form-control" id="photo" name="photo" accept="image/*">
                        <div class="form-text">Max size: 2MB. Supported formats: JPEG, PNG, JPG, GIF</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Save Player
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Player Modal -->
<div class="modal fade" id="editPlayerModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-edit me-2"></i>Edit Player
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="editPlayerForm" enctype="multipart/form-data">
                <input type="hidden" id="edit_player_id" name="player_id">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="edit_first_name" class="form-label">First Name *</label>
                                <input type="text" class="form-control" id="edit_first_name" name="first_name" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="edit_last_name" class="form-label">Last Name *</label>
                                <input type="text" class="form-control" id="edit_last_name" name="last_name" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="edit_age" class="form-label">Age *</label>
                                <input type="number" class="form-control" id="edit_age" name="age" min="1" max="150" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="edit_jersey_number" class="form-label">Jersey Number *</label>
                                <input type="number" class="form-control" id="edit_jersey_number" name="jersey_number" min="1" max="999" required>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="edit_contact_number" class="form-label">Contact Number *</label>
                        <input type="text" class="form-control" id="edit_contact_number" name="contact_number" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_photo" class="form-label">Photo</label>
                        <input type="file" class="form-control" id="edit_photo" name="photo" accept="image/*">
                        <div class="form-text">Max size: 2MB. Supported formats: JPEG, PNG, JPG, GIF</div>
                        <div id="current_photo_preview" class="mt-2"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-warning">
                        <i class="fas fa-save me-2"></i>Update Player
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- View Player Modal -->
<div class="modal fade" id="viewPlayerModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-eye me-2"></i>Player Details
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="playerDetails">
                <!-- Player details will be loaded here -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
$(document).ready(function() {
    // Create Player
    $('#createPlayerForm').on('submit', function(e) {
        e.preventDefault();
        
        var formData = new FormData(this);
        
        $.ajax({
            url: '{{ route("players.store") }}',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.success) {
                    // Add new row to table
                    var newRow = `
                        <tr data-player-id="${response.player.id}">
                            <td>
                                ${response.player.photo ? 
                                    `<img src="/storage/${response.player.photo}" alt="Player Photo" class="player-photo">` :
                                    `<div class="player-photo bg-secondary d-flex align-items-center justify-content-center text-white">
                                        <i class="fas fa-user"></i>
                                    </div>`
                                }
                            </td>
                            <td>${response.player.first_name} ${response.player.last_name}</td>
                            <td>${response.player.age}</td>
                            <td>${response.player.contact_number}</td>
                            <td>${response.player.jersey_number}</td>
                            <td>
                                <button class="btn btn-sm btn-info btn-action view-player" data-player-id="${response.player.id}">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-warning btn-action edit-player" data-player-id="${response.player.id}">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-danger btn-action delete-player" data-player-id="${response.player.id}">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    `;
                    
                    $('#playersTable tbody').prepend(newRow);
                    
                    // Show success message
                    showAlert('success', response.message);
                    
                    // Reset form and close modal
                    $('#createPlayerForm')[0].reset();
                    $('#createPlayerModal').modal('hide');
                }
            },
            error: function(xhr) {
                var errors = xhr.responseJSON.errors;
                var errorMessage = 'Please fix the following errors:\n';
                for (var field in errors) {
                    errorMessage += '- ' + errors[field][0] + '\n';
                }
                showAlert('danger', errorMessage);
            }
        });
    });

    // Edit Player
    $('.edit-player').on('click', function() {
        var playerId = $(this).data('player-id');
        
        $.ajax({
            url: `/players/${playerId}/edit`,
            type: 'GET',
            success: function(response) {
                $('#edit_player_id').val(playerId);
                $('#edit_first_name').val(response.player.first_name);
                $('#edit_last_name').val(response.player.last_name);
                $('#edit_age').val(response.player.age);
                $('#edit_contact_number').val(response.player.contact_number);
                $('#edit_jersey_number').val(response.player.jersey_number);
                
                // Show current photo if exists
                if (response.player.photo) {
                    $('#current_photo_preview').html(`
                        <p class="text-muted">Current photo:</p>
                        <img src="/storage/${response.player.photo}" alt="Current Photo" class="modal-photo">
                    `);
                } else {
                    $('#current_photo_preview').html('<p class="text-muted">No photo uploaded</p>');
                }
                
                $('#editPlayerModal').modal('show');
            }
        });
    });

    // Update Player
    $('#editPlayerForm').on('submit', function(e) {
        e.preventDefault();
        
        var playerId = $('#edit_player_id').val();
        var formData = new FormData(this);
        
        $.ajax({
            url: `/players/${playerId}`,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'X-HTTP-Method-Override': 'PUT'
            },
            success: function(response) {
                if (response.success) {
                    // Update the row in table
                    var row = $(`tr[data-player-id="${playerId}"]`);
                    row.find('td:eq(1)').text(response.player.first_name + ' ' + response.player.last_name);
                    row.find('td:eq(2)').text(response.player.age);
                    row.find('td:eq(3)').text(response.player.contact_number);
                    row.find('td:eq(4)').text(response.player.jersey_number);
                    
                    // Update photo if changed
                    if (response.player.photo) {
                        row.find('td:eq(0)').html(`<img src="/storage/${response.player.photo}" alt="Player Photo" class="player-photo">`);
                    }
                    
                    showAlert('success', response.message);
                    $('#editPlayerModal').modal('hide');
                }
            },
            error: function(xhr) {
                var errors = xhr.responseJSON.errors;
                var errorMessage = 'Please fix the following errors:\n';
                for (var field in errors) {
                    errorMessage += '- ' + errors[field][0] + '\n';
                }
                showAlert('danger', errorMessage);
            }
        });
    });

    // View Player
    $('.view-player').on('click', function() {
        var playerId = $(this).data('player-id');
        
        $.ajax({
            url: `/players/${playerId}`,
            type: 'GET',
            success: function(response) {
                var player = response.player;
                var photoHtml = player.photo ? 
                    `<img src="/storage/${player.photo}" alt="Player Photo" class="modal-photo mb-3">` :
                    '<div class="text-muted mb-3">No photo available</div>';
                
                $('#playerDetails').html(`
                    <div class="text-center mb-3">
                        ${photoHtml}
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>First Name:</strong> ${player.first_name}</p>
                            <p><strong>Last Name:</strong> ${player.last_name}</p>
                            <p><strong>Age:</strong> ${player.age}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Contact Number:</strong> ${player.contact_number}</p>
                            <p><strong>Jersey Number:</strong> ${player.jersey_number}</p>
                            <p><strong>Created:</strong> ${new Date(player.created_at).toLocaleDateString()}</p>
                        </div>
                    </div>
                `);
                
                $('#viewPlayerModal').modal('show');
            }
        });
    });

    // Delete Player
    $('.delete-player').on('click', function() {
        var playerId = $(this).data('player-id');
        
        if (confirm('Are you sure you want to delete this player?')) {
            $.ajax({
                url: `/players/${playerId}`,
                type: 'DELETE',
                success: function(response) {
                    if (response.success) {
                        $(`tr[data-player-id="${playerId}"]`).fadeOut();
                        showAlert('success', response.message);
                    }
                },
                error: function() {
                    showAlert('danger', 'Error deleting player');
                }
            });
        }
    });

    // Helper function to show alerts
    function showAlert(type, message) {
        var alertHtml = `
            <div class="alert alert-${type} alert-dismissible fade show" role="alert">
                <i class="fas fa-${type === 'success' ? 'check-circle' : 'exclamation-circle'} me-2"></i>${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        `;
        
        $('.container').prepend(alertHtml);
        
        setTimeout(function() {
            $('.alert').fadeOut('slow');
        }, 5000);
    }

    // Delegate events for dynamically added elements
    $(document).on('click', '.view-player', function() {
        var playerId = $(this).data('player-id');
        
        $.ajax({
            url: `/players/${playerId}`,
            type: 'GET',
            success: function(response) {
                var player = response.player;
                var photoHtml = player.photo ? 
                    `<img src="/storage/${player.photo}" alt="Player Photo" class="modal-photo mb-3">` :
                    '<div class="text-muted mb-3">No photo available</div>';
                
                $('#playerDetails').html(`
                    <div class="text-center mb-3">
                        ${photoHtml}
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>First Name:</strong> ${player.first_name}</p>
                            <p><strong>Last Name:</strong> ${player.last_name}</p>
                            <p><strong>Age:</strong> ${player.age}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Contact Number:</strong> ${player.contact_number}</p>
                            <p><strong>Jersey Number:</strong> ${player.jersey_number}</p>
                            <p><strong>Created:</strong> ${new Date(player.created_at).toLocaleDateString()}</p>
                        </div>
                    </div>
                `);
                
                $('#viewPlayerModal').modal('show');
            }
        });
    });

    $(document).on('click', '.edit-player', function() {
        var playerId = $(this).data('player-id');
        
        $.ajax({
            url: `/players/${playerId}/edit`,
            type: 'GET',
            success: function(response) {
                $('#edit_player_id').val(playerId);
                $('#edit_first_name').val(response.player.first_name);
                $('#edit_last_name').val(response.player.last_name);
                $('#edit_age').val(response.player.age);
                $('#edit_contact_number').val(response.player.contact_number);
                $('#edit_jersey_number').val(response.player.jersey_number);
                
                // Show current photo if exists
                if (response.player.photo) {
                    $('#current_photo_preview').html(`
                        <p class="text-muted">Current photo:</p>
                        <img src="/storage/${response.player.photo}" alt="Current Photo" class="modal-photo">
                    `);
                } else {
                    $('#current_photo_preview').html('<p class="text-muted">No photo uploaded</p>');
                }
                
                $('#editPlayerModal').modal('show');
            }
        });
    });

    $(document).on('click', '.delete-player', function() {
        var playerId = $(this).data('player-id');
        
        if (confirm('Are you sure you want to delete this player?')) {
            $.ajax({
                url: `/players/${playerId}`,
                type: 'DELETE',
                success: function(response) {
                    if (response.success) {
                        $(`tr[data-player-id="${playerId}"]`).fadeOut();
                        showAlert('success', response.message);
                    }
                },
                error: function() {
                    showAlert('danger', 'Error deleting player');
                }
            });
        }
    });
});
</script>
@endsection 