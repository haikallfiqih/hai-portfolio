@extends('layouts.dashboard')

@section('title', 'Bio')

@section('style')
  <link rel="stylesheet" href="{{ asset('universal-icon-picker/assets/stylesheets/icon-picker.css') }}">
@endsection

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
      <div class="col-md-12">
        <x-alert.success />
        
        <div class="card mb-4">
          <h5 class="card-header">Profile Details</h5>
          <!-- Account -->
          <div class="card-body">
            <form action="{{ route('admin.bio.update') }}" method="post" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="id" value="{{ $bio->id }}">
            <div class="d-flex align-items-start align-items-sm-center gap-4">
              <div class="border border-b-slate-950 border-2 rounded overflow-clip">
              <img
              src="{{ asset('storage/' . $bio->image_path) }}" alt="Image of {{ $bio->name }}"
              alt="user-avatar"
              class="d-block "
              height="auto"
              width="100"
              id="uploadedAvatar"
            />
             </div>
              <div class="button-wrapper">
                <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                  <span class="d-none d-sm-block"<i class="menu-icon tf-icons bx bx-camera">Upload</i>
                  </span>
                  <i class="bx bx-upload d-block d-sm-none"></i>
                  <input
                    name="image"
                    type="file"
                    id="upload"
                    class="account-file-input"
                    hidden
                    accept="image/png, image/jpeg"
                  />
                </label>
                <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                  <i class="bx bx-reset d-block d-sm-none"></i>
                  <span class="d-none d-sm-block">Reset</span>
                </button>

                <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 10 Mb</p>
              </div>
            </div>
          </div>
          <hr class="my-0" />
          <div class="card-body">

              <div class="row">
                <div class="mb-3 col-md-6">
                  <label for="firstName" class="form-label">Name</label>
                  <input
                    class="form-control"
                    type="text"
                    value="{{ $bio->name }}"
                    id="firstName"
                    name="name"
                    placeholder="Haikal Fiqih"
                    autofocus
                  />
                </div>
                <div class="mb-3 col-md-6">
                  <label for="lastName" class="form-label">Title Header</label>
                  <input class="form-control" type="text" value="{{ $bio->title_header }}" name="title_header" id="title_header" placeholder="Greeting" />
                </div>
                <div class="mb-3 col-md-6">
                  <label for="email" class="form-label">Description</label>
                    <textarea 
                    class="form-control" 
                    id="description" 
                    name="description" 
                    rows="6" 
                    placeholder="Dedicated full-stack developer based in Indonesia..">{{ $bio->description }}</textarea>
                </div>
                <div class="mb-3 col-md-6">
                  <label for="email" class="form-label">Title</label>
                  <input
                    class="form-control"
                    type="text"
                    id="title"
                    name="title"
                    value="{{ $bio->title }}"
                    placeholder="Backend Developer"
                  />
                </div>
              </div>
               
              <div class="mt-2">
                <button type="submit" class="btn btn-primary me-2">Save changes</button>
                <button type="reset" class="btn btn-outline-secondary">Cancel</button>
              </div>
            </form>
          </div>
          <!-- /Account -->
        </div>
      </div>
    </div>
  </div>
@endsection

@section('script')
<script src="{{ asset('universal-icon-picker/assets/js/universal-icon-picker.js') }}"></script>
<script>
  document.addEventListener('DOMContentLoaded', function(event) {
        var uip = new UniversalIconPicker('#uip-select-btn', {
            iconLibraries: [
            'happy-icons.min.json',
            'font-awesome.min.json'
            ],
            iconLibrariesCss: [
            'happy-icons.min.css',
            'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css'
            ],
            resetSelector: '#uip-reset-btn',
            onSelect: function(jsonIconData) {
                console.log(jsonIconData);
                // document.getElementById('output-json').innerHTML = JSON.stringify(jsonIconData, null, 4);
                document.getElementById('output-icon').innerHTML = jsonIconData.iconHtml;
                document.getElementById('output-icon-hidden').value = jsonIconData.iconHtml;
                document.getElementById('output').classList.remove('hidden');
            },
            onReset: function() {
                document.getElementById('output-json').innerHTML = '';
                document.getElementById('output-icon').innerHTML = '';
                document.getElementById('output').classList.add('hidden');
            }
            });
        });
</script>
@endsection