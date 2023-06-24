@extends('layouts.dashboard')

@section('title', 'About')


@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    <x-alert.success />

    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
      <!-- Basic Layout -->
      <div class="col-xxl">
        <div class="card mb-4">
          <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">About</h5>
          </div>
          <div class="card-body">
            <form method="post" action="{{ route('admin.about.update', ['id' => $about->id]) }}">
                @csrf
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Title</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="basic-default-name" value="{{ $about->title }}" name="title" placeholder="Haikal Fiqih" />
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-message">Description</label>
                <div class="col-sm-10">
                  <textarea
                    id="basic-default-message"
                    class="form-control"
                    name="description"
                    rows="3"
                    placeholder="Discribe about your self"
                    aria-label="Discribe about your self"
                    aria-describedby="basic-icon-default-message2"
                  >{{ $about->description }}</textarea>
                </div>
              </div>
              <div class="row justify-content-end">
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
        <!-- / Basic Layout -->
    </div>
</div>
@endsection