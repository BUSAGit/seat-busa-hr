@extends('web::character.layouts.view', [ 'viewname' => 'seat-busa-hr::notes' ])

@section('page_header', trans_choice('web::seat.character', 1) . ' Notes')

@section('character_content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">New Note</h3>
        </div>
        <form action="{{ route('seat-busa-hr::notes.create', ['character' => $character]) }}" method="post">
            <div class="card-body">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="severity">Severity</label>
                        <select name="severity" id="severity" class="form-control"  required>
                            <option value="info">Info</option>
                            <option value="warning">Warning</option>
                            <option value="danger">Danger</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="note">Note</label>
                        <textarea name="note" id="note" rows="5" class="form-control"></textarea>
                    </div>

            </div>
            <div class="card-footer">
                <button class="btn btn-success btn-block" type="submit">
                    <i class="fas fa-save"></i>
                    Submit
                </button>
            </div>
        </form>

    </div>
@stop