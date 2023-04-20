@extends('layouts.menus.marketing')
@section('content')
    <div class="row justify-content-center">
        <div class="col-xl-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card mb-4">
                <h5 class="card-header">
                    Images
                </h5>
                <div class="card-body">

                    <form action="{{ route('property_file.store') }}" class="dropzone" id="my-great-dropzone">
                        <input type="hidden" value="{{ $property_listing->id }}" name="property_listing_id" required>
                    </form>

                    <br>
                    <a href="" class="btn btn-success pull-left">
                        <i class="fa fa-upload"></i>
                        Upload
                    </a>

                    <hr>
                    <div class="row">
                        @foreach ($property_files as $property_file)
                            <div class="col-md-3 col-sm-12 col-lg-3 mb-4">
                                <div class="card">
                                    <img class="card-img-top" src="{{ Storage::url($property_file->path) }}"
                                        alt="Card image cap"
                                        style="width: 100%; height: 260px; background-size: center; object-fit: cover;">

                                    <form action="{{ route('property_file.destroy', $property_file->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="#" class="text-danger del_confirm" id="confirm-text"
                                            style="padding: 10px;">
                                            <i class="icon md-delete" aria-hidden="true"></i>
                                            Remove
                                        </a>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        Dropzone.options.myGreatDropzone = {
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            addRemoveLinks: false,
            maxFilesize: 10000,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success: function(file, response) {
                console.log(file);
            },
        }
    </script>
@endsection
