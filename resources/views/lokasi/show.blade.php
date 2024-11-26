@extends('layouts.apps')
@section('content')
    <div>
        <!-- Simplicity is the consequence of refined emotions. - Jean D'Alembert -->
        <button type="button" class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="top"
            data-bs-title="Tooltip on top">
            Tooltip on top
        </button>
    </div>
@endsection
@section('scripts')
    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>
@endsection
