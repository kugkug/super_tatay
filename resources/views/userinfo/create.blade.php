@extends('layouts.app')

@section('title', 'Add Your Information')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">
        <div class="card shadow-lg">
            <div class="card-header text-center bg-warning">
                <h4 class="mb-0">
                    <i class="fas fa-user-plus me-2"></i>Add Your Information
                </h4>
            </div>
            <div class="card-body p-4">
                <form id="userInfoForm" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="first_name" class="form-label">
                                    <i class="fas fa-user me-2"></i>First Name *
                                </label>
                                <input type="text" class="form-control" id="first_name" name="first_name" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="last_name" class="form-label">
                                    <i class="fas fa-user me-2"></i>Last Name *
                                </label>
                                <input type="text" class="form-control" id="last_name" name="last_name" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="age" class="form-label">
                                    <i class="fas fa-birthday-cake me-2"></i>Age *
                                </label>
                                <input type="number" class="form-control" id="age" name="age" min="1" max="150" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="jersey_number" class="form-label">
                                    <i class="fas fa-tshirt me-2"></i>Jersey Number *
                                </label>
                                <input type="number" class="form-control" id="jersey_number" name="jersey_number" min="1" max="999" required>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="contact_number" class="form-label">
                            <i class="fas fa-phone me-2"></i>Contact Number *
                        </label>
                        <input type="text" class="form-control" id="contact_number" name="contact_number" required>
                    </div>

                    

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-warning btn-lg">
                            <i class="fas fa-save me-2"></i>Submit Information
                        </button>
                        {{-- <a href="{{ route('players.index') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-trophy me-2"></i>View Players
                        </a> --}}
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
$(document).ready(function() {
    $('#userInfoForm').on('submit', function(e) {
        e.preventDefault();
        
        var formData = new FormData(this);
        
        $.ajax({
            url: '{{ route("userinfo.store") }}',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.success) {
                    showAlert('success', response.message);
                    // Reset form after successful submission
                    $('#userInfoForm')[0].reset();
                }
            },
            error: function(xhr) {
                if (xhr.status === 422) {
                    var response = xhr.responseJSON;
                    var errorMessage = 'Please fix the following errors:\n';
                    for (var field in response.errors) {
                        errorMessage += '- ' + response.errors[field][0] + '\n';
                    }
                    showAlert('danger', errorMessage);
                } else {
                    showAlert('danger', 'An error occurred. Please try again.');
                }
            }
        });
    });

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
});
</script>
@endsection 