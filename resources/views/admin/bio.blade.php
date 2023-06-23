@extends('layouts.dashboard')

@section('title', 'Bio')

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
              <div class="border border-dark border-2 rounded">
              <img
              src="{{ asset('storage/' . $bio->image_path) }}" alt="Image of {{ $bio->name }}"
              alt="user-avatar"
              class="d-block rounded"
              height="100"
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
          <h5 class="card-header">Delete Account</h5>
          <div class="card-body">
            <div class="mb-3 col-12 mb-0">
              <div class="alert alert-warning">
                <h6 class="alert-heading fw-bold mb-1">Are you sure you want to delete your account?</h6>
                <p class="mb-0">Once you delete your account, there is no going back. Please be certain.</p>
              </div>
            </div>
            <form id="formAccountDeactivation" onsubmit="return false">
              <div class="form-check mb-3">
                <input
                  class="form-check-input"
                  type="checkbox"
                  name="accountActivation"
                  id="accountActivation"
                />
                <label class="form-check-label" for="accountActivation"
                  >I confirm my account deactivation</label
                >
              </div>
              <button type="submit" class="btn btn-danger deactivate-account">Deactivate Account</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection