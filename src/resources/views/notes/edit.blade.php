@extends('web::character.layouts.view', [ 'viewname' => 'seat-busa-hr::notes' ])

@section('page_header', trans_choice('web::seat.character', 1) . ' Notes')

@section('character_content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Note</h3>
        </div>
        <form action="{{ route('seat-busa-hr::notes.edit', ['character' => $character, 'note' => $note]) }}" method="post">
            <div class="card-body">
                    {{ csrf_field() }}
                    
                <input type="text" name="id" id="id" value="{{ $note->id }}" hidden>

                    @if(Auth()->user()->can('seat-busa-hr.director_notes'))
                    <div class="form-check">
                        <input class="form-check-input" name="director_only" id="director_only" type="checkbox" value="1" @if($note->director_only) checked @endif>
                        <label class="form-check-label" for="directory_only">
                            Director Only?
                            <small class="text-muted">
                                (Only visible to directors)
                            </small>
                        </label>
                    </div>
                    <br>
                    @endif

                    <div class="form-group">
                        <label for="note">Note</label>
                        <textarea name="note" id="note" rows="5" class="form-control">{{ $note->note }}</textarea>
                    </div>

            </div>
            <div class="card-footer">
                <button class="btn btn-success btn-block" type="submit">
                    <i class="fas fa-save"></i>
                    Update
                </button>
            </div>
        </form>

    </div>
@stop