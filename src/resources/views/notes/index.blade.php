@extends('web::character.layouts.view', [ 'viewname' => 'seat-busa-hr::notes' ])

@section('page_header', trans_choice('web::seat.character', 1) . ' Notes')

@section('character_content')
    <h4>Notes For {{$main_character_name}}</h4>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Notes</h3>
            <a href="{{ route('seat-busa-hr::notes.create', ['character' => $character]) }}" class="btn btn-sm btn-primary float-right">
                <i class="fas fa-plus"></i>
                Add
            </a>
        </div>
        <div class="card-text">
            <table class="table table-striped table-hover" id="notes">
                <thead>
                    <tr>
                        <td>Note</td>
                        <td>Created By</td>
                        <td>Created At</td>
                        <td>Actions</td>
                    </tr>
                </thead>
                <tbody>
                    @if($notes === null || count($notes) === 0)
                        <tr>
                            <td colspan="4">No notes found.</td>
                        </tr>
                    @else
                        @foreach($notes as $note)
                            @if($note->director_only && !auth()->user()->can('seat-busa-hr.director_notes'))
                                @continue
                            @endif
                            <tr>
                                <td col>
                                    @if($note->director_only)
                                        <span class="badge badge-danger">Director Note</span>
                                        <br>
                                    @endif
                                    {{$note->note}}
                                </td>
                                <td>{{$note->creator->name}}</td>
                                <td>{{Carbon\Carbon::parse($note->created_at)->format('d/M/y h:m:s')}}</td>
                                <td>
                                    @if($note->created_by === auth()->user()->id)
                                    <a href="{{ route('seat-busa-hr::notes.edit', ['character' => $character, 'note' => $note]) }}" class="btn btn-sm btn-primary">
                                        <i class="fas fa-edit"></i>
                                        Edit
                                    </a>
                                    @endif
                                    @can('seat-busa-hr.director_notes')
                                    <a href="{{ route('seat-busa-hr::notes.delete', ['character' => $character, 'note' => $note]) }}" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
                                        Delete
                                    </a>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>

@stop

@push('javascript')
<script>
$(document).ready(function() {
    $('#notes').DataTable({
        "order": [[ 2, "desc" ]],
        "columnDefs": [
            { width: '60%', targets: 0 },
            { orderable: false, targets: 3 }
        ]
    });
});
</script>
@endpush