@extends('base')

@section('content')

    <h4>Add Grade For {{ $user['name'] }}</h4>
    
    <div class="col-4 mt-4">
        <form method="post" action="/grade/post-add">
            @csrf
            <div class="mb-3">
                <input type="hidden" value={{ $user['id'] }} id="user_id" name="user_id">
              </div>
            <div class="mb-3">
              <label for="quiz" class="form-label">Quiz</label>
              <input type="number" class="form-control" id="quiz" name="quiz">
              @error('quiz')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>    
              @enderror
            </div>
            <div class="mb-3">
                <label for="tugas" class="form-label">Tugas</label>
                <input type="number" class="form-control" id="tugas" name="tugas">
                @error('tugas')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>    
              @enderror
            </div>
              <div class="mb-3">
                <label for="absensi" class="form-label">Absensi</label>
                <input type="number" class="form-control" id="absensi" name="absensi">
                @error('absensi')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>    
              @enderror
            </div>
              <div class="mb-3">
                <label for="praktek" class="form-label">Praktek</label>
                <input type="number" class="form-control" id="praktek" name="praktek">
                @error('praktek')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>    
              @enderror
            </div>
              <div class="mb-3">
                <label for="uas" class="form-label">UAS</label>
                <input type="number" class="form-control" id="uas" name="uas">
                @error('uas')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>    
              @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    
@endsection