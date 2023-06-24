@extends('layouts.dashboard')

@section('title', 'Bio')

@section('style')
  <link rel="stylesheet" href="{{ asset('universal-icon-picker/assets/stylesheets/icon-picker.css') }}">
@endsection

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
      <div class="col-md-12">
        
        <div class="card mb-4">
          <h5 class="card-header">Profile Details</h5>
          <!-- Account -->
          <div class="card-body">
           {{-- alert when success --}}
            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Success!</strong> {{ session('success') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            {{-- alert when error --}}
            @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>Error!</strong> {{ session('error') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
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

        <div class="card">
          <h5 class="card-header">Contact</h5>
          <div class="card-body">

          <form action="{{ route('admin.contact.store') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-1" id="uip-select-btn">
                  <div  id="output" class="">
                    <label for="output-icon">Icon</label>
                    {{-- <input type="text" id="output-icon" class="form-control demo-output-icon"></input> --}}
                    <div id="output-icon" class="demo-output-icon"><i class="fa-solid fa-plus"></i></div>
                    <input type="hidden" id="output-icon-hidden" name="icon">
                  </div>
                </div>

                <div class="col-md-3 ml-1 ml-sm-0">
                  <label for="name">Name</label>
                  <input type="text" name="name" id="name" class="form-control">
                </div>

                <div class="col-md-5 ml-sm-0">
                  <label for="desc">Description</label>
                  <input type="text" name="description" id="desc" class="form-control">
                </div>
                
                <div class="col-md-3 d-flex">
                  <div class="">
                    <label for="desc"></label> <br>
                    <input type="submit" value="Add New" id="desc" class="btn btn-primary">
                  </div>
    
                </div>
            </div>
          </form>

          <hr>

          @foreach ($contacts as $contact )
          <form action="{{ route('admin.contact.update') }}" method="post">
            @csrf
            <input type="hidden" name="id" value="{{ $contact->id }}">
            <div class="row mt-3">
                <div class="col-md-1" id="uip-select-btn{{ $contact->id }}">
                  <div  id="output" class="">
                    <label for="output-icon{{ $contact->id }}">Icon</label>
                    {{-- <input type="text" id="output-icon" class="form-control demo-output-icon"></input> --}}
                    <div id="output-icon{{ $contact->id }}" class="demo-output-icon">
                      {!! $contact->icon !!}
                    </div>
                    <input type="hidden" id="output-icon-hidden{{ $contact->id }}" name="icon">
                  </div>
                </div>

                <div class="col-md-7 ml-1 ml-sm-0">
                  <label for="desc">{{ $contact->name }}</label>
                  <input type="text" name="description" value="{{ $contact->description }}" id="desc" class="form-control">
                </div>
                
                <div class="col-md-4 d-flex">
                  <div class="">
                    <label for="desc"></label> <br>
                    <input type="submit" value="Update" id="desc" class="btn btn-primary">
                  </div>
                </form>
    
                  <form action="{{ route('admin.contact.destroy', $contact->id) }}" method="post">
                    @csrf
                    <div class="mx-1">
                      <label for="desc"></label> <br>
                      <input type="submit" id="desc" value="Delete" class="btn btn-danger">
                    </div>
                  </form>
                </div>
            </div>
            <script>
              document.addEventListener('DOMContentLoaded', function(event) {
                  var uip = new UniversalIconPicker('#uip-select-btn{{ $contact->id }}', {
                      iconLibraries: [
                          // 'happy-icons.min.json',
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
                          document.getElementById('output-icon{{ $contact->id }}').innerHTML = jsonIconData.iconHtml;
                          document.getElementById('output-icon-hidden{{ $contact->id }}').value = jsonIconData.iconHtml;
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
          @endforeach

          </div>
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