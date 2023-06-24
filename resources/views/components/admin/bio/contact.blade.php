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

          {{-- end contact --}}

          </div>
        </div>